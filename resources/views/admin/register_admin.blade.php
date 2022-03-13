@extends('web.layout')

@section('title')
    سجل بيانات
@endsection

@section('main')
    @include('all.errors')



    <h1>الادمن </h1>
    <h1>تسجيل بيانات عضو</h1>
    <h1> {{ $union->name }}</h1>
    <h1>{{ $loggedUser->name }}</h1>


    <form action="{{ url('/register/admin') }}" method="post">
        @csrf

        <input type="text" name="name" placeholder="name">
        <br>
        <input type="text" name="union_number" placeholder="union_number">
        <br>
        <input type="text" name="ssn" placeholder="ssn">
        <br>
        <input type="text" name="phone" placeholder="phone">
        <br>
        <select name="sex">
            <option value="ذكر">ذكر</option>
            <option value="انثي">انثي</option>
        </select>
        <br>
        <input type="submit" name="register">
        <br>

    </form>
@endsection
