@extends('web.layout')

@section('title')
    نسيت كلمة السر
@endsection



@section('main')

    <div class="container">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        
        @include("all.errors")
        
        <form action="{{ url('reset-password') }}" method="POST">
            @csrf
            <label>البريد الالكتروني</label>
            <input type="email" name="email">
            <br> 
            <label>كلمة السر </label>
            <input type="password" name="password">
            <br>
            <label>اعادة كتابة كلمة السر</label>
            <input type="password" name="password_confirmation">
            <br>
            <input type="hidden" value="{{request()->route('token')}}" name="token">
            <input type="submit" value="ارسال">
        </form>
    </div>
@endsection
