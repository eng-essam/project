@extends('web.layout_member')


@section('title')
    تعديل بيانات عضو
@endsection


@section('main')
    <div style="margin: 90px 0 90px 0" class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ url('/member/update/password') }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div style="direction: rtl" class="card-body" style="direction: rtl">

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label style="float: right; ">كلمة السر الحالية :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="password" class="form-control" name="oldpassword">
                                        </div>
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('oldpassword')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <label style="float: right; ">كلمة السر الجديدة :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <label style="float: right; ">تأكيد كلمة السر :</label>
                                    <div style="display: block;" class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="password" class="form-control" name="password_confirmation">
                                        </div>
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div style="display: inline-flex ;width: max-content;margin:0 auto 20px auto" class="form-group"
                        style="width: min-content;margin: auto auto 10px auto ;">

                        <a href="{{ url('/member/info') }}" style="background-color: #013289"
                            class="btn btn-primary">الغاء</a>

                        <div style="width: max-content" class="input-group" style="direction: rtl">
                            <input style="background-color: #013289;color: white ;margin-left: 50px" type="submit"
                                value="حفظ التعديلات" class="form-control">
                        </div>
                    </div>

                </div>

            </form>

        </div>
    </div>
@endsection
