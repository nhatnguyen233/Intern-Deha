<div class="content-dashboard">
    <div class="dropdown content-title ">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle-o"></i>
            Admin
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if (Auth::check())
                <a class="dropdown-item"><i class="fa fa-user"></i>{{ Auth::user()->name }}</a>
            @endif
            <form action="logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item" id="logout"><i class="fa fa-sign-out"></i>Logout</button>
            </form>
        </div>
    </div>
