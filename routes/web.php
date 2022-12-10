<?php

use App\Service\BucketService;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/about', function () {
    return Inertia::render('about');
});

Route::get('/contact', function () {
    return Inertia::render('contact');
});

Route::get('/blog', function () {
    return Inertia::render('blog');
});

Route::post('/logout', function () {
    return "Logged out";
});

Route::get('/buckets/{bucketId}', function ($bucketId) {
    return Inertia::render('bucket', (new BucketService())->getBucket($bucketId));
});
