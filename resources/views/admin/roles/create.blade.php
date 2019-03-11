@extends('layouts.main')
@section('title','Edit User')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong>เพิ่มระดับผู้ใช้</strong>
                </div>
                <div class="card-body">
                    {!! Form::open(['url' => 'admin/roles']) !!}
                    <div class="form-group">
                        {!! Form::label('name','ชื่อระดับผู้ใช้งาน') !!}
                        {!! Form::text('name',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('title','ชื่อที่ใช้แสดง') !!}
                        {!! Form::text('title',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('abilities', 'สิทธิ์การใช้งาน', ['class' => 'control-label']) !!}
                        {!! Form::select('abilities[]', $abilities, old('abilities'), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('เพิ่มข้อมูล',['class'=>'btn btn-primary']) !!}
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
