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

    ///////// روت عرض معلومات اليوزر
    Route::get('/userInfo', [ApiAuthController::class, 'userInfo']);

    ////////// روت تغيير كلمة السر
    Route::post('/changePassword', [ApiAuthController::class, 'changePassword']);

    ////////// روت تغيير البريد الالكترونى
    Route::post('/changeEmail', [ApiAuthController::class, 'changeEmail']);

    /////////// روت تغيير رقم الهاتف
    Route::post('/changePhone', [ApiAuthController::class, 'changePhone']);

    //////// روت تسجيل خروج
    Route::get('/logout', [ApiAuthController::class, 'logout']);

    /////// روت البحث عن خدمة معينة في نقابة معينه
   //Route::post('/services/search', [ApiServiceFormController::class, 'search']);

     ///// روت معرفة اذا كان اليوزر طلب الخدمة ولا لا
     Route::get('/serviceInfo/{id}', [ApiServiceFormController::class, 'serviceInfo'] );

     // روت تخزين بيانات طلب كل خدمة
     Route::post('/services/store/{id}', [ApiServiceFormController::class, 'store']);

     // روت عرض خدمات طلب كل يوزر
     Route::get('/services/myservice', [ApiServiceFormController::class, 'myservice']);

     // روت تعديل بيانات طلب كل خدمة
     Route::post('/services/update/{id}', [ApiServiceFormController::class, 'update']);

     // روت حذف بيانات كل خدمة طلبها يوزر
     Route::get('/services/delete/{id}', [ApiServiceFormController::class, 'delete']);




});


