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
    Route::get('list-post', "PostController@index");
    Route::get('home', "HomeController@index");
    Route::get('detail-post-{id}', "HomeController@detailPost");
    Route::get('detail-company-{id}', "HomeController@detailCompany");

});
