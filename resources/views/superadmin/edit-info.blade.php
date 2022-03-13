@extends('superadmin.layout')

@section('title')
    تعديل بيانات عضو
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        تعديل بيانات
    </h1>
@endsection

@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ url("/super/update/info") }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">

                            <!-- الجانب الايمن-->
                            <div class="col-md-6">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">الاسم :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $user->name }}">
                                        </div>
                                        <div style="color: red ;font-size:15px ;float: right;">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> البريد الالكتروني :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="text" class="form-control" name="email"
                                                value="{{ $user->email }}">
                                        </div>
                                        <div style="color: red ;font-size:15px ;float: right;">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الهاتف :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الرقم القومي :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="ssn" value="{{ $user->ssn }}">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('ssn')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- الجانب الايسر-->
                            <div style="margin-bottom: 30px" class="col-md-6">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">كلمة السر :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="password">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">تأكيد كلمة السر :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="password_confirmation">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الجنس :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div style="font-size:15px;float: right;">
                                            <select style="float: right"  name="sex">
                                                <option value="ذكر">ذكر</option>
                                                <option value="انثي">انثي</option>
                                            </select>
                                        </div>
                                        <div style="color: red ;font-size:15px ;float: right;">
                                            @error('sex')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="form-group" style="width: min-content;margin: auto auto 10px auto ;">
                        <div class="input-group" style="direction: rtl">
                            <input style="background-color: #DC3545;color: white" type="submit" value="حفظ التعديلات"
                                class="form-control">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
