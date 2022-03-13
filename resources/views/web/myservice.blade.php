@extends('web.layout')

@section('title')
    طلباتي
@endsection



@section('main')
    @if (session('success_edit'))
        <div class="alert alert-success" style="margin: auto ;width: max-content">
            <div style="direction: rtl   ; width: max-content  ;font-size: 20px ;margin-bottom: 10px ">
                {{ session('success_edit') }}
            </div>
        </div>
    @endif

    <table class="table" style="float: right">
        <thead>
            <tr>
                <th scope="col">اسم الخدمة</th>
                <th scope="col">تاريخ الطلب</th>
                <th scope="col">حالة الطلب</th>
                <th scope="col">ملاحظات الطلب</th>
                <th scope="col">عمليات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myservice as $data)
                <tr>
                    <td>{{ $data->namear }}</td>
                    <td>{{ Carbon\Carbon::parse($data->pivot->created_at)->format('Y-m-d') }}</td>
                    <td> {{ $data->pivot->status }}</td>
                    <td>{{ $data->pivot->message }}</td>
                    <td><a href="{{ url('member/service/delete/' . $data->pivot->service_id) }}">الغاء</a> |
                        <a href="{{ url('member/service/eidt/' . $data->pivot->service_id) }}">تعديل</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
