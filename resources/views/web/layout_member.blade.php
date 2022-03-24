<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Home Page</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('style_member/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('style_member/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('style_member/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('style_member/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <x-membernav></x-membernav>

    <!-- End Header -->

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
                        <a href="{{url('login')}}" class="btn-get-started scrollto d-inline-flex
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


    @yield('main')

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">

                    <div style=" width:40%;" class="col-lg-5 col-md-12 footer-info">
                        <a style="margin-bottom: 50px;" href="index.html"
                            class="logo
                d-flex align-items-center">
                            <span>LOGO</span>
                        </a>
                        <div style="direction: rtl;">
                            <p>الموقع يُتيج للأعضاء تنفيذ الخدمات النقابية اونلاين لتوفير
                                الوقت والجهد على جميع اعضاء النقابات.</p>
                        </div>
                    </div>

                    <div style="width: 50%;direction:
              rtl;" class="col-lg-2 col-6 footer-links">
                        <ul>
                            <li style="direction: rtl;"><a href="#">الرئيسية</a><i class="bi bi-chevron-left"></i></li>
                            <li><a href="#">النقابات</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="#">تسجيل</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="#">انشاء حساب</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="#">معلومات عنا</a><i class="bi bi-chevron-left"></i> </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>


    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-centerjustify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('style_member/assets/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('style_member/assets/vendor/php-email-form/validate.js') }}"></script>
    <script>
        $('#logout-link').click(function(e) {
            e.preventDefault()
            $('#logout-form').submit()
        })
    </script>
    <!-- Template Main JS File -->
    <script src="{{ asset('style_member/assets/js/main.js') }}"></script>

</body>

</html>
