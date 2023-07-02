<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest;
use App\Http\Resources\ActionResourceCollection;
use App\Service\ActionService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ActionController extends Controller
{
    public function __construct(protected ActionService $service)
    {

    }
    public function makeAction(ActionRequest $request): AnonymousResourceCollection
    {
        return ActionResourceCollection::collection($this->service->runActions($request));
    }
}
