@extends('admin.layout')

@section('link')
    <link rel="stylesheet" href="{{ asset('style_admin/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('style_admin/css/jquery.fancybox.min.css') }}">
@endsection

@section('title')
    مراجعة طلب العضو
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        مراجعة طلب العضو
    </h1>
@endsection

@section('main')
    <div class="card card-danger">
        <div class="card-header">
            <div>
                <h5>
                    <span> اسم العضو : </span>
                    {{ $user->name }}
                </h5>
            </div>
            <div>
                <h5>
                    <span> اسم الخدمة : </span>
                    {{ $service->namear }}
                </h5>
            </div>
        </div>

        <div class="card-body">
            <div style="direction:rtl;">
                <div class="container">
                    <div class="container-fluid">
                        <div class="row">

                            
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="cardimg">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <a data-fancybox="gallery" href="{{ asset("web/$img->police_certificae") }}"
                                                    data-caption="صورة شهاده من النيابة العامة او نيابى امن الدوله تفيد ان العضو محبوس احتياطيا">
                                                    <img src="{{ asset("web/$img->police_certificae") }}" alt="image">
                                                </a>
                                                <p class="mt-2">صورة شهاده من النيابة العامة او نيابى امن الدوله تفيد ان العضو محبوس احتياطيا</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="cardimg">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <a data-fancybox="gallery" href="{{ asset("web/$img->wedding") }}"
                                                    data-caption="صورة قسيمة الزواج">
                                                    <img src="{{ asset("web/$img->wedding") }}" alt="image">
                                                </a>
                                                <p class="mt-2">صورة قسيمة الزواج</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="cardimg">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <a data-fancybox="gallery" href="{{ asset("web/$img->receipt") }}"
                                                    data-caption="صورة ايصال آخر سداد اشتراك النقابة">
                                                    <img src="{{ asset("web/$img->receipt") }}" alt="image">
                                                </a>
                                                <p class="mt-2">صورة ايصال آخر سداد اشتراك النقابة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 

                            
                            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                                <div class="cardimg">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div class="align-self-center">
                                                <a data-fancybox="gallery" href="{{ asset("web/$img->cost") }}"
                                                    data-caption="صورة وصل سداد الخدمة">
                                                    <img src="{{ asset("web/$img->cost") }}" alt="image">
                                                </a>
                                                <p class="mt-2">صورة وصل سداد الخدمة</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form">
                            <div style="text-align: right" class="card cardimg">
                                <div class="card-body" style="direction: rtl">
                                    <form action="{{url("admin/review/$user->id/$service->id")}}" method="POST">
                                        @csrf
                                        <h2 class="text-right">مراجعة الطلب</h2>
                                        <textarea placeholder="يرجي كتابة ملاحظات المشرف المراجع علي بيانات الخدمة"
                                            name="text" value="" id=""></textarea>
                                            <div >
                                                @error('text')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                        <div class="mt-3 d-flex">
                                            <div class="form-check ckeck1">
                                                <input class="form-check-input" type="radio" name="check" value="موافق"
                                                    id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    موافقة
                                                </label>
                                            </div>
                                            <div class="form-check check2">
                                                <input class="form-check-input" type="radio" name="check" value="رفض"
                                                    id="flexRadioDefault2">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    رفض
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group approve">
                                            <div class="input-group" style="direction: rtl">
                                                <input style="background-color: #DC3545;color: white" type="submit"
                                                    value="ارسال" class="form-control">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('style_admin/js/jquery.fancybox.min.js') }}"></script>
@endsection
