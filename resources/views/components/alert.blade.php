@if(session('success'))
    <div class="alert alert-info" role="alert">
        {{session('success')}}
    </div>
@endif
@if(session('update'))
    <div class="alert alert-info" role="alert">
        {{session('update')}}
    </div>
@endif
@if(session('delete'))
    <div class="alert alert-info" role="alert">
        {{session('delete')}}
    </div>
@endif
