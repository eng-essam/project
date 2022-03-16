@extends('superadmin.layout')

@section('title')
    البحث عن مشرف
@endsection


@section('namepage')
    <h1 style="color: white ; font-size: 25px ;padding-top: 10px">
        بحث عن مشرف
    </h1>
@endsection

@section('main')
    <div class="card" style="direction: rtl">

        <div class="card-header">
            <div style="text-align: center;display: inline-block ;float: right;height: 33px;">
                <a href="{{ url('/add/admin') }}">
                    <i style="color: #DC3545;" class="fa-solid fa-user-plus fa-xl"></i>
                    <p style="color:#DC3545;font-weight: bold">اضافة عضو</p>
                </a>
            </div>

            <div>
                <form action="{{ url('/search/admin') }}" method="GET">
                    @csrf
                    <input style="width: 200px" type="text" placeholder="بحث عن مشرف " name="keyword">
                    <input style="background-color:#DC3545 ;color:white" type="submit" value="بحث">
                </form>
                <div style="color: red ;font-size:15px">
                    @error('keyword')
                        {{ $message }}
                    @enderror
                   
                </div>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="text-align: center;font-size: 20px" scope="col">الاسم</th>
                        <th style="text-align: center;font-size: 20px" scope="col">البريد الالكتروني</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الرقم القومي</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الهاتف</th>
                        <th style="text-align: center;font-size: 20px" scope="col">الجنس</th>
                        <th style="text-align: center;font-size: 20px" scope="col">العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allusers as $user)
                        <tr>
                            <td style="text-align: center;font-size: 19px">{{ $user->name }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->email }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->ssn }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->phone }}</td>
                            <td style="text-align: center;font-size: 19px">{{ $user->sex }}</td>
                            <td>
                                <div style="width: max-content;margin: auto;">
                                    <div style="margin-left:20px;text-align: center;display: inline-block ">
                                        <a href="{{ url("/delet/member/$user->id") }}">
                                            <i style="color: red" class="fa-solid fa-trash fa-xl"></i>
                                            <p style="color: red;font-weight: bold">حذف</p>
                                        </a>
                                    </div>

                                    <div style="text-align: center;display: inline-block ">
                                        <a href="{{ url("/edit/member/$user->id") }}">
                                            <i style="color: rgb(0, 207, 0)" class="fas fa-edit fa-xl"></i>
                                            <p style="color: rgb(0, 207, 0);font-weight: bold">تعديل</p>
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
@endsection
