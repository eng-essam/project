@extends('all.layout_log')

@section('title')
    تسجيل دخول
@endsection

@section('main')
    <form action="{{ url('reset-password') }}" method="POST" class="confirm-form validate-form">
        @csrf
        <span class="confirm-form-title p-b-43">
            إعادة تعيين كلمة السر
        </span>

        <div>
            <div>
                <input name="email" type="email" class="bg-light" value="{{ old('email') }}"
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
            <input name="password" type="password" class="bg-light" placeholder=" كلمة السر">
            <div class="small mt-0 ">
                <small class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </small>
            </div>
        </div>
        <div>
            <input name="password_confirmation" type="password" class=" bg-light" placeholder=" تأكيد كلمة السر">
            <div class="small mt-0 ">
                <small class="text-danger">
                </small>
            </div>
        </div>
        <input type="hidden" class=" bg-light" value="{{ request()->route('token') }}" name="token">

        <div class="container-confirm-form-btn mt-4 mb-4">
            <input type="submit" class="confirm-form-btn" value="ارسال">
        </div>


    </form>
@endsection
