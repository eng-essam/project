@extends('web.layout_member')



@section('main')
    <!-- Start #main -->
    <main id="main">

        <div style="margin: 90px 0 90px 0" class="card" style="direction: rtl">
            @if (session('success'))
                <div style="text-align: center;margin: 10px 0 10px 0">
                    <div style="width: max-content;margin: auto" class="alert alert-danger">
                        <p> {{ session('success') }} </p>
                    </div>
                </div>
            @endif
            @include('all.message')
            <div class="card-body">
                <table style="direction: rtl;" class="table table-bordered">
                    <thead>
                        <tr style="background-color:#013289 ">
                            <th style="text-align: center;font-size: 20px;color: white" scope="col">اسم الخدمة</th>
                            <th style="text-align: center;font-size: 20px;color: white" scope="col">تاريخ الطلب</th>
                            <th style="text-align: center;font-size: 20px;color: white" scope="col">حالة الطلب</th>
                            <th style="text-align: center;font-size: 20px;color: white" scope="col">ملاحظات الطلب</th>
                            <th style="text-align: center;font-size: 20px;color: white" scope="col">عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($myservice as $data)
                            <tr>
                                <td style="text-align: center;font-size: 19px;padding-top: 25px">{{ $data->namear }}</td>
                                <td style="text-align: center;font-size: 19px;padding-top: 25px">
                                    {{ Carbon\Carbon::parse($data->pivot->created_at)->format('Y-m-d') }}</td>
                                <td style="text-align: center;font-size: 19px;padding-top: 25px">
                                    {{ $data->pivot->status }}</td>
                                <td style="text-align: center;font-size: 19px;padding-top: 25px">
                                    {{ $data->pivot->message }}</td>
                                <td style="padding-top: 25px">
                                    <div style="width: max-content;margin: auto;">
                                        <div style="margin-left:20px;text-align: center;display: inline-block ">
                                            <a href="{{ url('member/service/delete/' . $data->pivot->service_id) }}">
                                                <i style="color: #BB2D3B" class="fa-solid fa-trash fa-xl"></i>
                                                <p style="color: #BB2D3B;font-weight: bold">الغاء</p>
                                            </a>
                                        </div>

                                        <div style="text-align: center;display: inline-block ">
                                            <a href="{{ url('member/service/eidt/' . $data->pivot->service_id) }}">
                                                <i style="color: #157347" class="fas fa-edit fa-xl"></i>
                                                <p style="color: #157347;font-weight: bold">تعديل</p>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>
    <!-- End #main -->
@endsection
