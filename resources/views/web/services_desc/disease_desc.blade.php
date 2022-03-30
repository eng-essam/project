@extends('web.layout_member')

@section('style')
    <link href="{{ asset('style_member/assets/service/home.css') }}" rel="stylesheet">
@endsection

@section('main')
    <main style="margin-top:50px " style="margin-top: 50px" id="main">
      <!-- ======= service Details Section ======= -->
      <section id="service-details" class="service-details">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8 mobile-hidden">
              <div class="service-details-slider swiper">
                <div class="service-details-slider ">
                  <div class="align-items-center" data-aos="zoom-out" data-aos-delay="200">
                      <img src="{{ asset('style_member/assets/img/hero-img.png') }}" class="img-fluid" alt="image" />
                  </div>
              </div>
              </div>
            </div>

            <div class="col-lg-4" style="direction: rtl">
              <div class="service-info">
                <h3>{{ $service->namear }}</h3>
                <ul>
                  <li><strong>وصف الخدمة</strong></li>
                  <ul>
                    <li>
                      {{ $service->title }}
                    </li>
                  </ul>
                </ul>
              </div>
              <div class="service-condition">
                <h2>الشروط الواجب توافرها للحصول علي الخدمة</h2>
                <ul>
                  <li class="mb-3">تقرير طبى بالحالة من الطبيب المعالج او احد من المستشفيات مختوم بختم المستشفي</li>

                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End service Details Section -->
    </main>

      <!-- ======= orders Section ======= -->
      <section id="orders" class="orders" style="direction: rtl">
        <div class="container" data-aos="fade-up">
          <header class="section-header text-center">
            <h2>المستندات المطلوبة</h2>
            <p>هذه المستندات المطلوبة لإتمام الخدمة</p>
          </header>

          <div class="card">
            <div class="card-body" style="direction: rtl">
              <div class="row">
                <!-- الجانب الايمن-->
                <div class="col-md-6">
                  <!-- ادخل-->
                  <div class="form-group main mobile-hidden">
                    <img src="{{ asset('style_member/assets/img/values-3.png') }}" class="img-fluid"
                      alt="" />
                  </div>


                </div>

                <!-- الجانب الايسر-->
                <div 
                  class="col-md-6 left left-diseases">

                  <!-- ادخل-->
                  <div class="form-group main">
                    <div class="input-group inner" style="direction: rtl">
                      <ul class="ul">
                        <li>صورة تقرير طبى بالحالة من الطبيب المعالج او احد المستشفيات مختوم بختم المستشفى</li>
                        <li>صورة ايصال اخر سداد اشتراك النقابة</li>
                        
                      </ul>
                    </div>
                  </div>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End orders Section -->

    <!-- start footer -->
    <footer id="footer" class="footer">
        <!-- start payment -->
        <div class="footer-newsletter" style="background: #fff">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h4>الرسوم</h4>
                        <p class="fs-5 mt-2">رسوم الخدمة: {{ $services_cost->pivot->service_cost }}</p>
                        <p>
                            يتم دفع الرسوم عن طريق تحويل المبلغ علي الحساب والإحتفاظ بصورة
                            لوصل الدفع
                        </p>
                        <div>
                            <p>فودافون كاش: 01090440347</p>
                            <p>البنك الاهلي: 12345</p>
                        </div>
                    </div>
                    <a type="submit" href="{{ url("/union/serviceform/$service->id") }}" class="text-center">إبدأ
                        الخدمة</a>
                </div>
            </div>
        </div>
        <!-- end payment -->

    </footer>
    <!-- End Footer -->
@endsection
