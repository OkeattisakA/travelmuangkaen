<header class="app-header navbar">

    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">☰</button>
    <a class="navbar-brand" href="#">
        Travel Muangkaen
    </a>
    <button class="navbar-toggler sidebar-minimizer d-md-down-none" type="button">☰</button>


    <ul class="nav navbar-nav ml-auto">

        @if (Auth::guest())

            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{ url('/login') }}"><i class="icon-login"></i></a>
            </li>

            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="{{ url('/register') }}"><i class="icon-user-follow"></i></a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="/uploads/profiles/{{ Auth::user()->avatar }}" class="img-avatar">
                    <span class="d-md-down-none">{{ Auth::user()->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>

        @endif

    </ul>
    <button class="navbar-toggler" type="button">☰</button>

</header>