<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('style/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('style/css/font-awesome.min.css') }}" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Scheherazade+New&display=swap"
        rel="stylesheet">

    @yield('style')
    <title> @yield('title') </title>
</head>

<body>

    <x-navbar></x-navbar>

    @yield('main')

    <script type="text/javascript" src="{{ asset('style/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/js/jQuery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('style/js/all.min.js') }}"></script>
    @yield('script')

    <script>
        $('#logout-link').click(function(e) {
            e.preventDefault() $('#logout-form').submit()
        })
    </script>

</body>
</html>
