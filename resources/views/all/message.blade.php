@if (session('success_delet'))
    <div class="alert alert-success" style="margin:10px auto 5px auto ;width: max-content">
        <div style=" width: max-content  ;font-size: 20px ;margin: auto ">
            {{ session('success_delet') }}
        </div>
    </div>
@endif

@if (session('success_edit'))
    <div  class="alert alert-success" style="margin:10px auto 5px auto ;width: max-content">
        <div style=" width: max-content  ;font-size: 20px ;margin: auto ">
            {{ session('success_edit') }}
        </div>
    </div>
@endif
