<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\Api\ApiServiceController;
use App\Http\Controllers\Api\ApiServiceFormController;
use App\Http\Controllers\Api\ApiUnionController;
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

Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::get('/logout', [ApiAuthController::class, 'logout']);
// All Unions
Route::get('/unions', [ApiUnionController::class, 'index']);
// every union with its services
Route::get('/unions/show/{id}', [ApiUnionController::class, 'show']);
// only service
Route::get('/services/show/{id}', [ApiServiceController::class, 'show']);
Route::post('/services/store/{id}', [ApiServiceFormController::class, 'store']);
