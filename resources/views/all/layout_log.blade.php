<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('style_log/images/icons/login.ico') }}" />

    <!-- bootstrap files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- vendor files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/vendor/daterangepicker/daterangepicker.css') }}">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style_log/css/main.css') }}">
    <!-- googel fonts -->
    <title>@yield('title')</title>
    @yield('style')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri&display=swap" rel="stylesheet">
</head>

<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login">
            <div class="wrap-login">

                @yield('main')


                <div class="login-more"
                    style="background-image: url('{{ asset('style_log/images/bg-01.jpg') }}');">
                </div>
            </div>
        </div>
    </div>


    <!-- vendor fiels -->
    <!-- 1 -->
    <script src="{{ asset('style_log/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!-- 2 -->
    <script src="{{ asset('style_log/vendor/animsition/js/animsition.min.js') }}"></script>
    <!-- 3 -->
    <script src="{{ asset('style_log/vendor/bootstrap/js/popper.js') }}"></script>
    <!-- 4 -->
    <script src="{{ asset('style_log/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- 5 -->
    <script src="{{ asset('style_log/vendor/select2/select2.min.js') }}"></script>
    <!-- 6 -->
    <script src="{{ asset('style_log/vendor/daterangepicker/moment.min.js') }}"></script>
    <!-- 7 -->
    <script src="{{ asset('style_log/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!-- 8 -->
    <script src="{{ asset('style_log/vendor/countdowntime/countdowntime.js') }}"></script>
    @yield('script')
</body>

</html>
