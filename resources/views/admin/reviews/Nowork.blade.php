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

            <img src="{{ asset("web/$img->disclaimer") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->fulltime") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->card") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->personal_card") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->ministry") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->endServ") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->brent") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->insurance") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->cost") }}" alt="" height="250px">


        </div>
    </div>
@endsection
