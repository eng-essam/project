@extends('superadmin.layout')

@section('title')
    العمليات
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        جميع الطلبات
    </h1>
@endsection

@section('main')
    <div class="card" style="direction: rtl">

        <div class="card-header">
            <!-- فورم البحث-->
            <div>
                <form action="{{ url('/search/member/operation') }}" method="get">
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
                        <th style="text-align: center;font-size: 20px" scope="col">ملاحظات المشرف</th>
                        <th style="text-align: center;font-size: 20px" scope="col">
                            <div class="dropdown">
                                <button
                                    style="width:160px;font-weight:500;color: #DC3545 ;background-color: white;border: none"
                                    class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    حالة الطلب
                                </button>
                                <ul style="text-align: center" class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a href="{{ url('/super/operation') }}" style="font-weight:bold"
                                            class="dropdown-item" href="#">جميع الطلبات</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ url('/accept/operation') }}" style="font-weight:bold"
                                            class="dropdown-item" href="#">تم الموافقة</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ url('/refuse/operation') }}" style="font-weight:bold"
                                            class="dropdown-item" href="#">تم الرفض</a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ url('/check/operation') }}" style="font-weight:bold"
                                            class="dropdown-item" href="#">لم يتم المراجعة بعد</a>
                                    </li>
                                </ul>
                            </div>
                        </th>
                        <th style="text-align: center;font-size: 20px" scope="col">المشرف</th>
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
                                    {{ $all_users[$j]['operations'][$i]['pivot']['message'] }}
                                </td>
                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['pivot']['status'] }}
                                </td>
                                <td style="text-align: center;font-size: 19px">
                                    {{ $all_users[$j]['operations'][$i]['pivot']['admin_name'] }}
                                </td>
                            </tr>
                        @endfor
                    @endfor

                </tbody>
            </table>

        </div>
    </div>
@endsection
