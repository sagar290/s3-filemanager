<?php

namespace App\Service;

use Aws\Laravel\AwsFacade;
use Illuminate\Support\Str;

class S3Service
{

    protected array $buckets = [];

    public function __construct()
    {

    }

    public function getBuckets(): array
    {
        $s3 = AwsFacade::createClient('s3');
        return $s3->listBuckets()->get('Buckets');
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
        $s3 = AwsFacade::createClient('s3');

        $bucket = $s3->listObjectsV2([
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


}
