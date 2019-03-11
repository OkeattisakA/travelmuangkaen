@extends('layouts.main')
@section('title','รายงานข้อมูลภูมิปัญญาท้องถิ่น')
@section('content')
    <br>
    {!! Charts::assets() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลภูมิปัญญาท้องถิ่นใช้เปิดอ่านมากสุด 5 อันดับ</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topread->render() !!}
                    <br>
                    <a target="_blank" href="{{ url('admin/reports/wisdom_top_read/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
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
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลภูมิปัญญาท้องถิ่นที่มีการรีวิวมากสุด 5 อันดับ</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topreview->render() !!}
                    <br>
                    <a target="_blank" href="{{ url('admin/reports/wisdom_top_review/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
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
                    <strong><img src="/icon/reports.png"> รายงานข้อมูลภูมิปัญญาท้องถิ่นที่ค้นหามากสุด</strong>
                </div>
                <div class="card-block">
                    {!! $chart_topsearch->render() !!}
                    <br>
                    <a target="_blank" href="{{ url('admin/reports/wisdom_top_search/download') }}" class="btn btn-success"><img src="/icon/pdf.png"> Export PDF File</a>
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