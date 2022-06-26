@extends('web.layout_member')

@section('title')
{{ $information->header }}
@endsection

@section('style')
<link href="{{ asset('style_admin/css/oneinfo.css') }}" rel="stylesheet">
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div style="margin-top:100px " class="container" data-aos="fade-up">

                {{-- <img style="width: 100px;height: 100px;margin-bottom: 5px" src="{{ asset("web/$information->img") }}"
                    alt="image">
                <h3>{{ $information->header }}</h3>
                <p>{{ $information->titel }}</p>
                <small class="text-muted">{{ Carbon\Carbon::parse($information->created_at)->format('Y-m-d') }}</small> --}}

                <div class="card mb-3 entry">
                    <img src="{{ asset("web/$information->img") }}" class="card-img-top img-fluid " alt="...">
                    <div style="text-align: right" class="card-body">
                        <h5 class="text-right" class="card-title">{{ $information->header }}</h5>
                        <p class="card-text">{{ $information->titel }}</p>
                        <p class="card-text">
                            <small class="text-muted">
                                <span>{{ Carbon\Carbon::parse($information->created_at)->format('Y-m-d') }}</span>
                                <i class="fas fa-clock"></i>
                            </small>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!----- End #main ---->
@endsection
