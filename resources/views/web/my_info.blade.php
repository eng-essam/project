@extends('web.layout')

@section('title')
    بياناتي الشخصية
@endsection





@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">
            </h3>
        </div>

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
                                <div class="input-group" style="direction: rtl">
                                    <div>
                                        <input readonly type="text" class="form-control" name="name"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>

                            <!-- ادخل-->
                            <div style="margin-bottom: 30px" class="form-group">
                                <label style="float: right;"> البريد الالكتروني :</label>
                                <div  class="input-group" style="direction: rtl">
                                    <input readonly type="text" class="form-control" name="email"
                                        value="{{ $user->email }}">
                                </div>
                            </div>

                            <!-- ادخل-->
                            <div style="margin-bottom: 30px" class="form-group">
                                <label style="float: right;"> الرقم القومي :</label>
                                <div  class="input-group" style="direction: rtl">
                                    <input readonly type="text" class="form-control" name="ssn"
                                        value="{{ $user->ssn }}">
                                </div>

                            </div>

                        </div>

                        <!-- الجانب الايسر-->
                        <div style="margin-bottom: 30px" class="col-md-6">



                            <!-- ادخل-->
                            <div style="margin-bottom: 30px" class="form-group">
                                <label style="float: right;">الهاتف :</label>
                                <div  class="input-group" style="direction: rtl">
                                    <input readonly type="text" class="form-control" name="phone"
                                        value="{{ $user->phone }}">
                                </div>
                            </div>

                            <!-- ادخل-->
                            <div style="margin-bottom: 30px" class="form-group">
                                <label style="float: right;"> الجنس :</label>
                                <div  class="input-group" style="direction: rtl">
                                    <input readonly type="text" class="form-control" name="sex"
                                        value="{{ $user->sex }}">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="form-group" style="width: min-content;margin: auto auto 10px auto ;">
                    <div class="input-group" style="direction: rtl">
                        <a href="{{ url('/member/edit/info') }}" class="form-control"
                            style="background-color: #DC3545;color: white">تعديل</a>

                    </div>
                </div>
            </div>

            <div class="form-group" style="width: max-content ;float: right; margin-top: 20px">
                <div class="input-group" style="direction: rtl">
                    <a href="{{ url('/member/edit/password') }}" class="form-control"
                        style="background-color: #DC3545;color: white">تغير كلمة السر</a>

                </div>
            </div>

        </div>
    </div>

    
@endsection