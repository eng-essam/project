  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center
        justify-content-between">



          <div class="logo d-flex align-items-center">

              @auth
                  <div class="dropdown">
                      <i class="fa-solid fa-gear dropicon"></i>
                      <div class="dropdown-content">
                          <a href="{{ url('/member/info') }}">
                              معلوماتي
                              <i style="font-size: 15px" class="fa-solid fa-circle-info"></i>
                          </a>
                          <a href="{{ url('member_logout') }}">
                              تسجيل خروج
                              <i style="font-size: 15px" class="fa-solid fa-right-from-bracket"></i>
                          </a>
                      </div>
                  </div>

                  <a href="/union/home">
                      <span style="font-size:35px ">نق<span style="color: #4D66F1;font-size:35px">ا</span>بتي</span>
                  </a>
              @endauth

              @guest
                  <a href="/">
                      <span style="font-size:35px ">نق<span style="color: #4D66F1;font-size:35px">ا</span>بتي</span>
                  </a>
              @endguest


          </div>

          <nav id="navbar" class="navbar">
              <ul>
                  @guest
                      <li><a style="font-size: 20px;" class="nav-link scrollto active" href="/">الرئيسية</a></li>

                      <li class="dropdown">
                          <a href="{{ url('/') }}" class="scrollto"><span style="font-size: 20px;">النقابات</span><i
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

                      <li><a style="font-size: 20px;" class="nav-link scrollto active"
                              href="{{ url('union/home') }}">نقابة
                              {{ $union->name }}</a></li>

                      <li class="dropdown">
                          <a href="{{ url("union/showservice/$union->id") }}" class="scrollto">
                              <span style="font-size: 20px;">الخدمات</span>
                              <i class="bibi-chevron-down"></i>
                          </a>
                          <ul>
                              @foreach ($servicess as $service)
                                  <li>
                                      <a href="{{ url("/union/servicedesc/$service->id") }}">
                                          {{ $service->namear }}</a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>

                      <li><a style="font-size: 20px;" class="nav-link scrollto"
                              href="{{ url('/union/all/information') }}">الأخبار</a></li>

                      <li><a style="font-size: 20px;" class="nav-link scrollto"
                              href="{{ url('member/myservice') }}">طلباتي</a></li>
                  @endauth
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav>
          <!-- .navbar -->
      </div>
  </header>
  <!-- End Header -->
