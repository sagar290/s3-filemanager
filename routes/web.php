<?php

use App\Service\BucketService;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('home');
});

Route::get('images/{image}', function ($image) {
    // get image from public/images
    $path = public_path('images/' . $image);
    // check if file exists
    if (!File::exists($path)) {
        abort(404);
    }
    // get file content as a resource
    $file = File::get($path);
    // return the image with a proper response header
    return response($file, 200)->header("Content-Type", File::mimeType($path));

});

