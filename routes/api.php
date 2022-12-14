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

Route::post('/register', 
[App\Http\Controllers\api\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\api\AuthController::class, 
'login']);
//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
 Route::get('/profile', function(Request $request) {
 return auth()->user();
 });
 Route::resource('produks', 
App\Http\Controllers\api\produkcontroller::class);
 // API route for logout user
 Route::post('/logout', 
[App\Http\Controllers\api\AuthController::class, 'logout']);
});
