@extends('superadmin.layout')

@section('title')
    تعديل تكلفة خدمة
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        تعديل تكلفة خدمة
    </h1>
@endsection

@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title">

            </h3>
        </div>
        <form action="{{ url("/edit/service/cost/$services->id") }}" method="POST">
            @csrf

            <div class="card-body">

                <table class="table table-bordered " style="direction: rtl">
                    <thead>
                        <tr>
                            <th style="text-align: center;font-size: 20px" scope="col">اسم الخدمة</th>
                            <th style="text-align: center;font-size: 20px" scope="col">تكلفة الخدمة</th>
                            <th style="text-align: center;font-size: 20px" scope="col">عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;font-size: 19px">{{ $services->namear }}</td>
                            <td style="text-align: center;font-size: 19px">
                                <input style="width: 100px" type="text" name="service_cost"
                                    value="{{ $services->pivot->service_cost }}"> جنية

                                <div style="color: red ;font-size:15px">@error('service_cost'){{ $message }} @enderror</div>
                            </td>
                            <td style="text-align: center">
                                <input style="background-color: #DC3545 ;color: white ;width: 50px;font-weight: bold "
                                    type="submit" value="حفظ">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </form>

    </div>
@endsection
