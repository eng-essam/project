@if ($errors->any())
    <div style="margin:10px auto 5px auto ;width: max-content" class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


