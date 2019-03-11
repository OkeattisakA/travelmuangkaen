@extends('layouts.main')
@section('title','แดชบอร์ด')
@section('content')
    <br>
    <div class="row">

        <div class="col-md-6">
            <a href="{{ url('member/places') }}">
                <div class="card">
                    <div class="card-body p-3 clearfix">
                        <i class="fa fa-location-arrow bg-primary p-3 font-2xl mr-3 float-left"></i>
                        <div class="h5 text-primary mb-0 mt-2">{{ DB::table('places')->where('place_publishby',Auth::user()->id)->count() }}</div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">สถานที่ท่องเที่ยว</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ url('member/wisdoms') }}">
                <div class="card">
                    <div class="card-body p-3 clearfix">
                        <i class="fa fa-rss bg-primary p-3 font-2xl mr-3 float-left"></i>
                        <div class="h5 text-primary mb-0 mt-2">{{ DB::table('wisdoms')->where('wisdom_publishby',Auth::user()->id)->count() }}</div>
                        <div class="text-muted text-uppercase font-weight-bold font-xs">ภูมิปัญญาท้องถิ่น</div>
                    </div>
                </div>
            </a>
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
                                    <a href="{{ url("member/places/{$place->place_id}") }}">
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
                                    <a href="{{ url("member/wisdoms/{$wisdom->wisdom_id}") }}">
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
@endsection