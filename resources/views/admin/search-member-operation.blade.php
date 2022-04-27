@extends('admin.layout')

@section('title')
    العمليات
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        جميع العمليات
    </h1>
@endsection

@section('main')
    <div class="card" style="direction: rtl">

        <div class="card-header">
            <!-- فورم البحث-->
            <div>
                <form action="{{ url('/admin/search/member/operation') }}" method="get">
                    @csrf
                    <input style="width: 200px" type="text" placeholder="بحث عن عضو" name="keyword">
                    <input style="background-color:#DC3545 ;color:white" type="submit" value="بحث">
                </form>
                <div style="color: red ;font-size:15px">
                    @error('keyword')
                        {{ $message }}
                    @enderror
                    @if (session('error_keyword'))
                        {{ session('error_keyword') }}
                    @endif
                </div>
            </div>
        </div>

        @include('all.message')

        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr style="color: #DC3545;">
                        <th style="text-align: center;font-size: 20px" scope="col">اسم العضو</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الخدمة</th>
                        <th style="text-align: center;font-size: 20px" scope="col">تاريخ الطلب</th>
                        <th style="text-align: center;font-size: 20px" scope="col">عمليات</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($j = 0; $j < count($all_users); $j++)
                        @for ($i = 0; $i < count($all_users[$j]['operations']); $i++)
                            <tr>
                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['name'] }}
                                </td>
                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['namear'] }}
                                </td>
                                <td style="text-align: center;font-size: 19px">
                                    {{ Carbon\Carbon::parse($all_users[$j]['operations'][$i]['pivot']['created_at'])->format('Y-m-d') }}
                                </td>
                                <td style="text-align: center;font-size: 19px">
                                    <span style="display: none">
                                        {{ $member = $all_users[$j]['id'] }}
                                        {{ $service = $all_users[$j]['operations'][$i]['pivot']['service_id'] }}
                                    </span>
                                    <a href="{{ url("/admin/review/service/$member/$service") }}">مراجعة الطلب</a>
                                </td>
                            </tr>
                        @endfor
                    @endfor

                </tbody>
            </table>

        </div>
    </div>
@endsection
