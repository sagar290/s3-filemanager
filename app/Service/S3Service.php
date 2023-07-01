<?php

namespace App\Service;

use Aws\AwsClientInterface;
use Aws\Laravel\AwsFacade;
use Illuminate\Support\Str;

class S3Service
{

    protected array $buckets = [];
    protected AwsClientInterface $s3Client;

    public function __construct()
    {
        $this->s3Client = AwsFacade::createClient('s3');
    }

    public function getBuckets(): array
    {
        return $this->s3Client->listBuckets()->get('Buckets');
    }

    public function getBucket($id)
    {
        $bucketsGroupedById = array_column($this->buckets, null, 'id');
        return $bucketsGroupedById[$id] ?? null;
    }

    public function getContentFolderByPath(string $path): array
    {

        $pathExplode = explode('/', $path);

        $bucketName = $pathExplode[0];

        if (count($pathExplode) > 1) {
            $path = str_replace($bucketName . '/', '', $path) . '/';
        } else {
            $path = '';
        }

        [$folders, $contents] = $this->getBucketContentAndFolder($bucketName, $path);

        // get bucket content
        return [
            'folders' => $folders,
            'files' => $contents,
        ];
    }

    private function getBucketContentAndFolder(string $bucketName, string $path): array
    {

        $bucket = $this->s3Client->listObjectsV2([
            'Bucket' => $bucketName,
            'Prefix' => $path,
            'Delimiter' => '/',
        ]);


        return [
            collect($bucket->get('CommonPrefixes'))->map(function ($folder) use ($path) {

                $folder['Prefix'] = Str::replaceFirst($path, '', $folder['Prefix']);

                return [
                    'Prefix' => $folder['Prefix'],
                    'last_modified' => null,
                    'size' => null,
                ];

            }),
            collect($bucket->get('Contents'))->filter(function ($content) use ($path) {
                $content['Key'] = Str::replaceFirst($path, '', $content['Key']);
                return $content['Key'];
            })
        ];
    }

    public function createFolder($bucketName, $folderNameWithPath): string
    {
        return $this->s3Client->putObject([
            'Bucket' => $bucketName,
            'Key' => $folderNameWithPath,
            'Body' => '',
        ])->get('ObjectURL');

    }

    public function deleteFolder($bucketName, $folderNameWithPath)
    {
        return $this->s3Client->deleteObject([
            'Bucket' => $bucketName,
            'Key' => $folderNameWithPath,
        ]);
    }

}
