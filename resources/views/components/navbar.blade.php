<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="margin: auto">

                @guest
                    <li class="nav-item">
                        <a style="background-color: rgb(0, 110, 255) ; color: rgb(255, 255, 255); margin-right:20px "
                            class="nav-link active" aria-current="page" href="{{ url('/login') }}">تسجيل دخول</a>
                    </li>

                    <div class="btn-group">

                        <a style="color: white ; text-decoration: none" href="{{ url('/') }}">
                            <button style="height: 40px" type="button" class="btn btn-danger">النقابات</button>
                        </a>

                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </button>

                        <ul class="dropdown-menu">
                            @foreach ($unions as $union)
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ url("union/showservice/$union->id") }}">نقابة{{ $union->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                @endguest

                @auth

                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none">
                        @csrf

                    </form>
                    <li style="float: right" class="nav-item">
                        <a id="logout-link"
                            style="background-color: rgb(255, 0, 0) ; color: rgb(255, 255, 255); margin-right:20px "
                            class="nav-link active" aria-current="page" href="{{url('logout')}}">تسجيل خروج
                        </a>
                    </li>

                    <div class="btn-group" style="margin-right:20px">
                        <a style="color: white ; text-decoration: none" href="{{ url("union/showservice/$union->id") }}">
                            <button style="height: 40px" type="button" class="btn btn-danger">الخدمات</button></a>
                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">

                            @foreach ($servicess as $service)
                                <li style="float: right">
                                    <a class="dropdown-item"
                                        href="{{ url("union/serviceform/{$service->id}") }}">{{ $service->namear }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="btn-group">
                        <a style="color: white ; text-decoration: none" href="{{ url('member/myservice') }}">
                            <button style="height: 40px" type="button" class="btn btn-danger">طلباتي</button>
                        </a>
                    </div>

                    <div class="btn-group">
                        <a style="color: white ; text-decoration: none ;margin-left: 10px" href="{{ url('/member/info') }}">
                            <button style="height: 40px" type="button" class="btn btn-danger">معلوماتي</button>
                        </a>
                    </div>

                @endauth

            </ul>
        </div>
    </div>
</nav>
