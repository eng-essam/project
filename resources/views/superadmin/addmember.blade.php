@extends('superadmin.layout')

@section('title')
    اضافة عضو
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        اضافة عضو
    </h1>
@endsection

@section('main')
    <div class="card card-danger">


        <div class="card-header">
            <h3 style="float: right;" class="card-title">
                <span style="font-weight: bold"> </span>
            </h3>
        </div>

        <div class="card-body">

            @include('all.message')

            <form action="{{ url('/add/member') }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">

                            <!-- الجانب الايمن-->
                            <div class="col-md-6">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> اسم العضو :</label>
                                    <div style="display: block;" class="input-group" >
                                        <div>
                                            <input type="text" class="form-control" value="{{ old('name') }}" name="name">
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
                                    <label style="float: right;">الكودالنقابي :</label>
                                    <div style="display: block;" class="input-group" >
                                        <input type="text" class="form-control" value="{{ old('union_number') }}" name="union_number">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('union_number')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> الرقم القومي :</label>
                                    <div style="display: block;" class="input-group" >
                                        <input type="text" class="form-control" value="{{ old('ssn') }}" name="ssn">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('ssn')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- الجانب الايسر-->
                            <div  class="col-md-6">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> رقم الهاتف :</label>
                                    <div style="display: block;" class="input-group" >
                                        <input type="text" class="form-control" value="{{ old('phone') }}" name="phone">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div class="form-group">
                                    <div style="display: block;" class="input-group" >
                                        <label style="float: right;display: block; margin-left: 10px"> الجنس :</label>
                                        <div style="font-size:15px;float: right;">
                                            <select style="float: right" value="{{ old('sex') }}" name="sex">
                                                <option value="ذكر">ذكر</option>
                                                <option value="انثي">انثي</option>
                                            </select>
                                        </div>
                                    </div>                               
                                </div>

                                


                            </div>

                        </div>
                    </div>

                    <div class="form-group" style="width: min-content;margin: auto auto 10px auto ;">
                        <div class="input-group" style="direction: rtl">
                            <input style="background-color: #DC3545;color: white" type="submit" value="حفظ"
                                class="form-control">
                        </div>
                    </div>

                </div>


            </form>
        </div>
    </div>
@endsection
