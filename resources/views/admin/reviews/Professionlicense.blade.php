@extends('admin.layout')

@section('title')
     مراجعة طلب العضو
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        بحث عن عضو
    </h1>
@endsection

@section('main')
    <div class="card" style="direction: rtl">
        <div class="card-body">

            <img src="{{ asset("web/$img->model") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->graduation") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->excellence") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->birth") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->personal") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->fesh") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->situation") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->receipt") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->certificate") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->cost") }}" alt="" height="250px">


        </div>
    </div>
@endsection
