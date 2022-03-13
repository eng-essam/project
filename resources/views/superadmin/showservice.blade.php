@extends('superadmin.layout')

@section('title')
    الخدمات المتاحة
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        الخدمات المتاحة
    </h1>
@endsection

@section('main')
    <div class="card card-danger">

        <div class="card-header">
            <h3 class="card-title"></h3>
        </div>
        
        @include('all.message')

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
                    @foreach ($services as $service)
                        <tr>
                            <td style="text-align: center;font-size: 19px">{{ $service->namear }}</td>
                            <td style="text-align: center;font-size: 19px"> {{ $service->pivot->service_cost }} جنية</td>
                            <td>
                                <div style=" text-align: center;width: max-content;margin: auto">
                                    <a href="{{ url("/edit/service/cost/$service->id") }}">
                                        <i style="color: #157347" class="fas fa-edit fa-xl"></i>
                                        <p style="color: #157347;font-weight: bold">تعديل</p>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
