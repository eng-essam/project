@extends('web.layout')

@section('title')
    تعديل بيانات عضو
@endsection




@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">
            </h3>
        </div>

        <div class="card-body">

            <form action="{{ url('/member/update/info') }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">

                            <!-- الجانب الايمن-->
                            <div class="col-md-6">

                                
                                <!-- ادخل-->
                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;"> البريد الالكتروني :</label>
                                    <div  class="input-group" style="direction: rtl">
                                        <div>
                                            <input type="text" class="form-control" name="email"
                                                placeholder="{{ $user->email }}" value="{{ old('email') }}">
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
                                    <div  class="input-group" style="direction: rtl">
                                        <input type="text" class="form-control" name="phone"
                                        placeholder="{{ $user->phone }}" value="{{ old('phone') }}" >
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('phone')
                                                {{ $message }}
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div style="margin-bottom: 30px" class="form-group">
                                    <label style="float: right;">كلمة السر الحالية :</label>
                                    <div  class="input-group" style="direction: rtl">
                                        <input type="password" class="form-control" 
                                            name="password">
                                        <div style="color: red ;font-size:15px;float: right;">
                                            @error('password')
                                                {{ $message }}
                                            @enderror

                                            @if (session('password_error'))
                                                {{session('password_error')}}
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="form-group" style="display: inline-flex;width: min-content;margin: auto auto 10px auto ;">

                        <a href="{{url('/member/info')}}" style="background-color: #DC3545;border-color: #DC3545 " class="btn btn-primary">الغاء</a>

                        <div class="input-group" style="direction: rtl">
                            <input style="background-color: #DC3545;color: white ;margin-left: 50px" type="submit" value="حفظ التعديلات"
                                class="form-control">
                        </div>

                       
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
