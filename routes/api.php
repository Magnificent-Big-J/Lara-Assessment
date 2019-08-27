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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

Route::post('/register','ApiAuthController@register');
Route::post('/login','ApiAuthController@login');

Route::group(['middleware' => ['api', 'auth:api']], function () {


    Route::resource('sales', 'SaleController');
    Route::resource('historic', 'TopUpHistoryController');
    Route::get('historic2', 'TopUpHistoryController@historicData');
    Route::resource('topup', 'TopUpController');
    Route::get('product', 'ProductController@apiProducts');

});

