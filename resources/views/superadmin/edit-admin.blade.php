@extends('superadmin.layout')

@section('title')
    تعديل بيانات مشرف
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        تعديل بيانات
    </h1>
@endsection

@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 style="float: right;" class="card-title">
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ url("/edit/update_admin/$member->id") }}" method="POST">
                @csrf
                <div class="card card-default">

                    <div class="card-body" style="direction: rtl">
                        <div class="row">
                            <div class="col-md-6">

                                <div style="margin-bottom: 10px" class="form-group">
                                    <label style="float: right;">: اسم المشرف</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $member->name }}">

                                        </div>

                                        <div style="color: red ;font-size:15px ;float: right;">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div style="margin-bottom: 10px" class="col-md-6">

                                <div class="form-group">
                                    <label style="float: right;">: الرقم القومي</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="ssn" value="{{ $member->ssn }}">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('ssn')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="form-group" style="width: min-content;margin: 0 auto 10px auto ;">
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
