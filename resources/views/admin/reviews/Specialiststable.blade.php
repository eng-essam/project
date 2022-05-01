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

            <img src="{{ asset("web/$img->registration") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->personal_card") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->card") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->specialty") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->personal") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->receipt") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->experience") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->fellowship") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->Professional") }}" alt="" height="250px">
            <img src="{{ asset("web/$img->cost") }}" alt="" height="250px">


        </div>
    </div>
@endsection
