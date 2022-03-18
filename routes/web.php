<?php

use App\Http\Controllers\ServiceFormController;
use App\Http\Controllers\Super\SuperController;
use App\Http\Controllers\web\Authcontroller;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\UnionController;
use Illuminate\Support\Facades\Route;

// عرض جميع الخدامات الموجوده في نقابة معينة
Route::get('/union/showservice/{id}', [ServiceController::class, 'showservice']);
//البحث عن خدمة معينة في نقابة معينه
Route::get('/union/service/search', [ServiceController::class, 'search']);

/////////////صفحات الضيف//////////////////
Route::middleware('guest')->group(function () {
    //تسجيل عضو ف الموقع لاول مره
    Route::get('/register/member', [Authcontroller::class, 'register_member']);

    // مراجعة بيانات  تسجيل عضو ف الموقع لاول مره
    Route::post('/register/member', [Authcontroller::class, 'member_register']);

    //صفحة كتابة البريد لتغيير كلمة السر
    Route::get('/requestPassword', [Authcontroller::class, 'requestPassword']);

    //عرض جميع النقابات الموجوده في الموقع
    Route::get('/', [UnionController::class, 'index']);
});

///////////صفحات الاعضاء////////////////
Route::middleware('auth', 'member')->group(function () {
    //عرض فورم رفع البيانات لخدمة معينة
    Route::get('/union/serviceform/{id}', [ServiceController::class, 'serviceform']);

    //تخزين بيانات الخدمة اللي العضو طلبها
    Route::post('/union/service/store/{id}', [ServiceFormController::class, 'store']);

    //عرض خدمات العضو اللي طلبها
    Route::get('/member/myservice', [ServiceController::class, 'myservice']);

    //حذف بيانات خدمة العضو طلبها
    Route::get('/member/service/delete/{id}', [ServiceController::class, 'delete']);

    //فورم تعديل بيانات خدمة
    Route::get('/member/service/eidt/{id}', [ServiceController::class, 'eidt']);

    //تعديل بيانات خدمة
    Route::post('/member/service/update/{id}', [ServiceFormController::class, 'update']);
});

///////////صفحات السوبر ادمن//////////////
Route::middleware('auth', 'superadmin')->group(function () {

    //عرض جميع الاعضاء في نقابة معينة
    Route::get('/all/member', [SuperController::class, 'all_member']);

    //البحث عن عضو في النقابة
    Route::get('/search/member', [SuperController::class, 'search_member']);

    //حذف عضو من التقابة
    Route::get('/delet/member/{id}', [SuperController::class, 'delet_member']);

    //تعديل بيانات عضو
    Route::get('/edit/member/{id}', [SuperController::class, 'edit_member']);

    //تعديل بيانات عضو
    Route::post('/edit/update/{id}', [SuperController::class, 'edit_update']);

    //جميع المشرفين ف النقابة
    Route::get('/all/admin', [SuperController::class, 'all_admin']);

    //البحث عن مشرف
    Route::get('/search/admin', [SuperController::class, 'search_admin']);

    //حذف مشرف من التقابة
    Route::get('/delet/admin/{id}', [SuperController::class, 'delet_admin']);

    //تعديل بيانات عضو
    Route::get('/edit/admin/{id}', [SuperController::class, 'edit_admin']);

    //تعديل بيانات عضو
    Route::post('/edit/update_admin/{id}', [SuperController::class, 'update_admin']);

    //اضافة مشرف
    Route::get('/add/admin', [SuperController::class, 'add_admin']);

    //تخزين بيانات المشرف
    Route::post('/add/admin', [SuperController::class, 'update']);

    //اضافة عضو
    Route::get('/add/member', [SuperController::class, 'add_member']);

    //تخزين بيانات عضو
    Route::post('/add/member', [SuperController::class, 'update_member']);

    // عرض جميع الخدامات الموجوده في نقابة معينة
    Route::get('/admin/service', [SuperController::class, 'showservice']);

    // تعديل سعر خدمة
    Route::get('/edit/service/cost/{id}', [SuperController::class, 'cost_service']);

    // تعديل سعر خدمة
    Route::post('/edit/service/cost/{id}', [SuperController::class, 'cost']);

    //صفحة معلومات السوبر الادمن
    Route::get('/super/info', [SuperController::class, 'info']);

    // صفحة تعديل معلومات  السوبرالادمن
    Route::get('/super/edit/info', [SuperController::class, 'form_info']);

    //مراجعة بيانات السوبر الادمن الجديده
    Route::post('/super/update/info', [SuperController::class, 'update_info']);

    // صفحة تعديل كلمة السر  السوبرالادمن
    Route::get('/super/edit/password', [SuperController::class, 'form_password']);

    //مراجعة كلمة السر السوبر الادمن الجديده
    Route::post('/super/update/password', [SuperController::class, 'update_password']);

    //عرض  جميع العمليات اللي بتحصل ف النقابة
    Route::get('/super/operation', [SuperController::class, 'operation']);

    //عرض العمليات اللي تم قبولها فقط ف النقابة
    Route::get('/accept/operation', [SuperController::class, 'accept_operation']);

    //عرض العمليات اللي تم رفضها فقط ف النقابة
    Route::get('/refuse/operation', [SuperController::class, 'refuse_operation']);

    //عرض العمليات اللي مازالت في مرحلة المراجعة ف النقابة
    Route::get('/check/operation', [SuperController::class, 'check_operation']);

    //البحث عن طلبات عضو معين
    Route::get('/search/member/operation', [SuperController::class, 'search_member_operation']);

});

//صفحات ادمن
Route::middleware('auth', 'admin')->group(function () {
    //اضافة  عضو في الداتا بيز
    Route::get('/register/admin', [Authcontroller::class, 'register_admin']);

    //مراجعة بيانات  العضو اللي اضاف
    Route::post('/register/admin', [Authcontroller::class, 'admin_register']);
});
