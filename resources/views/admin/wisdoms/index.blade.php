@extends('layouts.main')
@section('title','ภูมิปัญญาท้องถิ่น')
@section('content')
    <br>
    <p>
        <a href="{{ url('admin/wisdoms/create') }}" class="btn btn-success">เพิ่มภูมิปัญญาท้องถิ่น</a>
    </p>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/wisdoms.png"> รายการภูมิปัญญาท้องถิ่น</strong>
                </div>
                <div class="card-body">
                    <table id="wisdomtable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ชื่อภูมิปัญญาท้องถิ่นภาษาไทย</th>
                            <th>ชื่อภูมิปัญญาท้องถิ่นภาษาอังกฤษ</th>
                            <th>ผู้เผยแพร่</th>
                            <th>สถานะ</th>
                            <th>ผู้เข้าชม</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($wisdoms) > 0)
                            @foreach ($wisdoms as $wisdom)
                                <tr>
                                    <td>{{ $wisdom->wisdom_name_th }}</td>
                                    <td>{{ $wisdom->wisdom_name_eng }}</td>
                                    <td>{{ $wisdom->user->name }}</td>
                                    <td>
                                        @if($wisdom->wisdom_status === 1)
                                            ตรวจสอบแล้ว
                                        @else
                                            รอการตรวจสอบ
                                        @endif
                                    </td>
                                    <td>{{ $wisdom->wisdom_reader }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url("admin/wisdoms/{$wisdom->wisdom_id}") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="ดูข้อมูล"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success" href="{{ url("admin/wisdomphotos/create/{$wisdom->wisdom_id}") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="จัดการรูปภาพ"><i class="fa fa-picture-o"></i></a>
                                        <a class="btn btn-primary" href="{{ url("admin/wisdoms/{$wisdom->wisdom_id}/edit") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="แก้ไข"><i class="fa fa-edit"></i></a>

                                        {!! Form::open(['method' => 'DELETE','style'=>'display:inline-block','action' => ['Admin\WisdomController@destroy',$wisdom->wisdom_id]]) !!}

                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">ไม่มีข้อมูลภูมิปัญญาท้องถิ่น</td>
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
                $('#wisdomtable').DataTable();
                $('[data-toggle="tooltip"]').tooltip();
            })
        </script>
    @endpush
@endsection