@extends('layouts.main')
@section('title','สถานที่ท่องเที่ยว')
@section('content')
    <br>
    <p>
        <a href="{{ url('member/places/create') }}" class="btn btn-success">เพิ่มสถานที่ท่องเที่ยว</a>
    </p>
    <div class="row">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <strong><img src="/icon/places.png"> รายการสถานที่ท่องเที่ยวที่เพิ่ม</strong>
                </div>
                <div class="card-body">
                    <table id="placetable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ชื่อสถานที่ท่องเที่ยวภาษาไทย</th>
                            <th>ชื่อสถานที่ท่องเที่ยวภาษาอังกฤษ</th>
                            <th>สถานะ</th>
                            <th>ผู้เข้าชม</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($places) > 0)
                            @foreach ($places as $place)
                                <tr>
                                    <td>{{ $place->place_name_th }}</td>
                                    <td>{{ $place->place_name_eng }}</td>
                                    <td>
                                        @if($place->place_status === 1)
                                            ตรวจสอบแล้ว
                                        @else
                                            รอการตรวจสอบ
                                        @endif
                                    </td>
                                    <td>{{ $place->place_reader }}</td>
                                    <td>
                                        <a class="btn btn-success" href="{{ url("member/places/{$place->place_id}") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="ดูข้อมูล"><i class="fa fa-eye"></i></a>
                                        <a class="btn btn-success" href="{{ url("member/placephotos/create/{$place->place_id}") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="จัดการรูปภาพ"><i class="fa fa-picture-o"></i></a>
                                        <a class="btn btn-primary" href="{{ url("member/places/{$place->place_id}/edit") }}" role="button" data-toggle="tooltip" data-placement="bottom" title="แก้ไข"><i class="fa fa-edit"></i></a>

                                        {!! Form::open(['method' => 'DELETE','style'=>'display:inline-block','action' => ['Member\PlaceController@destroy',$place->place_id]]) !!}

                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="fa fa-trash-o"></i></button>

                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">ไม่มีข้อมูลสถานที่ท่องเที่ยวที่เพิ่ม</td>
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
                $('#placetable').DataTable();
                $('[data-toggle="tooltip"]').tooltip();
            })
        </script>
    @endpush
@endsection