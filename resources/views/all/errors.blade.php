@if ($errors->any())
    <div style="margin: 20px 20px 0 20px;" class="alert alert-danger">
        <ul style="text-align: center" class="list-unstyled ">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('status'))
    <div style="margin:10px auto 5px auto ;width: max-content" class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!--  رقم النقابة غلط عند تسجيل العضو-->
@if (session('error-msg'))
    <div style="text-align: center"  class="alert alert-danger">
        <p> {{ session('error-msg') }} </p>
    </div>
@endif

<!--  تسجيل بريد ولكمة سر بنحاج للعضو-->
@if (session('success-msg'))
    <div style="text-align: center" class="alert alert-success">
        <p> {{ session('success-msg') }} </p>
    </div>
@endif
