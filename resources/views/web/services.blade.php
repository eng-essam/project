@extends('web.layout')

@section('title')
    الخدمات المتاحة
@endsection

@section('header')
    <h1 style="width: max-content ;margin: auto"> الخدمات المتاحه لنقابة {{ $union->name }}</h1>
@endsection

@section('main')
    <div style="margin-right:30px ;float: right; ">
        @include('all.errors')

        <form action="{{ url('/union/service/search') }}" method="GET">
            <input type="text" name="keyword">
            <br>
            <input type="submit" value="بحث">
        </form>
    </div>
   



    @if (session('servicess_error'))
        <div class="alert alert-danger" style="margin: auto ;width: max-content">
            <div style="direction: rtl   ; width: max-content  ;font-size: 20px ;margin-bottom: 10px ">
                {{ session('servicess_error') }}
            </div>
            <div style="margin: auto ; width: max-content">
                <a style="text-decoration: none ; background-color: red ; color: white ; padding: 5px ;font-size:20px"
                    href="{{ url('member/service/delete/' . session('id')) }}">حذف</a>
                <a style="text-decoration: none ; background-color: green ; color: white ;padding:5px 20px ;font-size:20px"
                    href="{{ url("union/showservice/$union->id") }}">لا</a>
            </div>

        </div>
    @endif



    <div class="container" style="margin-top: 50px">
        <div class="row row-cols-3 ">
            @foreach ($servicess as $service)
                <div class="col" style="width: 1000; height: 90px;">

                    <a style="text-decoration: none  ;font-size: 30px ; background-color: beige ;"
                        href="{{ url("union/serviceform/{$service->id}") }}">
                        {{ $service->namear }}
                    </a>

                </div>
            @endforeach
        </div>
    </div>


    
@endsection
