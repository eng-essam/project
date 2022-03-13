@extends('web.layout')

@section('title')
خدمة {{ $service->namear }}
@endsection

@section('header')
خدمة {{ $service->namear }} 
@endsection

@section('main')
@include('all.errors')

    <form action="{{url("/union/service/store/$service->id")}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="formFileDisabled" class="form-label">تقرير معتمد من استاذ متخصص لاحد الامراض المزمنة</label>
        <input class="form-control" type="file" id="formFileDisabled" name="report" />
        <br>
        <label for="formFileDisabled" class="form-label"> صورة بطاقه الرقم القومي</label>
        <input class="form-control" type="file" id="formFileDisabled" name="personal_card" />
        <br>
        <label for="formFileDisabled" class="form-label"> صورة ايصال اخر سداد اشتراك النقابة</label>
        <input class="form-control" type="file" id="formFileDisabled" name="receipt" />
        <br>
        <label for="formFileDisabled" class="form-label">صوره ايصال مصاريف الخدمة</label>
        <input class="form-control" type="file" id="formFileDisabled" name="cost" />
        <br>
        
        <input type="submit" value="add">
    </form>
@endsection
