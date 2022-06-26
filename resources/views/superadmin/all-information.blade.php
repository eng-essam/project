@extends('superadmin.layout')

@section('title')
الأخبار
@endsection


@section('namepage')
<h1 style="color: white ; font-size: 25px ;padding-top: 10px">
    جميع الأخبار
</h1>
@endsection

@section('main')
<div class="card" style="direction: rtl">

    <div class="card-header">

        <div style="text-align: center;display: inline-block ;float: right;height: 33px;">
            <a href="{{ url('/superadmin/add/information') }}">
                <i style="font-size:25px ; color: #DC3545;" class="fas fa-newspaper fa-xl"></i>
                <p style="color:#DC3545;font-weight: bold">إضافة خبر</p>
            </a>
        </div>
    </div>

    @include('all.message')

    <div class="card-body">
        <div style="direction: rtl;" class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($information as $info)
            <!-- start for loob -->
            <div class="col">
                <div style="border:1px #3C4147 solid ;" class="card">
                    <!-- صوره الخبر -->
                    <img src="{{asset("web/$info->img")}}" class="card-img-top" alt="image">

                    <div style="height: 130px;" class="card-body">
                        <!-- عنوان الخبر -->
                        <h5 class="text-right" class="card-title">{{ $info->header}}</h5>
                        <!-- محتوي الخبر -->
                        <p style="text-align: right; display: -webkit-box;-webkit-line-clamp: 4;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;" class="card-text">{{ $info->titel }}</p>
                    </div>

                    <a style="text-align: center;text-decoration: none;font-weight: bold;margin-top: 10px;"
                        href="{{ url("/superadmin/one/information/$info->id") }}">المزيد</a>

                    <p style="margin: 5px;" class="card-text">

                            <small style="float: right" class="text-muted">
                                <i style="color:blue ;" class="fas fa-user"></i>
                                <span style="margin-right:2px ;">{{$info->admin_name}}</span>
                            </small>

                            <small style="" class="text-muted">
                                <i style="color:blue ;" class="fas fa-clock"></i>
                                <span style="margin-right:2px ;">{{ Carbon\Carbon::parse($info->created_at)->format('Y-m-d')}}</span>
                            </small>
                    </p>

                    <div style="background-color:#3C4147 ;display: grid;grid-template-columns: repeat(2,50%);justify-items: center;"
                        class="card-footer">
                        <a href="{{ url('superadmin/information/delete/' . $info->id) }}"><i
                                style="color:red ;font-size:x-large;" class="fas fa-trash-alt"></i></a>
                        <a href="{{ url('superadmin/information/eidt/' . $info->id) }}"><i style="font-size:x-large;"
                                class="fas fa-edit"></i></a>
                    </div>
                </div>
            </div>
            <!-- end for loob -->
            @endforeach
        </div>

        <div style="width: max-content;margin: 20px auto">
            {{$information->links() }}
        </div>
    </div>
</div>
@endsection
