<?php

use App\Http\Controllers\Api\ApiAuthController;
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

/// روت عرض كل النقابات اللى عندى
Route::get('/unions', [ApiUnionController::class, 'index']);
/// روت تسجيل الدخول
Route::post('/login', [ApiAuthController::class, 'login']);
/// روت إنشاء حساب
Route::post('/register', [ApiAuthController::class, 'register']);
 // روت عرض كل نقابة بالخدمات المتاحة فيها
 Route::get('/unions/show/{id}', [ApiUnionController::class, 'show']);
 // روت عرض كل خدمة
 Route::get('/services/show/{id}', [ApiServiceFormController::class, 'show']);

Route::middleware('auth:sanctum')->group(function(){

    Route::get('/logout', [ApiAuthController::class, 'logout']);
    // روت تخزين بيانات طلب كل خدمة
    Route::post('/services/store/{id}', [ApiServiceFormController::class, 'store']);
    // روت عرض خدمات طلب كل يوزر
    Route::get('/services/myservice/{id}', [ApiServiceFormController::class, 'myservice']);
    // روت تعديل بيانات طلب كل خدمة
    Route::post('/services/update/{id}', [ApiServiceFormController::class, 'update']);
    // روت حذف بيانات كل خدمة طلبها يوزر
    Route::get('/services/delete/{id}', [ApiServiceFormController::class, 'delete']);
});


