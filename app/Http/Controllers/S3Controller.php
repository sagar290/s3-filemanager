<?php

namespace App\Http\Controllers;

use App\Http\Resources\BucketContentResource;
use App\Http\Resources\BucketListResource;
use App\Service\S3Service;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class S3Controller extends Controller
{
    public function __construct(protected S3Service $s3MangerService)
    {

    }

    public function bucketList(): AnonymousResourceCollection|BucketListResource
    {
        return BucketListResource::collection($this->s3MangerService->getBuckets());
    }

    public function bucketContent(Request $request): BucketContentResource
    {
        return new BucketContentResource(
            $this->s3MangerService->getContentFolderByPath($request->path)
        );
    }

}
