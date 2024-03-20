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
    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';

Route::get('/start', function () {
    $credentials = [
        'email' => 'akramfarikh@gmail.com',
        'password' => '12345678'];

    if (auth()->attempt($credentials)) {
        $adminToken = auth()->user()->createToken('adminToken', ['create', 'update', 'delete']);
        $updateToken = auth()->user()->createToken('userToken', ['create', 'update']);
        $basicToken = auth()->user()->createToken('basicToken');
        $noneToken = auth()->user()->createToken('noneToken', []);

        return [
            'adminToken' => $adminToken->plainTextToken,
            'updateToken' => $updateToken->plainTextToken,
            'basicToken' => $basicToken->plainTextToken,
            'noneToken' => $noneToken->plainTextToken
        ];
    }
    return response()->json(['message' => 'Unauthorized'], 401);
});
