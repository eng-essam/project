@extends('web.layout')

@section('title')
    النقابات المتاحة
@endsection



@section('main')
    <div class="container">
        <div class="row">
            @foreach ($unions as $union)
                <div class="col">
                    <a style="text-decoration: none ; font-size: 30px ; font-weight: bold" href="{{ url("union/showservice/$union->id") }}">نقابة
                        {{ $union->name }}</a>
                </div>
            @endforeach
        </div>
    </div>



@endsection
