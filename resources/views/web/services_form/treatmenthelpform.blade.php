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
                                    <label>شهاده من مشروع العالج تفيد عدم استفاده العضو من المشروع:</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control" type="file" id="formFileDisabled"
                                                name="project" />
                                        </div>
                                        @error('project')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>- اصل الفاتورة مختوم بختم المستشفي:</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="hospitalcost">
                                        </div>
                                        @error('hospitalcost')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>اصل تقرير طبي صادر عن المستشفي او عن الطبيب المعالج :</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="report">
                                        </div>
                                        @error('report')
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
                                    <label>اعتماد من المستشفي يوضح به تاريخ الدخول والخروج ووصف
                                        الحاله المرضيه:</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="hospital">
                                        </div>
                                        @error('hospital')
                                            <div>
                                                <small class="text-danger">{{ $message }}</small>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- ادخل-->
                                <div class="form-group main">
                                    <label>صورة ايصال اخر سداد اشتراك النقابة:</label>
                                    <div class="input-group inner" style="direction: rtl">
                                        <div>
                                            <input class="form-control mb-2" type="file" id="formFile" name="receipt">
                                        </div>
                                        @error('receipt')
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
