<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\S3Controller;
use Aws\Laravel\AwsFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'prefix' => 'v1'
], function () {
    Route::get('/buckets', [S3Controller::class, 'bucketList']);
    Route::get('/buckets/{path}', [S3Controller::class, 'bucketContent'])->where('path', '.*');


    Route::post('/actions/bulkRun', [ActionController::class, 'runActions']);

});

