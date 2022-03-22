@extends('web.layout')

@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/login.css') }}" />
@endsection

@section('title')
    صفحة تسجيل الدخول
@endsection

@section('main')
    <div class="login d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card login-form">
                <div class="card-body">
                    <div class="inner-login w-100 d-flex">
                        <div class="buttons">
                            <a href="{{ url('/register/member') }}" class="btn">إنشاء حساب</a>
                        </div>
                        <div class="logo">
                            <img src="{{ asset('style/img/1.jpg') }}" alt="image">
                        </div>
                    </div>
                    <h1 class="card-title text-center">
                        مرحباً بكم !
                    </h1>
                    <div class="card-text">

                        @include('all.errors')

                        <form action="{{ url('/guest/login') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail" class="float-end">البريد الإلكتروني</label>
                                <input type="email" value="{{ old('email') }}" class="form-control form-control-sm" id="" name="email" placeholder="البريد الإلكتروني">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword" class="float-end">كلمة السر</label>
                                <input type="password" class="form-control form-control-sm" id="" name="password" placeholder="كلمة السر">
                            </div>

                            <button class="btn button mt-3" type="submit">تسجيل الدخول</button>

                            <div class="info clearfix">
                                <a href="{{ url('/') }}" class="back">الصفحة الرئيسية</a>
                                <a href="{{ url('/requestPassword') }}" class="forget">نسيت كلمة السر؟</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
