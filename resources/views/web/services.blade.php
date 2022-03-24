@extends('web.layout_member')


@section('main')
    <!-- Start #main -->
    <main id="main">

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">

            <div class="container" data-aos="fade-up">

                <header class="section-header text-center">
                    <p>هذه هي الخدمات المتوفرة تبعاً لهذه النقابة</p>
                </header>

                <div class="row gy-4" style="direction: rtl;">

                    @foreach ($servicess as $service)
                        <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="700">
                            <div class="service-box blight">
                                <i class="ri-customer-service-2-line icon"></i>
                                <h3>{{ $service->namear }}</h3>
                                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                                    Corrupti recusandae ducimus enim.</p>
                                <a href="{{ url("union/serviceform/$service->id") }}" class="read-more"><span>إقرأ
                                        المزيد</span><i class="bi bi-arrow-left"></i> </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- End Services Section -->

    </main>
    <!-- End #main -->
@endsection
