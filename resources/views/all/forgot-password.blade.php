@extends('all.layout_log')

@section('title')
    تسجيل دخول
@endsection

@section('main')
    <form action="{{ url('/forgot-password') }}" method="POST" class="newpass-form validate-form">
        @csrf
        <span class="newpass-form-title p-b-43"> لإعادة تعيين كلمة السر يرجي إدخال البريد الإلكتروني</span>
        <div style="margin-bottom: 10px">
            @include('all.errors')
        </div>
        <div>
            <div>
                <input name="email" type="text" value="{{ old('email') }}" class="bg-light"
                    placeholder="البريد الإلكتروني">
            </div>
        </div>


        <div class="container-newpass-form-btn mt-4 mb-4"> <input class="newpass-form-btn" type="submit" value="ارسال"></div>

        <div class="flex-sb-m w-full p-t-3 p-b-32 m-auto" style="width:max-content">

            <div><a href="{{ url('/login') }}" class="txt1">السابق</a></div>
        </div>

    </form>
@endsection
