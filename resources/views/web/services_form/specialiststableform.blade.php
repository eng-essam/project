@extends('web.layout_member')

@section('style')
    <link href="{{ asset('style_member/assets/service/register.css') }}" rel="stylesheet">
@endsection

@section('main')
    <!-- start talbaty -->
    <form style="margin-top: 100px" id="talbaty" class="talbaty" method="POST"
        action="{{ url("/union/service/store/$service->id") }}" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="">
                <h3 class="text-center">
                    المستندات المطلوبة
                </h3>
            </div>


            <div class="card-body mt-4 mb-4">

                <div class="card card-default">
                    <div class="card-body" style="direction: rtl">
                        <div class="row">
                            <!-- الجانب الايمن-->
                            <div class="col-md-6">
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label> صورة طلب القيد الذي يتم ملء في جدول النقابة :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control" type="file" id="formFileDisabled"
                                                name="registration" />
                                        </div>
                                        @error('registration')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label> صورة البطاقة الشخصية :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control" type="file" id="formFileDisabled"
                                                name="personal_card" />
                                        </div>
                                        @error('personal_card')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة كارنيه النقابة :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="card">
                                        </div>
                                        @error('card')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة أصل شهادة التخصص (الدبلوم - الماجستير - الدكتوراه) :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="specialty">
                                        </div>
                                        @error('specialty')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة شخصية :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="personal">
                                        </div>
                                        @error('personal')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <!-- الجانب الايسر-->
                            <div style="margin-bottom: 30px" class="col-md-6">

                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صور سداد إشتراك النقابة للعام الحالي :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="receipt">
                                        </div>
                                        @error('receipt')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror>
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة شهادة الخبرة في مجال التخصص من جهة العمل :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="experience">
                                        </div>
                                        @error('experience')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة الزمالة :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="fellowship">
                                        </div>
                                        @error('fellowship')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة شهادة مهنية موضحاً بها التخصص :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="Professional">
                                        </div>
                                        @error('Professional')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة وصل سداد الخدمة :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="cost">
                                        </div>
                                        @error('cost')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group button">
                        <div class="input-group" style="direction: rtl">
                            <button type="submit" class="form-control">تسجيل</button>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </form>
    <!-- end talbaty-->
@endsection
