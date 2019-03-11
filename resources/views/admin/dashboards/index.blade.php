@extends('layouts.main')
@section('title','แดชบอร์ด')
@section('content')
    <br>
    <div class="row">

        <div class="col-6 col-lg-3">
            <a href="{{ url('admin/places') }}">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fa fa-location-arrow bg-primary p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-primary mb-0 mt-2">{{ DB::table('places')->count() }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">สถานที่ท่องเที่ยว</div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-6 col-lg-3">
            <a href="{{ url('admin/wisdoms') }}">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fa fa-rss bg-primary p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-primary mb-0 mt-2">{{ DB::table('wisdoms')->count() }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">ภูมิปัญญาท้องถิ่น</div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-6 col-lg-3">
            <a href="{{ url('admin/users') }}">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fa fa-user-o bg-primary p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-primary mb-0 mt-2">{{ DB::table('users')->count() }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">ผู้ใช้งาน</div>
                </div>
            </div>
            </a>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 clearfix">
                    <i class="fa fa-pencil bg-primary p-3 font-2xl mr-3 float-left"></i>
                    <div class="h5 text-primary mb-0 mt-2">{{ DB::table('placereviews')->count() + DB::table('wisdomreviews')->count()}}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs">รีวิวทั้งหมด</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img src="/icon/places.png"> ข้อมูลสถานที่ท่องเที่ยวที่เพิ่มล่าสุด
                </div>
                <div class="card-body">
                    <ul class="icons-list">
                        @if (count($places) > 0)
                            @foreach ($places as $place)
                                <li>
                                    @if($place->place_status == 1)
                                        <i class="fa fa-check bg-success" data-toggle="tooltip" data-placement="bottom" title="ตรวจสอบแล้ว"></i>
                                    @else
                                        <i class="fa fa-times bg-danger" data-toggle="tooltip" data-placement="bottom" title="รอการตรวจสอบ"></i>
                                    @endif
                                        <a href="{{ url("admin/places/{$place->place_id}") }}">
                                    <div class="desc">
                                        <div class="title">{{ $place->place_name_th }}</div>
                                        <small>{{ $place->place_name_eng }}</small>
                                    </div>
                                        </a>
                                    <div class="value">
                                        <div class="small text-muted">เพิ่มโตย</div>
                                        <strong>{{ $place->user->name }}</strong>
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ $place->created_at }}"><i class="fa fa-clock-o"></i></button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p align="center">ไม่มีข้อมูล</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img src="/icon/reviews.png"> ข้อมูลรีวิวสถานที่ท่องเที่ยวที่เพิ่มล่าสุด
                </div>
                <div class="card-body">
                    <ul class="icons-list">
                    @if (count($placereviews) > 0)
                        @foreach ($placereviews as $placereview)
                            <li>

                                @if($placereview->placereview_status == 1)
                                    <i class="fa fa-check bg-success" data-toggle="tooltip" data-placement="bottom" title="ตรวจสอบแล้ว"></i>
                                @else
                                    <i class="fa fa-times bg-danger" data-toggle="tooltip" data-placement="bottom" title="รอการตรวจสอบ"></i>

                                @endif
                                <a href="{{ url("admin/places/{$placereview->place->place_id }") }}">
                                    <div class="desc">
                                        <div class="title">{{ $placereview->placereview_detail }}</div>
                                        <small>{{ $placereview->place->place_name_th }}</small>
                                    </div>
                                </a>
                                <div class="value">
                                    <div class="small text-muted">เพิ่มโตย</div>
                                    <strong><a href="https://www.facebook.com/{{ $placereview->user->provider_id }}">{{ $placereview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $placereview->user->provider_id }}" alt="" style="width: 20px; height: 20px;"></strong>
                                </div>
                                <div class="actions">
                                    <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ $placereview->created_at }}"><i class="fa fa-clock-o"></i></button>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <p align="center">ไม่มีข้อมูล</p>
                    @endif
                    </ul>
                </div>
            </div>
        </div>
        </div>

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img src="/icon/wisdoms.png"> ข้อมูลภูมิปัญญาท้องถิ่นที่เพิ่มล่าสุด
                </div>
                <div class="card-body">
                    <ul class="icons-list">
                        @if (count($wisdoms) > 0)
                            @foreach ($wisdoms as $wisdom)
                                <li>
                                    @if($wisdom->wisdom_status == 1)
                                        <i class="fa fa-check bg-success" data-toggle="tooltip" data-placement="bottom" title="ตรวจสอบแล้ว"></i>
                                    @else
                                        <i class="fa fa-times bg-danger" data-toggle="tooltip" data-placement="bottom" title="รอการตรวจสอบ"></i>
                                    @endif
                                    <a href="{{ url("admin/wisdoms/{$wisdom->wisdom_id}") }}">
                                        <div class="desc">
                                            <div class="title">{{ $wisdom->wisdom_name_th }}</div>
                                            <small>{{ $wisdom->wisdom_name_eng }}</small>
                                        </div>
                                    </a>
                                    <div class="value">
                                        <div class="small text-muted">เพิ่มโตย</div>
                                        <strong>{{ $wisdom->user->name }}</strong>
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ $wisdom->created_at }}"><i class="fa fa-clock-o"></i></button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p align="center">ไม่มีข้อมูล</p>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <img src="/icon/reviews.png"> ข้อมูลรีวิวภูมิปัญญาท้องถิ่นที่เพิ่มล่าสุด
                </div>
                <div class="card-body">
                    <ul class="icons-list">
                        @if (count($wisdomreviews) > 0)
                            @foreach ($wisdomreviews as $wisdomreview)
                                <li>

                                    @if($wisdomreview->wisdomreview_status == 1)
                                        <i class="fa fa-check bg-success" data-toggle="tooltip" data-placement="bottom" title="ตรวจสอบแล้ว"></i>
                                    @else
                                        <i class="fa fa-times bg-danger" data-toggle="tooltip" data-placement="bottom" title="รอการตรวจสอบ"></i>

                                    @endif
                                        <a href="{{ url("admin/wisdoms/{$wisdomreview->wisdom->wisdom_id }") }}">
                                    <div class="desc">
                                        <div class="title">{{ $wisdomreview->wisdomreview_detail }}</div>
                                        <small>{{ $wisdomreview->wisdom->wisdom_name_th }}</small>
                                    </div>
                                        </a>
                                    <div class="value">
                                        <div class="small text-muted">เพิ่มโตย</div>
                                        <strong><a href="https://www.facebook.com/{{ $wisdomreview->user->provider_id }}">{{ $wisdomreview->user->name }} </a><img src="https://www.seeklogo.net/wp-content/uploads/2016/09/facebook-icon-preview-1-400x400.png" data-toggle="tooltip" data-placement="top" title="FB ID : {{ $wisdomreview->user->provider_id }}" alt="" style="width: 20px; height: 20px;"></strong>
                                    </div>
                                    <div class="actions">
                                        <button type="button" class="btn btn-link" data-toggle="tooltip" data-placement="bottom" title="{{ $wisdomreview->created_at }}"><i class="fa fa-clock-o"></i></button>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <p align="center">ไม่มีข้อมูล</p>
                        @endif
                    </ul>
                </div>
            </div>

    </div>

        @push('scripts')
            <script type="text/javascript">
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                })
            </script>
    @endpush
@endsection