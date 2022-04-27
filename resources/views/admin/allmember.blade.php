@extends('admin.layout')

@section('title')
    الاعضاء
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        جميع الاعضاء
    </h1>
@endsection

@section('main')
    <div class="card" style="direction: rtl">

        <div class="card-header">

            <div style="text-align: center;display: inline-block ;float: right;height: 33px;">
                <a href="{{ url('/admin/add/member') }}">
                    <i style="color: #DC3545;" class="fa-solid fa-user-plus fa-xl"></i>
                    <p style="color:#DC3545;font-weight: bold">اضافة عضو</p>
                </a>
            </div>
            <!-- فورم البحث-->
            <div>
                <form action="{{ url('/admin/search/member') }}" method="GET">
                    @csrf
                    <input style="width: 200px" type="text" placeholder="بحث عن عضو" name="keyword">
                    <input style="background-color:#DC3545;color:white" type="submit" value="بحث">
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
                        <th style="text-align: center;font-size: 20px" scope="col">الاسم</th>
                        <th style="text-align: center;font-size: 20px" scope="col">البريد الالكتروني</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الرقم القومي</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الهاتف</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الجنس</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الكود النقابي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allusers as $user)
                        <tr>
                            <td style="text-align: center;font-size: 19px">{{ $user->name }}</td>
                            <td style="text-align: center;font-size: 19px">
                                @if ($user->email == null)
                                    العضو لم يسجل في الموقع بعد
                                @else
                                    {{ $user->email }}
                                @endif
                            </td>
                            <td style="text-align: center;font-size: 19px">{{ $user->ssn }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->phone }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->sex }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->union_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="width: max-content;margin: 20px auto">
                {{ $allusers->links() }}
            </div>
        </div>
    </div>
@endsection
