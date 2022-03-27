@extends('web.layout_member')

@section('style')
    <link href="{{ asset('style_member/assets/service/home.css') }}" rel="stylesheet">
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= service Details Section ======= -->
        <section style="margin-top:80px" id="service-details" class="service-details">

            @if (session('servicess_error'))
                <div style="text-align: center;margin-bottom: 20px">
                    <div style="width: max-content;margin: auto" class="alert alert-success">
                        <p> {{ session('servicess_error') }} </p>
                    </div>
                </div>
            @endif

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8">
                        <div class="service-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <img src="{{ asset('style_member/assets/img/hero-img.png') }}" class="img-fluid"
                                    alt="" />
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>

                    <div class="col-lg-4" style="direction: rtl">
                        <div class="service-info">
                            <h3>خدمة بدل فائد</h3>
                            <ul>
                                <li><strong>وصف الخدمة</strong></li>
                                <ul>
                                    <li>
                                        الخدمة الخدمة الخدمة الخدمة الخدمة الخدمة الخدمةالخدمة
                                        الخدمة الخدمة الخدمة الخدمة الخدمة الخدمة الخدمة الخدمة
                                        الخدمةالخدمة الخدمة الخدمة
                                    </li>
                                </ul>
                            </ul>
                        </div>
                        <div class="service-condition">
                            <h2>الشروط الواجب توافرها للحصول علي الخدمة</h2>
                            <ul>
                                <li class="mb-3">أن يكون مسجل تبعاً لأي نقابة</li>
                                <li class="mb-3">أن يكون لديه إيصال آخر سداد</li>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End service Details Section -->
    </main>
    <!-- End #main -->

    <!-- ======= orders Section ======= -->
    <section id="orders" class="orders" style="direction: rtl">

        <div class="container" data-aos="fade-up">
            <header class="section-header text-center">
                <p>المستندات المطلوبة</p>
            </header>

            <div class="card">
                <div class="card-body" style="direction: rtl">
                    <div class="row">
                        <!-- الجانب الايمن-->
                        <div class="col-md-6">
                            <!-- ادخل-->
                            <div class="form-group main">
                                <img src="{{ asset('style_member/assets/img/values-3.png') }}" class="img-fluid"
                                    alt="" />
                            </div>
                        </div>

                        <!-- الجانب الايسر-->
                        <div style="margin-bottom: 30px;" class="col-md-6">
                            <!-- ادخل-->
                            <ul style="line-height: 50px;margin: 70px;">
                                <li style="font-size: 30px">صورة الكارنيه</li>
                                <li style="font-size: 30px">صورة البطاقة الشخصية</li>
                                <li style="font-size: 30px">صورة إيصال آخر سداد</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div style="margin-top: 30px;text-align: center">
            <div>
                <a class="buttom" href="{{ url("/union/serviceform/$service->id") }}">طلب الخدمة</a>
            </div>
        </div>
    </section>

    <!-- End orders Section -->
@endsection
