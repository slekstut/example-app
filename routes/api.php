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

Route::resource('order',App\Http\Controllers\OrdersController::class)->only(['index','store','show','update','destroy']);
Route::resource('client',App\Http\Controllers\ClientsController::class)->only(['index']);

Route::get('order/{id}/download', [App\Http\Controllers\OrdersController::class, 'download']);
