<?php

namespace App\Service;

use App\Http\Requests\ActionRequest;
use App\Http\Resources\ActionResource;
use Illuminate\Support\Str;

class ActionService
{
    public function __construct(protected S3Service $s3Service)
    {

    }

    public function runActions(ActionRequest $request)
    {
        $actions = $request->get('actions');

        foreach ($actions as $action) {
            $this->runAction($action);
        }

    }

    public function runAction(array $action)
    {
        $name = $action['name'] . 'Action';
        $path = $action['path'] ?? '';
        $value = $action['value'] ?? '';

        return $this->{underscore_to_camel_case($name)}(normalize_path($path), normalize_folder($value));
    }

    public function createFolderAction($path, $value): ActionResource
    {

        // check if folder exists
        $getFolder = $this->s3Service->getContentFolderByPath($path)['folders']
            ->where(
                'Prefix',
                $value
            )
            ->first();

        if (filled($getFolder)) {
            return new ActionResource([
                "name" => "create_folder",
                "path" => $path,
                "value" => $value,
                "status" => "error",
                "error_message" => [
                    "message" => "Folder already exists"
                ]
            ]);
        }

        [$bucketName, $path] = separate_bucket_and_path_from_string($path);

        $folderPath = $path . $value;

        $url = $this->s3Service->createFolder(
            bucketName: $bucketName,
            folderNameWithPath: normalize_path(normalize_folder_path($folderPath))
        );

        if (!$url) {
            return new ActionResource([
                "name" => "create_folder",
                "path" => $path,
                "value" => $value,
                "status" => "error",
                "error_message" => [
                    "message" => "Can't create folder"
                ]
            ]);
        }

        return new ActionResource([
            "name" => "create_folder",
            "path" => $path,
            "value" => $value,
            "status" => "success",
            "error_message" => []
        ]);
    }
}
