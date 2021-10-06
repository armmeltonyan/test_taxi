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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register','API\AuthController@register');
Route::post('/login','API\AuthController@login');

Route::middleware('auth:api')->group( function () {
  Route::apiResource('drivers', 'API\DriverController');
  Route::apiResource('cars', 'API\CarController');
  Route::apiResource('tarifs', 'API\TarifController');
  Route::post('/cars/tarif/{car}','API\CarController@addTarif');
});

  Route::apiResource('orders', 'API\OrderController');