@if ($errors->any())
    <div style="margin:10px auto 5px auto ;width: max-content" class="alert alert-danger">
        <ul class="list-unstyled">
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
@if (request()->session()->has('error-msg'))
    <div class="alert alert-danger">
        <p> {{ request()->session()->get('error-msg') }} </p>
    </div>
@endif

<!--  تسجيل بريد ولكمة سر بنحاج للعضو-->
@if (request()->session()->has('success-msg'))
    <div class="alert alert-success">
        <p> {{ request()->session()->get('success-msg') }} </p>
    </div>
@endif
