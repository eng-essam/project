@extends('web.layout')

@section('title')
    نسيت كلمة السر
@endsection



@section('main')
    <div class="container">

        @include("all.errors")

        <form action="{{ url('/forgot-password') }}" method="POST">
            @csrf
            <label>البريد الالكتروني</label>
            <input type="email" name="email">
            <br>
            <input type="submit" value="ارسال">
        </form>
    </div>
@endsection
