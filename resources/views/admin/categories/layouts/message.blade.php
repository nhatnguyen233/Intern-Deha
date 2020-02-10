@if(session('success'))
    <div class="alert alert-success mt-2">
        {{session('success')}}
    </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-danger">
        {{Session::get('error')}}
    </div>
@endif
@if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err)
            {{$err}}<br>
        @endforeach
    </div>
@endif


