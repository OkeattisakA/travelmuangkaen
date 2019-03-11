<div class="sidebar">
    <nav class="sidebar-nav">

        @if(Auth::user()->isAn('admin'))


        <ul class="nav">

            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin/dashboards') }}"><i class="icon-speedometer"></i> แดชบอร์ด </a>
                <a class="nav-link" href="{{ url('admin/users') }}"><i class="icon-user"></i> ผู้ใช้งาน </a>
                <a class="nav-link" href="{{ url('admin/roles') }}"><i class="icon-layers"></i> ระดับผู้ใช้งาน </a>
                <a class="nav-link" href="{{ url('admin/places') }}"><i class="icon-directions"></i> สถานที่ท่องเที่ยว </a>
                <a class="nav-link" href="{{ url('admin/wisdoms') }}"><i class="icon-directions"></i> ภูมิปัญญาท้องถิ่น </a>
                <a class="nav-link" href="{{ url('admin/settings') }}"><i class="icon-settings"></i> ตั้งค่า </a>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-chart"></i> รายงาน</a>
                <ul class="nav-dropdown-items">
                    </li>
                    <a class="nav-link" href="{{ url('admin/reports/places') }}">ข้อมูลสถานที่ท่องเที่ยว</a>
                    <a class="nav-link" href="{{ url('admin/reports/wisdoms') }}">ข้อมูลภูมิปัญญาท้องถิ่น</a>
                    <a class="nav-link" href="{{ url('admin/reports/placeroutelogs') }}">เส้นทางสถานที่ท่องเที่ยว</a>
                    <a class="nav-link" href="{{ url('admin/reports/wisdomroutelogs') }}">เส้นทางภูมิปัญาท้องถิ่น</a>
                    <a class="nav-link" href="{{ url('admin/activitylog/') }}">ประวัติการใช้งาน</a>
                    </li>
                </ul>
            </li>

        </ul>

        @else(Auth::user()->isAn('member'))

            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('member/dashboards') }}"><i class="icon-speedometer"></i> แดชบอร์ด </a>
                    <a class="nav-link" href="{{ url('member/places') }}"><i class="icon-directions"></i> ข้อมูลสถานที่ท่องเที่ยว </a>
                    <a class="nav-link" href="{{ url('member/wisdoms') }}"><i class="icon-directions"></i> ภูมิปัญญาท้องถิ่น </a>
                </li>
            </ul>

        @endif

    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>