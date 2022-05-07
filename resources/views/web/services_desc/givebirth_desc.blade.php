@extends('web.layout_member')

@section('style')
    <link href="{{ asset('style_member/assets/service/home.css') }}" rel="stylesheet">
@endsection

@section('main')
    <main style="margin-top:50px " style="margin-top: 50px" id="main">
        <!-- ======= service Details Section ======= -->
        <section id="service-details" class="service-details">
            @if (session('servicess_error'))
                <div style="text-align: center;margin-bottom: 20px">
                    <div style="width: max-content;margin: auto" class="alert alert-success">
                        <p> {{ session('servicess_error') }} </p>
                    </div>
                </div>
            @endif
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-8 mobile-hidden">
                        <div class="service-details-slider">
                            <div class="align-items-center" data-aos="zoom-out" data-aos-delay="200">
                                <img src="{{ asset('style_member/assets/img/hero-img.png') }}" class="img-fluid"
                                    alt="image" />




                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" style="direction: rtl">
                        <div class="service-info">
                            <h3>{{ $service->namear }}</h3>
                            <ul>
                                <li><strong>وصف الخدمة</strong></li>
                                <ul>
                                    <li>
                                        {{ $service->title }}
                                    </li>
                                </ul>
                            </ul>
                        </div>
                        <div class="service-condition">
                            <h2>الشروط الواجب توافرها للحصول علي الخدمة</h2>
                            <ul>
                                <li class="mb-3"> تقريرين معتمدين من استاذين متخصصين لاحدي
                                    الأمراض
                                    المزمنة</li>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End service Details Section -->>
    </main>

    <!-- ======= orders Section ======= -->
    <section id="orders" class="orders" style="direction: rtl">
        <div class="container" data-aos="fade-up">
            <header class="section-header text-center">
                <h2>المستندات المطلوبة</h2>
                <p>هذه المستندات المطلوبة لإتمام الخدمة</p>
            </header>

            <div class="card">
                <div class="card-body" style="direction: rtl">
                    <div class="row">
                        <!-- الجانب الايمن-->
                        <div class="col-md-6">
                            <!-- ادخل-->
                            <div class="form-group main mobile-hidden">
                                <img src="{{ asset('style_member/assets/img/values-3.png') }}" class="img-fluid"
                                    alt="" />
                            </div>


                        </div>

                        <!-- الجانب الايسر-->
                        <div class="col-md-6 left left-giveBirth">

                            <!-- ادخل-->
                            <div class="form-group main">
                                <div class="input-group inner" style="direction: rtl">
                                    <ul class="ul">
                                        <li>أصل فاتورة المستشفي معتمدة ومختومة</li>
                                        <li>تقرير طبي موضح به نزع الوضع</li>
                                        <li>صورة شهادة ميلاد الطفل معتمدة ومختومة</li>
                                        <li>صورة كارنيه النقابة</li>
                                        <li>صورة ايصال اخر سداد اشتراك كارنيه النقابة</li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End orders Section -->

    <!-- start payment -->
    <div class="payment" style="background: #fff">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <h4>الرسوم</h4>
                    <p class="fs-5 mt-2">رسوم الخدمة: {{ $services_cost->pivot->service_cost }}</p>
                    <p>
                        يتم دفع الرسوم عن طريق تحويل المبلغ علي الحساب والإحتفاظ بصورة
                        لوصل الدفع
                    </p>
                    <div>
                        <p>فودافون كاش: {{$union->phone}}</p>
                        <p>البنك الاهلي: 12345</p>
                    </div>
                </div>
                <a type="submit" href="{{ url("/union/serviceform/$service->id") }}" class="text-center">إبدأ
                    الخدمة</a>
            </div>
        </div>
    </div>
    <!-- end payment -->
@endsection
