@extends('all.layout_log')

@section('title')
    تسجيل دخول
@endsection

@section('main')
    <form action="{{ url('register/member') }}" method="POST" class="register-form validate-form">
        @csrf

        <span class="login-form-title p-b-43">انشاء حساب</span>

        <div>
            <div>
                <input name="email" type="text" value="{{ old('email') }}" class="bg-light"
                    placeholder="البريد الإلكتروني">
            </div>
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>

        <div>
            <div>
                <input name="password" type="password" class="bg-light" placeholder="كلمة السر">
            </div>
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>
        <div>
            <div>
                <input name="password_confirmation" type="password" class="bg-light" placeholder="تأكيد كلمة السر">
            </div>
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>
        <div>
            <div>
                <input name="ssn" type="text" value="{{ old('ssn') }}" class="bg-light" placeholder="الرقم القومي">
            </div>
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('ssn')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>
        <div>
            <div>
                <input name="union_number" type="text" value="{{ old('union_number') }}" class="bg-light"
                    placeholder="كود النقابة">
            </div>
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('union_number')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>

        <div class="container-register-form-btn mt-4 mb-4">
            <button type="submit" class="register-form-btn">
                إنشاء
            </button>
        </div>

        <div class="flex-sb-m w-full p-t-3 p-b-32 ">

            <div>
                <a href="{{ url('/login') }}" class="txt1">
                    تسجيل دخول
                </a>
            </div>

            <div>
                <a href="{{ url('/problem') }}" class="txt1">
                    مشكلة في التسجيل؟
                </a>
            </div>

        </div>

    </form>
@endsection
