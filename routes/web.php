<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Super\SuperController;
use App\Http\Controllers\web\Authcontroller;
use App\Http\Controllers\Web\ServiceController;
use App\Http\Controllers\Web\UnionController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'prevent-back-history'], function () {

    // عرض جميع الخدامات الموجوده في نقابة معينة
    Route::get('/union/showservice/{id}', [ServiceController::class, 'showservice']);
    //البحث عن خدمة معينة في نقابة معينه
    Route::get('/union/service/search', [ServiceController::class, 'search']);
    // نسيت كلمة السر
    Route::get('/forgot/password', [Authcontroller::class, 'forgot_password']);

    Route::get('/member_logout', [Authcontroller::class, 'member_logout']);

/////////////صفحات الضيف//////////////////
    Route::middleware('guest')->group(function () {

        //تسجيل دخول
        Route::post('/guest/login', [Authcontroller::class, 'guest_login']);

        //تسجيل عضو ف الموقع لاول مره
        Route::get('/register/member', [Authcontroller::class, 'register_member']);

        // مراجعة بيانات  تسجيل عضو ف الموقع لاول مره
        Route::post('/register/member', [Authcontroller::class, 'member_register']);

        //صفحة كتابة البريد لتغيير كلمة السر
        Route::get('/requestPassword', [Authcontroller::class, 'requestPassword']);

        //عرض جميع النقابات الموجوده في الموقع
        Route::get('/', [UnionController::class, 'index']);

        //عرض صفحة مشكلة في التسجيل
        Route::get('/problem', [Authcontroller::class, 'problem']);

    });

///////////صفحات الاعضاء/////////////// /
    Route::middleware('auth', 'member')->group(function () {
        //الصفحة الرئيسية
        Route::get('/union/home', [ServiceController::class, 'home']);

        //صفحة الاخبار
        Route::get('/union/information', [ServiceController::class, 'information']);

        //صفحة معلومات العضو
        Route::get('/member/info', [Authcontroller::class, 'info']);

        //صفحة تعديل معلومات  العضو
        Route::get('/member/edit/info', [Authcontroller::class, 'form_info']);

        //مراجعة  تعديل بيانات الجديدة العضو
        Route::post('/member/update/info', [Authcontroller::class, 'update_info']);

        // صفحة تعديل كلمة السر  العضو
        Route::get('/member/edit/password', [Authcontroller::class, 'form_password']);

        //مراجعة كلمة السر السوبر العضو
        Route::post('/member/update/password', [Authcontroller::class, 'update_password']);

        //عرض وصف بيانات خدمة معينة
        Route::get('/union/servicedesc/{id}', [ServiceController::class, 'servicedesc']);

        Route::middleware('verified')->group(function () {

            //عرض فورم رفع البيانات لخدمة معينة
            Route::get('/union/serviceform/{id}', [ServiceController::class, 'serviceform']);

            //تخزين بيانات الخدمة اللي العضو طلبها
            Route::post('/union/service/store/{id}', [ServiceController::class, 'store']);

            //تعديل بيانات خدمة
            Route::post('/member/service/update/{id}', [ServiceController::class, 'update']);

            //عرض خدمات العضو اللي طلبها
            Route::get('/member/myservice', [ServiceController::class, 'myservice'])->middleware('verified');

            //حذف بيانات خدمة العضو طلبها
            Route::get('/member/service/delete/{id}', [ServiceController::class, 'delete']);

            //فورم تعديل بيانات خدمة
            Route::get('/member/service/eidt/{id}', [ServiceController::class, 'eidt']);

        });

    });

///////////صفحات السوبر ادمن//////////////
    Route::middleware('auth', 'superadmin')->group(function () {

        //اضافة عضو
        Route::get('/add/member', [SuperController::class, 'add_member']);
        //تخزين بيانات عضو
        Route::post('/add/member', [SuperController::class, 'update_member']);
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
        //تعديل بيانات مشرف
        Route::get('/edit/admin/{id}', [SuperController::class, 'edit_admin']);
        //تعديل بيانات مشرف
        Route::post('/edit/update_admin/{id}', [SuperController::class, 'update_admin']);
        //اضافة مشرف
        Route::get('/add/admin', [SuperController::class, 'add_admin']);
        //تخزين بيانات المشرف
        Route::post('/add/admin', [SuperController::class, 'update']);
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
        //صفحة اعدادات النقابة
        Route::get('/union/setting', [SuperController::class, 'union_setting']);
        //صفحة اعدادات  رقم الهاتف الخاص بالنقابة
        Route::get('/union/setting/phone', [SuperController::class, 'union_setting_phone']);
        Route::post('/union/setting/phone', [SuperController::class, 'setting_phone']);
         //صفحة اعدادات  رقم الحساب البنكي الخاص بالنقابة
         Route::get('/union/setting/bank', [SuperController::class, 'union_setting_bank']);
         Route::post('/union/setting/bank', [SuperController::class, 'setting_bank']);
        //البحث عن طلبات عضو معين
        Route::get('/search/member/operation', [SuperController::class, 'search_member_operation']);

    });

///////////صفحات ادمن//////////////
    Route::middleware('auth', 'admin')->group(function () {
        //اضافة عضو
        Route::get('/admin/add/member', [AdminController::class, 'add_member']);
        //تخزين بيانات عضو
        Route::post('/admin/add/member', [AdminController::class, 'update_member']);
        //عرض جميع الاعضاء في نقابة معينة
        Route::get('/admin/all/member', [AdminController::class, 'all_member']);
        //البحث عن عضو في النقابة
        Route::get('/admin/search/member', [AdminController::class, 'search_member']);
        //صفحة معلومات الادمن
        Route::get('/admin/info', [AdminController::class, 'info']);
        // صفحة تعديل معلومات الادمن
        Route::get('/admin/edit/info', [AdminController::class, 'form_info']);
        //مراجعة بيانات الادمن الجديده
        Route::post('/admin/update/info', [AdminController::class, 'update_info']);
        // صفحة تعديل كلمة السر الادمن
        Route::get('/admin/edit/password', [AdminController::class, 'form_password']);
        //مراجعة كلمة السر الادمن الجديده
        Route::post('/admin/update/password', [AdminController::class, 'update_password']);
        //عرض جميع الخدمات المطلوبه
        Route::get('/admin/operation', [AdminController::class, 'operation']);
        //البحث عن طلبات عضو معين
        Route::get('/admin/search/member/operation', [AdminController::class, 'search_member_operation']);
        // صفح مراجعة طلبات الاعضاء
        Route::get('/admin/review/service/{member}/{service}', [AdminController::class, 'review']);
        // مراجعة طلبات الاعضاء
        Route::post('/admin/review/{member}/{service}', [AdminController::class, 'reviewservice']);

    });

});
