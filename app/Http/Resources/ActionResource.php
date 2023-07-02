<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;

class ActionResource extends JsonResource
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
            "name" => data_get($this, 'name'),
            "path" => data_get($this, 'path'),
            "value" => data_get($this, 'value'),
            "status" => data_get($this, 'status'),
            "error_message" => (array)data_get($this, 'error_message', []),
        ];
    }
}
