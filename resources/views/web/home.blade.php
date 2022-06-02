@extends('web.layout_member')

@section('style')
    <link href="{{ asset('style_member/assets/css/web/web.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/css/web/team.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('header')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 style="font-size: 37px;" data-aos="fade-up">خدماتك النقابية من
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

    {{-- <!-- Carousel wrapper -->
        <div id="introCarousel" class="carousel slide carousel-fade
            shadow-2-strong" data-mdb-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
            </ol>

            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h1 class="mb-3">هذا
                                    الموقع صُمم لكي يساعد الأعضاء </h1>
                                <h5 class="mb-4">على إتمام الخدمات النقابية أونلاين
                                    وبسهولة</h5>
                                <a class="btn btn-outline-light btn-lg m-2" href="{{ url('login') }}"
                                    role="button" rel="nofollow" target="_blank">تسجيل دخول</a>
                                <a class="btn btn-outline-light btn-lg m-2" href="{{ url('register/member') }}"
                                    target="_blank" role="button">انشاء حساب</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.3);">
                        <div class="d-flex justify-content-center align-items-center
            h-100">
                            <div class="text-white text-center">
                                <h2>You can place here any content</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single item -->
                <div class="carousel-item">
                    <div class="mask" style="background: linear-gradient(
                    45deg,
                    rgba(29, 236, 197, 0.7),
                    rgba(91, 14, 214, 0.7) 100%
                    );">
                        <div class="d-flex justify-content-center align-items-center
            h-100">
                            <div class="text-white text-center">
                                <h2>And cover it with any mask</h2>
                                <a class="btn btn-outline-light btn-lg m-2"
                                    href="https://mdbootstrap.com/docs/standard/content-styles/masks/" target="_blank"
                                    role="button">Learn
                                    about masks</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Inner -->

            <!-- Controls -->
            <a class="carousel-control-prev" href="#introCarousel" role="button" data-mdb-slide="prev">
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#introCarousel" role="button" data-mdb-slide="next">
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!-- Carousel wrapper --> --}}
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Values Section ======= -->
        <section id="values" class="values">

            <div class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <h3 class="section-title bg-white text-center text-primary px-3">النقابات المتاحة</h3>
                </header>

                <div class="container-fluid">
                    <section>
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/Teeth.gif') }}"
                                                    class="img-fluid" alt="">
                                                <div style="text-align: center">
                                                    <a style="color: #012970;font-size: 25px;font-weight: bold;"
                                                        href="{{ url('union/showservice/2') }}">نقابة الاسنان</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/doctor.gif') }}"
                                                    class="img-fluid" alt="">
                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/3') }}">نقابة طب بشري</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/veterinary.gif') }}"
                                                    class="img-fluid" alt="">

                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/4') }}">نقابة طب بطري</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/pharmacy.gif') }}"
                                                    class="img-fluid" alt="">

                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/1') }}">نقابة الصيدلة</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>

                                                <img src="{{ asset('style_member/assets/img/77366-engineering.gif') }}"
                                                    class="img-fluid" alt="">
                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/8') }}">نقابة المهندسين </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/sport.gif') }}"
                                                    class="img-fluid" alt="">
                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/7') }}">نقابة المهن الرياضية</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/teacher.png') }}"
                                                    class="img-fluid" alt="">

                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/5') }}">نقابة المعلمين</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <img src="{{ asset('style_member/assets/img/lawyer.png') }}"
                                                    class="img-fluid" alt="">


                                                <div style="text-align: center"><a
                                                        style="color: #012970;font-size: 25px;font-weight: bold"
                                                        href="{{ url('union/showservice/6') }}">نقابة المحامين</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>




            </div>

        </section>
        <!-- End Values Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <header class="section-header text-center">
                    <h3 style="font-size: 25px" class="section-title bg-white text-center text-primary px-3">من نحن</h3>
                </header>
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
                                    <a href="{{ url('/login') }}"
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

        <!-- ======= team Section ======= -->
        <section id="team" class="team">

            <div class="container" data-aos="fade-up">
                <header class="section-header text-center">
                    <h3 style="font-size: 25px" class="section-title bg-white text-center text-primary px-3">فريق العمل</h3>
                </header>
                <div class="owl-carousel owl-theme">
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div  class="item">
                        <div class="our-team">
                            <div  class="picture">
                                <img style="border: 4px #2A77D1 solid;" class="img-fluid" src="{{ asset('style_member/assets/img/essam.jpg') }}" />
                            </div>
                            <div class="team-content">
                                <h3 style="font-weight: bold" class="name">Essam AL_agamy</h3>
                                <h4 style="font-size: 18px;color: #2A77D1;" class="title">full stack developer </h4>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/essam123essam" class="fa-brands fa-facebook"
                                        aria-hidden="true"></a></li>
                                <li><a href="https://twitter.com/Essam_Alagamy" class="fa-brands fa-twitter-square"
                                        aria-hidden="true"></a></li>
                                <li>
                                    <a href="https://www.instagram.com/essam_alagamy/" class="fa-brands fa-instagram"
                                        aria-hidden="true"></a>
                                </li>
                                <li><a href="https://www.linkedin.com/in/essam-al-agamy-01b339219/"
                                        class="fa-brands fa-linkedin" aria-hidden="true"></a>
                                </li>
                                <li>
                                    <a href="https://github.com/eng-essam" class="fa-brands fa-github"
                                        aria-hidden="true"></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End team Section -->

    </main>
    <!-- End #main -->
@endsection

@section('script')
    <!-- team script  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('style_member/assets/js/web/team.js') }}"></script>
    <!-- end team script  -->
@endsection
