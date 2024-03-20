<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResource('users', UserController::class);
    Route::apiResource('invoices', InvoicesController::class);

    Route::post('invoices/bulk', ['uses' => 'InvoicesController@bulkStore']);
});

