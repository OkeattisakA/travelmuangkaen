@extends('layouts.main')
@section('title','ประวัติการใช้งาน')
@section('content')
    <br>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>ประวัติการใช้งาน</strong>
                </div>
                <div class="card-body">
                    <table id="placetable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>causer_id</th>
                            <th>causer_type</th>
                            <th>properties</th>
                            <th>created_at</th>
                            <th>updated_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($logs) > 0)
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{ $log->id }}</td>
                                    <td>{{ $log->log_name }}</td>
                                    <td>{{ $log->description }}</td>
                                    <td>{{ $log->causer_id }}</td>
                                    <td>{{ $log->causer_type }}</td>
                                    <td>{{ $log->properties }}</td>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->updated_at }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" align="center">ไม่มีข้อมูลประวัติการใช้งาน</td>
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