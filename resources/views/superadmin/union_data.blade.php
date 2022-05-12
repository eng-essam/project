@extends('superadmin.layout')

@section('title')
    بياناتي الشخصية
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        بياناتي الشخصية
    </h1>
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
                                <label style="float: right;"> الهاتف :</label>
                                <div style="display: block;" class="input-group" style="direction: rtl">
                                    <div>
                                        <input readonly type="text" class="form-control" name="name"
                                            value="{{ $union->phone }}">
                                    </div>
                                    <div style="color: red ;font-size:15px ;float: right;">
                                        رقم الهاتف الخاص بالشكاوي والمحفظه الالكترونيه
                                    </div>
                                </div>
                                <div class="form-group" style="width: min-content;margin: 30px auto 10px auto ;">
                                    <div class="input-group" style="direction: rtl">
                                        <a href="{{ url('/union/setting/phone') }}" class="form-control"
                                            style="background-color: #DC3545;color: white">تعديل</a>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- الجانب الايسر-->
                        <div style="margin-bottom: 30px" class="col-md-6">



                            <!-- ادخل-->
                            <div style="margin-bottom: 30px" class="form-group">
                                <label style="float: right;">رقم الحساب البنكي :</label>
                                <div style="display: block;" class="input-group" style="direction: rtl">
                                    <div>
                                        <input readonly type="text" class="form-control" name="phone"
                                            value="{{ $union->bank }}">
                                    </div>
                                    <div style="color: red ;font-size:15px ;float: right;">
                                        رقم الحساب البنكي
                                    </div>
                                </div>
                                <div class="form-group" style="width: min-content;margin: 30px auto 10px auto ;">
                                    <div class="input-group" style="direction: rtl">
                                        <a href="{{ url('/union/setting/bank') }}" class="form-control"
                                            style="background-color: #DC3545;color: white">تعديل</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
