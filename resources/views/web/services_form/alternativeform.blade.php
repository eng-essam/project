@extends('web.layout')

@section('title')
    خدمة {{ $service->namear }}
@endsection

@section('header')
    خدمة {{ $service->namear }}
@endsection

@section('main')
    @include('all.errors')
    <form action="{{ url("/union/service/store/$service->id") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="formFileDisabled" class="form-label"> صوره الكارنية</label>
        <input class="form-control" type="file" id="formFileDisabled" name="card" />
        <br>
        <label for="formFileDisabled" class="form-label">صوره البطاقة الشخصية</label>
        <input class="form-control" type="file" id="formFileDisabled" name="personal_card" />
        <br>
        <label for="formFileDisabled" class="form-label">صوره ايصال اخر سداد</label>
        <input class="form-control" type="file" id="formFileDisabled" name="recept" />
        <br>
        <label for="formFileDisabled" class="form-label">صوره ايصال مصاريف الخدمة</label>
        <input class="form-control" type="file" id="formFileDisabled" name="cost" />
        <br>
        <input type="submit" value="add">
    </form>
@endsection
