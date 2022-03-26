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
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
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

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>النقابات المتاحة</p>
                </header>

                <div class="row">


                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/Teeth.gif') }}" class="img-fluid" alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold"
                                href="{{ url('union/showservice/2') }}">نقابة الاسنان</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/doctor.gif') }}" class="img-fluid" alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold"
                                href="{{ url('union/showservice/3') }}">نقابة طب بشري</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/veterinary.gif') }}" class="img-fluid"
                                alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold"
                                href="{{ url('union/showservice/4') }}">نقابة طب بطري</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/pharmacy.gif') }}" class="img-fluid" alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold"
                                href="{{ url('union/showservice/1') }}">نقابة الصيدلة</a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/77366-engineering.gif') }}" class="img-fluid"
                                alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold" href="#">نقابة المهندسين </a>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                        <div class="box">
                            <img src="{{ asset('style_member/assets/img/sport.gif') }}" class="img-fluid" alt="">
                            <a style="color: #012970;font-size: 25px;font-weight: bold" href="#">نقابة المهن الرياضية</a>
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!-- End Values Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div style="direction: rtl;" class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="content">
                            <h2>الموقع يُتيج للاعضاء تنفيذ الخدمات النقابية اونلاين لتوفير
                                الوقت والجهد على جميع اعضاء النقابات </h2>
                            <ul class="mt-5 mb-5 fs-5">
                                <li class="pb-2">تجديد عضوية النقابة.</li>
                                <li class="pb-2">صرف معاش التقاعد.</li>
                                <li class="pb-2">صرف إعانة العجز الصحي.</li>
                                <li class="pb-2">صرف إعانة زواج لبنات الأعضاء المتوفيين.</li>
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

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        <img src="{{ asset('style_member/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->

    </main>
    <!-- End #main -->
@endsection