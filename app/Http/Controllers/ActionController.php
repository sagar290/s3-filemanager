<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActionRequest;
use App\Service\ActionService;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function __construct(protected ActionService $service)
    {

    }
    public function makeAction(ActionRequest $request)
    {
        $this->service->runActions($request);
    }
}
