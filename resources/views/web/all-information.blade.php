@extends('web.layout_member')

@section('title')
الاخبار
@endsection

@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div style="margin-bottom:100px " class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>أخبار النقابة</p>
                </header>
                        <div style="direction: rtl;" class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($information as $info)

                            <!-- start for loob -->
                            <div class="col">
                                <div class="card">
                                    <!-- صوره الخبر -->
                                    <img src="{{ asset("web/$info->img") }}" alt="image" class="card-img-top">
                                    <div style="direction: rtl;height: 150px;" class="card-body">
                                        <!-- عنوان الخبر -->
                                        <div>
                                            <h5 style="display:inline-block ;" class="card-title">{{ $info->header }}</h5>
                                            <small style="float:left ;"
                                                class="text-muted">{{ Carbon\Carbon::parse($info->created_at)->format('Y-m-d') }}</small>
                                        </div>
                                        <!-- محتوي الخبر -->
                                        <p style=" display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;" class="card-text">{{ $info->titel }}</p>
                                    </div>
                                    <a style="text-align: center;text-decoration: none;font-weight: bold;margin-bottom: 5px;margin-top: 5px"
                                        href="{{ url("/union/one/information/$info->id") }}">المزيد</a>
                                </div>
                            </div>
                            <!-- end for loob -->
                            @endforeach
                        </div>
            </div>
        </section>
        <!-- End Services Section -->
    </main>
    <!----- End #main ---->
@endsection
