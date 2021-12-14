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
    Route::post('login', "AuthController@login");
    Route::post('register', "AuthController@register");
    Route::post('logout', "AuthController@logOut");
    Route::get('list-company', "CompanyController@index");
    Route::get('list-post-home', "PostController@index");
    Route::get('list-post-all', "PostController@listAll");
    Route::get('home', "HomeController@index");
    Route::get('search', "HomeController@search");
    Route::get('detail-post-{id}', "HomeController@detailPost");
    Route::get('detail-company-{id}', "HomeController@detailCompany");

    Route::middleware('jwt')->group(function () {
        Route::post('save-post', "HomeController@savePost");
        Route::get('list-save-post', "HomeController@listSavePost");
        Route::post('apply-post', "HomeController@applyPost");
        Route::post('update-user', "AuthController@updateUser");
        Route::get('notify', "HomeController@notify");
        Route::post('check-save-post', "HomeController@checkSavePost");
        Route::post('get-data-notification', "HomeController@getNotification");
    });
});
