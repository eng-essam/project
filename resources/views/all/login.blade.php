 @extends('all.layout_log')

 @section('title')
     تسجيل دخول
 @endsection

 @section('main')
     <form action="{{ url('/guest/login') }}" method="POST" enctype="multipart/form-data" class="login-form">
        @csrf
         <span class="login-form-title p-b-43">سجل من هنا</span>
         <div style="margin-bottom: 10px">
            @include('all.errors')
         </div>

         <div style="margin-bottom: 25px">
             <div>
                 <input name="email" value="{{old('email')}}" type="text" class="bg-light" placeholder="البريد الإلكتروني">
             </div>
         </div>

         <div>
             <div><input name="password" type="password" class="bg-light" placeholder="كلمة السر"></div>
         </div>

         <div class="container-login-form-btn mt-4 mb-4">
             <button type="submit" class="login-form-btn">تسجيل</button>
         </div>

         <div class="flex-sb-m w-full p-t-3 p-b-32 ">
             <div><a href="{{ url('/register/member') }}" class="txt1">إنشاء حساب</a></div>
             <div><a href="{{ url('/requestPassword') }}" class="txt1">نسيت كلمة السر؟</a></div>
         </div>

     </form>
 @endsection
