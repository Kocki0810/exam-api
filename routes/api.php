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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => ['cors']],function()
{
    Route::apiResource('bruger', BrugerController::class);
    Route::apiResource('ekspedient', EkspedientController::class);
    Route::apiResource('firma', FirmaController::class);
    Route::apiResource('linje', LinjeController::class);
    Route::apiResource('ordre', OrdreController::class);
    Route::apiResource('produkt', ProduktController::class);
    Route::apiResource('produktgruppe', ProduktgruppeController::class);
});