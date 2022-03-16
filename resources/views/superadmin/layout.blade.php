<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title')</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('style_admin/css/css/all.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('style_admin/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('style_admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style_admin/css/settings.css') }}">

    @yield('link')

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>


<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <x-admin-nav></x-admin-nav>

        <div class="content-wrapper">

            <div style="background-color: #3c4147 ; height: 56px; margin-bottom: 20px" class="container-fluid">
                <div style="width: max-content; margin: auto" class="row">
                    <h1 class="m-0 text-dark"> @yield('namepage')</h1>
                </div>
            </div>

            <!-- main -->
            <div style="margin: 0px 20px 20px 20px ;box-sizing: border-box;">
                @yield('main')
            </div>

        </div>
    </div>

    <script src="{{ asset('style_admin/js/jquery.js') }}"></script>
    <script src="{{ asset('style_admin/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('style_admin/js/adminlte.js') }}"></script>
    <script src="{{ asset('style_admin/js/main.js') }}"></script>
    <script src="{{ asset('style_admin/js/settings.js') }}"></script>

    <!-- logout -->
    <script>
        $('#logout-link').click(function(e) {
            e.preventDefault()
            $('#logout-form').submit()
        })
    </script>

</body>

</html>
