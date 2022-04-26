<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('style_member/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('style_member/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('style_member/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('style_member/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    @yield('style')
    <title> @yield('title')</title>
    <!-- Template Main CSS File -->
    <link href="{{ asset('style_member/assets/css/style.css') }}" rel="stylesheet">

</head>

<body>

    <!-- ======= Header ======= -->
    <x-membernav></x-membernav>
    <!-- End Header -->

    @yield('header')


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
                            @auth
                            <li style="direction: rtl;"><a href="#">الرئيسية</a><i class="bi bi-chevron-left"></i></li>
                            <li><a href=""> الخدمات</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/union/information")}}"> الاخبار</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/member/myservice")}}"> طلباتي</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/member/info")}}"> معلوماتي</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/member_logout")}}"> تسجيل خروج</a><i class="bi bi-chevron-left"></i> </li>
                            @endauth
                            @guest
                            <li><a href="{{url("/")}}">النقابات</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/login")}}"> تسجيل دخول</a><i class="bi bi-chevron-left"></i> </li>
                            <li><a href="{{url("/register/member")}}">انشاء حساب</a><i class="bi bi-chevron-left"></i> </li>
                            @endguest
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
    @yield('script')

</body>

</html>
