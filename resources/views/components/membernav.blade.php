  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center
        justify-content-between">



          <div class="logo d-flex align-items-center">

              @auth
                  <div class="dropdown">
                      <i class="fa-solid fa-gear dropicon"></i>
                      <div class="dropdown-content">
                          <a href="#">معلوماتي</a>
                          <a style="display: inline-flex;background-color: red;padding: 5px" href="{{url('member_logout')}}">
                              تسجيل خروج
                              <i style="background-color: rgb(15, 14, 14);font-size: 20px"
                                  class="fa-solid fa-right-from-bracket"></i>
                          </a>
                      </div>
                  </div>
              @endauth
              <a href="index.html">
                  <span>LOGO</span>
              </a>
          </div>

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

                      <li><a style="font-size: 20px;" class="nav-link scrollto active" href="#hero">نقابة
                              {{ $union->name }}</a></li>

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

                      <!--<li><a style="font-size: 20px;" class="nav-link scrollto" href="{{ url('member_logout') }}">تسجيل خروج</a></li> -->

                  @endauth
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->
