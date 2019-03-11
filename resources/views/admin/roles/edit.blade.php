@extends('layouts.main')
@section('title','Edit User')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>Edit User</strong>
                </div>
                <div class="card-body">
                    {!! Form::model($role,['method' => 'PATCH','action' => ['Admin\RoleController@update',$role->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('name','ชื่อระดับผู้ใช้งาน') !!}
                        {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title','ชื่อที่ใช้แสดง') !!}
                        {!! Form::text('title',old('title'),['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('abilities', 'สิทธิ์การใช้งาน', ['class' => 'control-label']) !!}
                        {!! Form::select('abilities[]', $abilities, old('abilities') ? old('abilities') : $role->getAbilities()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('อัพเดตข้อมูล',['class'=>'btn btn-primary']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
