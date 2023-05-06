<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/bucketList', function () {

    $s3 = AwsFacade::createClient('s3');

    $buckets = $s3->listBuckets();

    return response()->json([
        'data' => $buckets->get('Buckets')
    ]);

});
