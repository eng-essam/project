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
        @csrf
        <label>صوره البطاقةالشخصية</label>
        <input style="width: 250px;margin-top: 10px" class="form-control" type="file" name="personal_card" />
        <label>تقرير معتمد من استاذ متخصص لاحد الامراض المزمنة</label></h5>
        <input style="width: 250px; margin-top: 10px" class="form-control" type="file" name="report" />
        <label>صورة ايصال اخر سداد اشتراك النقابة</label></h5>
        <input style="width: 250px; margin-top: 10px" class="form-control" type="file" name="receipt" />
        <label>صوره ايصال مصاريف الخدمة</label></h5>
        <input style="width: 250px; margin-top: 10px" class="form-control" type="file" name="cost" />
        <input  type="submit" value="add">
    </form>
@endsection
