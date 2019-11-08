<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'API\AuthController@login');
    Route::post('logout', 'API\AuthController@logout');
    Route::post('refresh', 'API\AuthController@refresh');
    Route::post('register', 'API\AuthController@register');
    Route::get('getuser', 'API\AuthController@me');

});

Route::group([

    'middleware' => 'api',
    'prefix' => 'v1'

], function ($router) {

    Route::apiResource('products', 'API\ProductController');
    Route::apiResource('alamats', 'API\AlamatController');
    Route::apiResource('orders', 'API\OrderController');
    Route::apiResource('carts', 'API\CartController');
    Route::get('users/{id}/alamats', 'API\AlamatController@userAlamat');

});