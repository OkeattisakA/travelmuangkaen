@extends('layouts.main')
@section('title','รายงานข้อมูลสถานที่ท่องเที่ยว')
@section('content')
    <br>
    {!! Charts::assets() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลสถานที่ท่องเที่ยวที่ผู้ใช้เปิดอ่านมากสุด 5 อันดับ</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topread->render() !!}
                    <br>
                        <a target="_blank" href="{{ url('admin/reports/place_top_read/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
                </div>

            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลสถานที่ท่องเที่ยวที่มีการรีวิวมากสุด 5 อันดับ</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topreview->render() !!}
                    <br>
                    <a target="_blank" href="{{ url('admin/reports/place_top_review/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลสถานที่ท่องเที่ยวที่ค้นหามากสุด</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topsearch->render() !!}
                    <br>
                    <a target="_blank" href="{{ url('admin/reports/place_top_search/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->

    @push('scripts')

        <script type="text/javascript">

        </script>
    @endpush
@endsection