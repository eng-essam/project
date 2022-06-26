<!-- Main Sidebar Container -->
<div class="settings-box hide-settings">
    <div class="toggle-settings"><i class="fas fa-bars"></i></div>
    <div class="setting-content chiller-theme toggled">

        {{-- start nav --}}
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">

                <div style="padding:0" class="sidebar-header">
                    <h2 class="text-danger text-center m-4 ">
                        &nbsp; <span style="color: white;"> نقابة<span class="text-danger">{{ $union->name }}</span>
                        </span>
                    </h2>
                </div >
                <!-- sidebar-head  -->


                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="{{ url('/all/member') }}">
                                <i class="fa-solid fa-user"></i>
                                <span style="font-size: 17px ;font-weight: 700 "> الاعضاء</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/all/admin') }}">
                                <i class="fas fa-users-cog"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">المشرفون</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/superadmin/all/information') }}">
                                <i class="fas fa-newspaper"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">الأخبار</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/admin/service') }}">
                                <i class="fas fa-hands-helping"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">خدمات النقابة</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/super/operation') }}">
                                <i class="far fa-address-book"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">سجل العمليات</span>
                                {{-- <span class="badge badge-pill badge-warning">جديد</span> --}}
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('/super/info') }}">
                                <i class="fas fa-info"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">بياناتي</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/union/setting') }}">
                                <i class="fa-solid fa-gear"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">اعدادات النقابة</span>
                            </a>
                        </li>

                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none">
                            @csrf

                        </form>

                        <li>
                            <a href="" id="logout-link" class="nav-link active" aria-current="page" >
                                <i class="fas fa-sign-out-alt"></i>
                                <span style="font-size: 17px ;font-weight: 700 ">تسجيل خروج</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>

            </div>
        </nav>
        {{-- end nav --}}

    </div>
</div>
