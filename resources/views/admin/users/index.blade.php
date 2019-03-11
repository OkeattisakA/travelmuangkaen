@extends('layouts.main')
@section('title','รายการผู้ใช้งาน')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/users.png"> รายการผู้ใช้งาน</strong>
                </div>
                <div class="card-block">
                    <table id="usertable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ยูสเซอร์เนม</th>
                            <th>อีเมล</th>
                            <th>ระดับผู้ใช้งาน</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($user->roles->pluck('title') as $role)
                                            {{ $role }}
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="{{ url("admin/users/{$user->id}/edit") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="แก้ไช"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-danger" href="#" role="button" data-toggle="tooltip" data-placement="bottom" title="ลบ"><i class="fa fa-trash-o"></i></a>
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
                $('#usertable').DataTable();
            })
        </script>
    @endpush

@endsection