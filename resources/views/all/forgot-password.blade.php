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

        <form action="{{ url('/forgot-password') }}" method="POST">
            @csrf
            <label>البريد الالكتروني</label>
            <input type="email" name="email">
            <br>
            <input type="submit" value="ارسال">
        </form>
    </div>
@endsection
