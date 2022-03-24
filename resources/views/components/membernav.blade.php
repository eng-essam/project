  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center
        justify-content-between">

          <a href="index.html" class="logo d-flex align-items-center">
              <img src="{{ asset('style_member/assets/img/logo.png') }}" alt="">
              <span>LOGO</span>
          </a>

          <nav id="navbar" class="navbar">
              <ul>
                  @guest
                      <li><a style="font-size: 20px;" class="nav-link scrollto active" href="#hero">الرئيسية</a></li>

                      <li class="dropdown">
                          <a href="#values" class="scrollto"><span style="font-size: 20px;">النقابات</span><i
                                  class="bibi-chevron-down"></i>
                          </a>
                          <ul>
                              @foreach ($unions as $union)
                                  <li>
                                      <a href="{{ url("union/showservice/$union->id") }}"> نقابة {{ $union->name }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>

                      <li><a style="font-size: 20px;" class="nav-link scrollto" href="#about">معلومات عنا</a></li>

                  @endguest

                  @auth

                      <li><a style="font-size: 20px;" class="nav-link scrollto active" href="#hero">الرئيسية</a></li>

                      <li class="dropdown">
                          <a href="{{ url("union/showservice/$union->id") }}" class="scrollto">
                              <span style="font-size: 20px;">الخدمات</span>
                              <i class="bibi-chevron-down"></i>
                          </a>
                          <ul>
                              @foreach ($servicess as $service)
                                  <li>
                                      <a href="{{ url("union/serviceform/$service->id") }}">
                                          {{ $service->namear }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>

                      <li><a style="font-size: 20px;" class="nav-link scrollto"
                              href="{{ url('member/myservice') }}">طلباتي</a></li>

                      <li><a style="font-size: 20px;" class="nav-link scrollto" href="#about">معلومات عنا</a></li>
                      <!--
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none"> @csrf
                              </form>
                              <li><a style="font-size: 20px;" id="logout-link" class="nav-link scrollto"
                                      href="{{ url('logout') }}">تسجيل خروج</a></li>
                            -->


                      <li><a style="font-size: 20px;" class="nav-link scrollto" href="{{ url('member_logout') }}">تسجيل
                              خروج</a></li>


                  @endauth

              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->
