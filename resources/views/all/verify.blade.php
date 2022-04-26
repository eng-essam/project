@extends('web.layout_member')


@section('main')
    <!-- Start #main -->
    <main id="main">

        <main style="margin:100px 0 300px 0 " id="main">
            @include('all.message')
            <div style="text-align: center;" class="alert alert-success">
                تم ارسال رابط تأكيد الحساب بالفعل يرجي تفقد رسائل البريد الالكتروني
                <div>
                    <form action="{{ url('email/verification-notification') }}" method="POST">
                        @csrf
                        <button style="background-color: #013289;color: white;margin-top: 15px"  type="submit">اعاده ارسال رابط التأكيد</button>
                    </form>
                </div>
            </div>
        </main>
    </main>
    <!-- End #main -->
@endsection
