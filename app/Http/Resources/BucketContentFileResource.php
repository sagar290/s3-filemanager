<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed|null $name
 * @property mixed|null $path
 * @property mixed|null $last_modified
 * @property mixed|null $size
 * @property mixed|null $type
 */
class BucketContentFileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request): array|\JsonSerializable|Arrayable
    {
        return [
            "name" => $this->name,
            "path" => $this->path,
            "last_modified" => $this->last_modified,
            "size" => $this->size,
            "type" => $this->type,
        ];
    }

    public function __get($key)
    {
        return $this->resource[$key] ?? null;
    }
}
