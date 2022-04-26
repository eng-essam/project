@extends('web.layout_member')

@section('header')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 style="font-size: 37px;" data-aos="fade-up">معلوماتك النقابية من
                        مكان واحد </h1>
                    <h2 style="direction: rtl;" data-aos="fade-up" data-aos-delay="400" class="text-center">هذا
                        الموقع صُمم لكي يساعد الأعضاء على إتمام الخدمات النقابية أونلاين
                        وبسهولة</h2>
                    @guest
                        <div data-aos="fade-up" data-aos-delay="600">
                            <div style="direction: rtl;" class="text-center text-lg-start">
                                <a href="{{ url('login') }}"
                                    class="btn-get-started scrollto d-inline-flex
                            align-items-center justify-content-center align-self-center">
                                    <span style="margin-left: 10px;">تسجيل دخول</span>
                                    <i class="bi bi-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    @endguest
                </div>
                <div class="col-lg-6 hero-img mobile-hidden" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('style_member/assets/img/hero-img.png') }}" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div style="margin-bottom:100px "  class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>اخبار النقابة</p>
                </header>

                <div class="row gy-4" style="direction: rtl;">

                    @foreach ($informations as $new)
                        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="700">
                            <div style="padding: 5px ;width:250px;" class="service-box blight">
                                <h3>{{ $new->header }}</h3>
                                <p>{{ $new->titel }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>اكثر الخدمات طلبا</p>
                </header>

                <div class="row gy-4" style="direction: rtl;">

                    @foreach ($servicess as $service)
                        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="700">
                            <div style="padding: 5px ;width:250px;" class="service-box blight">
                                <img style="width: 100px;height: 100px;margin-bottom: 5px" src="{{ $service->img }}">
                                <h3>{{ $service->namear }}</h3>
                                <p>{{ $service->title }}</p>
                                <a href="{{ url("/union/servicedesc/$service->id") }}" class="read-more"><span>إقرأ
                                        المزيد</span><i class="bi bi-arrow-left"></i> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- End Services Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div style="direction: rtl;" class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h2>الموقع يُتيج للاعضاء تنفيذ الخدمات النقابية اونلاين لتوفير
                                الوقت والجهد على جميع اعضاء النقابات </h2>
                            <ul class="mt-5 mb-5 fs-5">
                                @foreach ($servicess as $service)
                                <li class="pb-2">{{ $service->namear }}.</li>
                                @endforeach

                            </ul>
                            @guest
                                <div class="text-center text-lg-start">
                                    <a href="#"
                                        class="btn-read-more d-inline-flexalign-items-center justify-content-centeralign-self-center">
                                        <span style="margin-left: 10px;">المزيد</span>
                                        <i class="bi bi-arrow-left"></i>
                                    </a>
                                </div>
                            @endguest

                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center mobile-hidden" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('style_member/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->
    </main>
    <!----- End #main ---->
@endsection
