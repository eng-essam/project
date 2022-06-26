@extends('admin.layout')

@section('title')
   تعديل الخبر
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
           تعديل خبر
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

            <form action="{{ url("/admin/information/update/$information->id") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">


                            <div class="col-md-12">

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> عنوان الخبر :</label>
                                    <div style="display: block;" class="input-group">
                                        <div>
                                            <input type="text" class="form-control" name="header">
                                        </div>
                                        <div style="color: red ;font-size:15px ;float: right;">
                                            @error('header')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">محتوى الخبر</label>
                                    <div style="display: block;" class="input-group">
                                        <input type="text" class="form-control" name="titel">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('titel')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> صورة الخبر</label>
                                    <div style="display: block;" class="input-group">
                                            <input class="form-control " type="file" id ="formFile" name="img" />
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('img')
                                                {{ $message }}
                                            @enderror
                                        </div>
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
