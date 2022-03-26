@extends('web.layout_member')


@section('main')
    <!-- Start #main -->
    <main id="main">
        <div style="margin: 90px 0 90px 0" class="card card-danger">


            @include('all.message')

            <div class="card-body">

                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">

                            <!-- الجانب الايمن-->
                            <div class="col-md-6">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الاسم :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input readonly type="text" class="form-control" name="name"
                                                value="{{ $user->name }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> البريد الالكتروني :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input readonly type="text" class="form-control" name="email"
                                                value="{{ $user->email }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الرقم القومي :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input readonly type="text" class="form-control" name="ssn"
                                                value="{{ $user->ssn }}">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- الجانب الايسر-->
                            <div style="margin-bottom: 30px" class="col-md-6">



                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">الهاتف :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input readonly type="text" class="form-control" name="phone"
                                                value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الجنس :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input readonly type="text" class="form-control" name="sex"
                                                value="{{ $user->sex }}">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="width: min-content;margin: auto auto 10px auto ;">
                        <div class="input-group" style="direction: rtl">
                            <a href="{{ url('/member/edit/info') }}" class="form-control"
                                style="background-color: #013289;color: white">تعديل</a>

                        </div>
                    </div>
                </div>

                <div class="form-group" style="width: max-content ;float: right; margin-top: 20px">
                    <div class="input-group" style="direction: rtl">
                        <a href="{{ url('/member/edit/password') }}" class="form-control"
                            style="background-color: #013289;color: white">تغير كلمة السر</a>

                    </div>
                </div>

            </div>
        </div>


    </main>
    <!-- End #main -->
@endsection
