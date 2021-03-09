<?php

use Illuminate\Support\Facades\Route;

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
    $okay = 5;
    return view('welcome', compact('okay'));
});

Route::get('/test', function() {
    return view('test');
})->name('test');

Route::post('/send', function() {
    return dump($_FILES);
});

// Route::redirect('/', '/test'); // status 302 -> that's mean page is not working this time
// Route::permanentRedirect('/', '/test'); // status 301 that's mean page redirected another page forever

Route::get('/test/{id}', function($id) {
    return "$id";
});


Route::get('/test/{id}/{slug}', function($id, $slug) {
    return "$id $slug";
});




Route::prefix('admin')->name('admin')->group(function () {


    Route::get('/posts', function() {
        return 'posts';
    })->name('post');

    Route::get('/post/create', function() {
        return 'create post';
    });

    Route::get('/post/{idx?}/edit', function($idx) {
        return "edit $idx post";
    })->name('postid');
});


Route::fallback(function() {
    // return redirect()->route('test');
    abort(404, 'custom error page');
});
