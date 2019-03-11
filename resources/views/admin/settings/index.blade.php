@extends('layouts.main')
@section('title','Settings')
@section('content')
    <br>
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <strong><img src="/icon/settings.png"> ตั้งค่า</strong>
                </div>
                <div class="card-body">
                    {!! Form::model($setting,['method' => 'PATCH','action' => ['Admin\SettingController@update',$setting->setting_id]]) !!}
                    @include('admin.settings._form',['submitButtonText' => 'บันทึกการตั้งค่า'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
    <!--/.row-->
@endsection