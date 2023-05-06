<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

/**
 * @property mixed|null $folders
 * @property mixed|null $files
 */
class BucketContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            'folders' => BucketContentFileResource::collection(collect($this->folders)->map(function ($folder) use ($request) {
                return [
                    'name' => Str::replace('/', '', $folder['Prefix']),
                    'path' => $request->path,
                    'last_modified' => $folder['last_modified'] ?? null,
                    'size' => $folder['size'] ?? null,
                    'type' => 'folder'
                ];
            })),
            'files' => BucketContentFileResource::collection(collect($this->files)->map(function ($file) use ($request) {

                $file['type'] = Str::afterLast($file['Key'], '.');

                return [
                    'name' => Str::replace('/', '', $file['Key']),
                    'path' => $request->path,
                    'last_modified' => $file['LastModified'] ?? null,
                    'size' => $file['Size'] ?? null,
                    'type' => $file['type'] ?? null,
                ];
            })),
        ];
    }

    public function __get(mixed $key)
    {
        return $this->resource[$key] ?? null;
    }
}
