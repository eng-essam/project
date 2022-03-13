    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('style/css/bootstrap.css') }}" />
        <link rel="stylesheet" href="{{ asset('style/css/font-awesome.min.css') }}" />
        <title> @yield('style') </title>
        <title> @yield('title') </title>
    </head>

    <body>
        <x-navbar></x-navbar>

        <header>
            @yield('header')
        </header>

        @yield('main')

        <script type="text/javascript" src="{{ asset('style/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('style/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('style/js/main.js') }}"></script>

        <script>
            $('#logout-link').click(function(e) {
                e.preventDefault()
                $('#logout-form').submit()
            })
        </script>

    </body>

    </html>
