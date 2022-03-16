@extends('superadmin.layout')

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
                <form action="{{ url('/member/operation') }}" method="get">
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
                    <tr>
                        <th style="text-align: center;font-size: 20px" scope="col">اسم العضو</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الخدمة</th>
                        <th style="text-align: center;font-size: 20px" scope="col">ملاحظات المشرف</th>
                        <th style="text-align: center;font-size: 20px" scope="col">حالة الطلب</th>
                        <th style="text-align: center;font-size: 20px" scope="col">المشرف</th>
                    </tr>
                </thead>
                <tbody>

                    @for ($j = 0; $j < count($all_users); $j++)
                        @for ($i = 0; $i < count($all_users[$j]['operations']); $i++)
                            <tr>
                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['name'] }}</td>

                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['namear'] }}</td>

                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['pivot']['message'] }}</td>

                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['pivot']['status'] }}</td>

                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['pivot']['admin_name'] }}</td>
                            </tr>
                        @endfor
                    @endfor

                </tbody>
            </table>

        </div>
    </div>
@endsection
