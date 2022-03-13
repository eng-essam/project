@extends('web.layout')

@section('title')
    تعديل بيانات {{ $service->namear }}
@endsection

@section('header')
    <h1 style="width: max-content;margin: 20px auto">تعديل بيانات {{ $service->namear }}</h1>
@endsection

@section('main')

    @include('all.errors')
    <form action="{{ url("/member/service/update/$service->id") }}" method="POST" enctype="multipart/form-data">

    </form>
@endsection
