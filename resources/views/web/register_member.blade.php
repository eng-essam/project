@extends('web.layout')

@section('title')
    سجل بيانات
@endsection

@section('main')
    @include('all.errors')

    @if (request()->session()->has('error-msg'))
        <div class="alert alert-danger">
            <p> {{ request()->session()->get('error-msg') }} </p>
        </div>
    @endif

    <form action="{{ url('register/member') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="email">
        <br>
        <input type="password" name="password" placeholder="password">
        <br>
        <input type="password" name="password_confirmation" placeholder="password_confirmation">
        <br>
        <input type="text" name="ssn" placeholder="ssn">
        <br>
        <input type="text" name="union_number" placeholder="union number">
        <br>
        <input type="submit" name="تسجيل">
        <br>
    </form>
@endsection
