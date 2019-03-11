@extends('layouts.main')
@section('title','ระดับผู้ใช้งาน')
@section('content')
    <br>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/roles.png"> รายการระดับผู้ใช้งาน</strong>
                </div>
                <div class="card-block">
                    <table id="roletable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ระดับผู้ใช้งาน</th>
                            <th>ชื่อที่ใช้แสดง</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($roles) > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->title }}</td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url("admin/roles/{$role->id}/edit") }}" role="button"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="#" role="button"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6">..</td>
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
                $('#roletable').DataTable();
            })
        </script>
    @endpush
@endsection