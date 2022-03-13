@extends('web.layout')

@section('title')
    صفحة تسجيل الدخول
@endsection



@section('main')
    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">تسجيل دخول</h3>

                            <h3 class="mb-5"><a style="text-decoration: none"
                                    href="{{ url('/register/member') }}">اضافة حساب</a></h3>

                            @include('all.errors')

                            @if (request()->session()->has('error-msg'))
                                <div class="alert alert-danger">
                                    <p> {{ request()->session()->get('error-msg') }} </p>
                                </div>
                            @endif

                            <form action="{{ url('login') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typeEmailX-2">Email</label>
                                    <input type="email" name="email" id="typeEmailX-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">Password</label>
                                    <input type="password" name="password" id="typePasswordX-2"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="typePasswordX-2">
                                        <a style="text-decoration: none" href="{{url('/requestPassword')}}">نسيت كلمة السر ؟</a>
                                    </label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
