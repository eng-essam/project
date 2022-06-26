@extends('admin.layout')

@section('title')
    {{ $information->header }}
@endsection

@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        {{ $information->header }}
    </h1>
@endsection

@section('link')
    <link href="{{ asset('style_admin/css/oneinfo.css') }}" rel="stylesheet">
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">
        <div style="margin-bottom:100px " class="container" data-aos="fade-up">
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
                <div class="edit card-footer">
                    <a href="{{ url("admin/information/delete/$information->id") }}"><i
                            class="fas fa-trash-alt del"></i></a>
                    <a href="{{ url("admin/information/eidt/$information->id") }}"><i class="fas fa-edit"></i></a>
                </div>
            </div>

        </div>

        <!-- End Services Section -->
    </main>
    <!----- End #main ---->
@endsection
