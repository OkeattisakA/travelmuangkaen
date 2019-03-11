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
                    {!! Form::model($user,['method' => 'PATCH','action' => ['Admin\UserController@update',$user->id]]) !!}

                    <div class="form-group">
                        {!! Form::label('roles', 'Roles', ['class' => 'control-label']) !!}
                        {!! Form::select('roles[]', $roles, old('roles') ? old('role') : $user->roles()->pluck('name', 'name'),
                        ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!--/.col-->
    </div>
@endsection