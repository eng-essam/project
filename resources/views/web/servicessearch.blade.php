@extends('web.layout')

@section('title')
    البحث عن خدمة {{ $keyword }}
@endsection

@section('main')
    <h1 style="width: max-content ;margin: auto"> البحث عن خدمة  "{{ $keyword }}"  في نقابة {{ $union->name }}</h1>

    <div style="margin-right:30px ;float: right;">
        @include('all.errors')  
        <form action="{{ url('/union/service/search') }}" method="GET">
            <input type="text" name="keyword">
            <br>
            <input type="submit" value="search">
        </form>
    </div>
   




  


    <div class="container" style="margin-top: 50px">
        <div class="row row-cols-3 ">
            @foreach ($services as $service)
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
