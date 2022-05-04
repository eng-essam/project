@extends('admin.layout')

@section('link')
    <link rel="stylesheet" href="{{ asset('style_admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('style_admin/css/jquery.fancybox.min.css') }}">
@endsection

@section('title')
    مراجعة طلب العضو
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        مراجعة طلب العضو
    </h1>
@endsection

@section('main')

<div style="direction:rtl;">

    <div class="text main-container">
        <p>
            <span>الاسم:</span>
            {{ $user->name }}
        </p>
        <p>
            اسم الخدمة: {{ $service->namear }}
        </p>
    </div>
    <div class="images main-container">
        <div class="container">

            <div class="main">
                <a data-fancybox="gallery" href="{{ asset("web/$img->card") }}" data-caption=" هذه صورة">
                    <img src="{{ asset("web/$img->card") }}" alt="image">
                </a>
                <p>صورة الكارنيه</p>
            </div>

            <div class="main">
                <a data-fancybox="gallery" href="{{ asset("web/$img->personal_card") }}" data-caption="هذه صورة">
                    <img src="{{ asset("web/$img->personal_card") }}" alt="image">
                </a>
                <p>صورة البطاقة الشخصية</p>
            </div>

            <div class="main">
                <a data-fancybox="gallery" href="{{ asset("web/$img->cost") }}" data-caption="هذه صورة">
                    <img src="{{ asset("web/$img->cost") }}" alt="image">
                </a>
                <p>صورة وصل سداد الخدمة</p>
            </div>

        </div>

        <div style="background-color: red" class="approve">
            <h2>مراجعة الطلب</h2>
            <div style="direction:rtl;">
                <textarea style="background-color: rgb(24, 20, 20);" name="text" value="" id=""></textarea>

            </div>
            <div class="buttons">
                <a>موافقة</a>
                <a>رفض</a>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
    <script src="{{ asset('style_admin/js/jquery.fancybox.min.js') }}"></script>

@endsection
