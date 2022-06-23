@extends('web.layout_member')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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

            <div style="margin-bottom:100px " class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>اخبار النقابة</p>
                </header>
                <div style="grid-gap: 20px 20px;" class="card-group">
                    <div class="owl-carousel owl-theme">

                        <div class="item">
                            <div style="border:1px #D2D2D2 solid ;height:437px ;" class="card">

                                <img style="height: 200px;" src="{{ asset('style/img/login.svg') }}" class="card-img-top" alt="...">

                                <div style="direction: rtl ;height: 100px;overflow: hidden;" class="card-body">
                                    <h5>عنوان الموضوع</h5>
                                    <p style="overflow: hidden;" class="card-text">هناك حقيقة مثبتة منذ
                                        زمن طويل وهي أن المحتوى المقروء
                                        لصفحة ما سيلهي القارئ عريقة لوريم إيبسومهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                        المقروء
                                        لصفحة                                ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم

                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                    </p>

                                </div>
                                <a style="text-decoration: none;text-align: center;" href="#">المزيد</a>
                                <div style="direction: rtl;" class="card-footer">
                                    <small class="text-muted">10/11/2000 </small>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div style="border:1px #D2D2D2 solid ;height:437px ;" class="card">

                                <img style="height: 200px;" src="{{ asset('style/img/login.svg') }}" class="card-img-top" alt="...">

                                <div style="direction: rtl ;height: 100px;overflow: hidden;" class="card-body">
                                    <h5>عنوان الموضوع</h5>
                                    <p style="overflow: hidden;" class="card-text">هناك حقيقة مثبتة منذ
                                        زمن طويل وهي أن المحتوى المقروء
                                        لصفحة ما سيلهي القارئ عريقة لوريم إيبسومهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                        المقروء
                                        لصفحة                                ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم

                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                    </p>

                                </div>
                                <a style="text-decoration: none;text-align: center;" href="#">المزيد</a>
                                <div style="direction: rtl;" class="card-footer">
                                    <small class="text-muted">10/11/2000 </small>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div style="border:1px #D2D2D2 solid ;height:437px ;" class="card">

                                <img style="height: 200px;" src="{{ asset('style/img/login.svg') }}" class="card-img-top" alt="...">

                                <div style="direction: rtl ;height: 100px;overflow: hidden;" class="card-body">
                                    <h5>عنوان الموضوع</h5>
                                    <p style="overflow: hidden;" class="card-text">هناك حقيقة مثبتة منذ
                                        زمن طويل وهي أن المحتوى المقروء
                                        لصفحة ما سيلهي القارئ عريقة لوريم إيبسومهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                        المقروء
                                        لصفحة                                ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم

                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                    </p>

                                </div>
                                <a style="text-decoration: none;text-align: center;" href="#">المزيد</a>
                                <div style="direction: rtl;" class="card-footer">
                                    <small class="text-muted">10/11/2000 </small>
                                </div>

                            </div>
                        </div>
                        <div class="item">
                            <div style="border:1px #D2D2D2 solid ;height:437px ;" class="card">

                                <img style="height: 200px;" src="{{ asset('style/img/login.svg') }}" class="card-img-top" alt="...">

                                <div style="direction: rtl ;height: 100px;overflow: hidden;" class="card-body">
                                    <h5>عنوان الموضوع</h5>
                                    <p style="overflow: hidden;" class="card-text">هناك حقيقة مثبتة منذ
                                        زمن طويل وهي أن المحتوى المقروء
                                        لصفحة ما سيلهي القارئ عريقة لوريم إيبسومهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى
                                        المقروء
                                        لصفحة                                ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم

                                        ما سيلهي القارئ عن افي الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسومإيبسومم
                                    </p>

                                </div>
                                <a style="text-decoration: none;text-align: center;" href="#">المزيد</a>
                                <div style="direction: rtl;" class="card-footer">
                                    <small class="text-muted">10/11/2000 </small>
                                </div>

                            </div>
                        </div>
                    </div>
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

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
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

                    <div class="col-lg-6 d-flex align-items-center mobile-hidden" data-aos="zoom-out"
                        data-aos-delay="200">
                        <img src="{{ asset('style_member/assets/img/about.jpg') }}" class="img-fluid" alt="">
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->
    </main>
    <!----- End #main ---->
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            items: 3,
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: true
                }
            }
        });
        $(".play").on("click", function() {
            owl.trigger("play.owl.autoplay", [2000]);
        });
        $(".stop").on("click", function() {
            owl.trigger("stop.owl.autoplay");
        });
    </script>
@endsection
