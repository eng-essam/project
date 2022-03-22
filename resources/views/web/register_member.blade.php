@extends('web.layout')

@section('title')
    تسجيل بيانات
@endsection


@section('style')
    <link rel="stylesheet" href="{{ asset('style/css/login.css') }}" />
@endsection

@section('main')
    <div class="login d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="card login-form">
                <div class="card-body">
                    <div class="inner-login w-100 d-flex">
                        <div class="buttons">
                            <a href="{{ url('/login') }}" class="btn">تسجيل الدخول</a>
                        </div>
                        <div class="logo">
                            <img src="{{ asset('style/img/1.jpg') }}" alt="image">
                        </div>
                    </div>
                    <h1 class="card-title text-center">
                        مرحباً بكم !
                    </h1>
                    <div class="card-text">
                        <form action="{{ url('register/member') }}" method="post">
                            @csrf
                            <div class="form-group mb-3 mr-2">
                                <label for="exampleInputEmail" class="float-end">البريد الإلكتروني</label>
                                <input type="email" class="form-control form-control-sm" id="" name="email"
                                    placeholder="البريد الإلكتروني">
                                <small class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputPassword" class="float-end">كلمة السر</label>
                                <input type="password" class="form-control form-control-sm" id="" name="password"
                                    placeholder="كلمة السر">
                                <small class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputCPassword" class="float-end">تأكيد كلمة السر</label>
                                <input type="password" class="form-control form-control-sm" id=""
                                    name="password_confirmation" placeholder="تأكيد كلمة السر">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputSSN" class="float-end">الرقم القومي</label>
                                <input type="text" class="form-control form-control-sm" id="" name="ssn"
                                    placeholder="الرقم القومي">
                                <small class="text-danger">
                                    @error('ssn')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputCode" class="float-end">كود النقابة</label>
                                <input type="text" class="form-control form-control-sm" id="" name="union_number"
                                    placeholder="كود النقابة">
                                <small class="text-danger">
                                    @error('union_number')
                                        {{ $message }}
                                    @enderror
                                </small>
                            </div>

                            <input type="submit" class="btn button mt-2" value="تسجيل">

                            <div class="info clearfix">
                                <a href="#" class=" forget">خطأ فى التسجيل؟</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
