<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="/icon/travel.png" width="40" height="40" alt="">
        Travel Muangkaen
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">หน้าแรก</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('places') }}">สถานที่ท่องเที่ยว</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('wisdoms') }}">ภูมิปัญญาท้องถิ่น</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ url('maps') }}">แผนที่</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" target="_blank" href="{{ url('https://goo.gl/forms/6FmbDgxcgVN5lDNq2') }}">แบบสำรวจความพึงพอใจ</a>
            </li>
        </ul>

        @if (Auth::guest())

            <ul class="navbar-nav ml-md-auto">
                <li class="nav-item pr-2">
                    <a class="btn btn-outline-light" href="{{ url('/register') }}">สมัครสมาชิก</a>
                </li>
                <li class="nav-item pr-2">
                    <a class="btn btn-outline-light" href="{{ url('/login') }}">เข้าสู่ระบบ</a>
                </li>
            </ul>

        @else

            <ul class="navbar-nav ml-md-auto">

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white">

                        @if(Auth::user()->provider == 'facebook')
                            <img src="http://graph.facebook.com/{{ Auth::user()->provider_id }}/picture" class="img-avatar">
                        @else
                            <img src="/uploads/profiles/{{ Auth::user()->avatar }}" class="img-avatar">
                        @endif
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        @if(Auth::user()->isAn('admin'))
                            <a class="dropdown-item" target="_blank" href="{{ url('admin/dashboards') }}"><i class="fa fa-lock"></i>Admin Manage</a>
                        @elseif(Auth::user()->isAn('member'))
                            <a class="dropdown-item" target="_blank" href="{{ url('member/dashboards') }}"><i class="fa fa-lock"></i>Member Manage</a>
                        @else

                        @endif
                            <a class="dropdown-item" href="{{ url('userprofiles') }}"><i class="fa fa-lock"></i>จัดการข้อมูลส่วนตัว</a>

                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i>ออกจากระบบ</a>
                        <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>

            {{--<li class="nav-item dropdown">--}}
            {{--<a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">--}}
            {{--<span class="d-md-down-none">{{ Auth::user()->name }}</span>--}}
            {{--</a>--}}
            {{--<div class="dropdown-menu dropdown-menu-right">--}}
            {{--<a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();--}}
            {{--document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout</a>--}}
            {{--<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">--}}
            {{--{{ csrf_field() }}--}}
            {{--</form>--}}
            {{--</div>--}}
            {{--</li>--}}

        @endif

    </div>
</nav>