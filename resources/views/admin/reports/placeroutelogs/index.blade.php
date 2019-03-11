@extends('layouts.main')
@section('title','รายงานเส้นทางสถานที่ท่องเที่ยว')
@section('content')
    <br>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/reports.png"> รายงานเส้นทางสถานที่ท่องเที่ยว</strong>
                </div>
                <div class="card-body">
                    <table id="placetable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>สถานที่เริ่มต้น</th>
                            <th>สถานที่ท่องเที่ยว</th>
                            <th>ระยะทาง</th>
                            <th>เวลาที่ใช้เดินทาง</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($placeroutelogs) > 0)
                            @foreach ($placeroutelogs as $placeroutelog)
                                <tr>
                                    <td>{{ $placeroutelog->place_origin}}</td>
                                    <td>{{ $placeroutelog->place_destination }}</td>
                                    <td>{{ $placeroutelog->place_distance }}</td>
                                    <td>{{ $placeroutelog->place_duration }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">ไม่มีข้อมูลค้นหาเส้นทาง</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->


    @push('scripts')

        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            })
        </script>
    @endpush
@endsection