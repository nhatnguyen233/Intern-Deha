<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Manage product</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/admin/style.css') }}" rel="stylesheet">
</head>

<body>

<div id="login-page">

    <div class="content">
        <form class="form-login" action="/login" method="POST">
            @csrf
            <div class="login-header">&nbsp;&nbsp;&nbsp;Login</div>

            <div class="login-wrap">
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;Email <span style="color: red">*</span></label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                </div>

                <br>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label">&nbsp;&nbsp;&nbsp;Password <span
                            style="color: red">*</span></label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                    </div>
                </div>
                <button class="btn btn-info login-btn" type="submit"> Login
                </button>
                <hr>
            </div>
        </form>

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{Session::get('error')}}
            </div>
        @endif

        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                    {{ $err }} <br/>
                @endforeach
            </div>
        @endif
    </div>
</div>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('assets/js/jquery-3.4.1.slim.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</body>
</html>
