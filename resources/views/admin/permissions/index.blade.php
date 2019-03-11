@extends('layouts.main')
@section('title','สิทธิ์การใช้งาน')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>รายการระดับผู้ใช้งาน</strong>
                </div>
                <div class="card-block">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>สิทธิ์การใช้งาน</th>
                            <th>ชื่อที่ใช้แสดง</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if (count($permissions) > 0)
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->title }}</td>
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
@endsection