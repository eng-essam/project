@extends('all.layout_log')

@section('title')
    تسجيل دخول
@endsection

@section('main')


    <form class="problem-form">

        <span class="problem-form-title p-b-43">
            عند وجود مشكلة في بيانات إنشاء الحساب يرجي التواصل مع النقابة
        </span>

        <div class="text-center">
            <select id="governerate" class="form-select problem-form-btn text-center w-50" style="margin-right: 110px;">
                <option value="" >إختر النقابة </option>
                @foreach ($unions as $union)
                <option value="{{$union->phone}}">{{$union->name}}</option>
                @endforeach

            </select>
        </div>
        <div class="text-center form-group mt-5 mb-4">
            <label class="label .txt2 mt-2">
                رقم الشكاوي الخاص بالنقابة
            </label>
            <div class="number-info mt-4" style="height: 60px; padding-top: 15px;" id="numberContainer">
            </div>
        </div>

        <div class="container-problem-form-btn mt-4 mb-4">
            <a href="{{url('/login')}}" class="problem-form-btn">
                السابق
            </a>
        </div>

    </form>

@endsection

@section('script')
<script src="{{ asset('style_log/js/number.js') }}"></script>
@endsection
