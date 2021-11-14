<?php

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::namespace('api')->group(function () {
    Route::prefix('posts')->group(function () {
        Route::get('index', "PostController@index")->name("posts.index");
        Route::get('detail', "PostController@detail")->name("posts.detail");
        Route::get('browseStatus', "PostController@browseStatus")->name("posts.browseStatus");
        Route::post('store', "PostController@store")->name("posts.store");
        Route::get('create', "PostController@create")->name("posts.create");
        Route::get('edit/{id}', "PostController@edit")->name("posts.edit");
        Route::put('update/{id}', "PostController@update")->name("posts.update");
        Route::get('delete/{id}', "PostController@delete")->name("posts.delete");
    });
});
