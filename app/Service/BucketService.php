<?php

namespace App\Service;

class BucketService
{

    protected array $buckets = [];

    public function __construct()
    {

        $this->buckets = [
            [
                "id" => 1,
                "name" => 'Bucket 1',
                "slug" => 'bucket-1',
                "description" => 'Bucket 1 Description',
            ],
            [
                "id" => 2,
                "name" => 'Bucket 2',
                "slug" => 'bucket-2',
                "description" => 'Bucket 2 Description',
            ],
            [
                "id" => 3,
                "name" => 'Bucket 3',
                "slug" => 'bucket-3',
                "description" => 'Bucket 3 Description',
            ],
        ];
    }

    public function getBuckets()
    {
        return $this->buckets;
    }

    public function getBucket($id)
    {
        $bucketsGroupedById = array_column($this->buckets, null, 'id');
        return $bucketsGroupedById[$id] ?? null;
    }

}
