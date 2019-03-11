@extends('layouts.guest')
@section('title','Travel Muangkaen')

@section('content')

    <br>

    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                    <p align="center"><img src="{{ asset("uploads/profiles/".$user->avatar) }}" alt="" height="150" width="150"></p>
                    <br>
                    <p align="center">{{ $user->name }}</p>
                    <p><b>อีเมล : </b>{{ $user->email }}</p>
                    <p><b>ระดับผู้ใช้งาน : </b>   @foreach ($user->roles->pluck('title') as $role)
                            {{ $role }}
                        @endforeach
                    </p>
                    <p><b>วันที่สมัครสมาชิก :</b> {{ $user->created_at }}</p>

                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($user,['id' => 'userEdit','method' => 'PATCH','files' => true,'action' => ['UserProfileController@update',$user->id]]) !!}
                    <div class="form-group">
                        {!! Form::label('firstname','ชื่อ') !!}
                        {!! Form::text('firstname',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('lastname','นามสกุล') !!}
                        {!! Form::text('lastname',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('birthday','วันเกิด') !!}
                        {!! Form::text('birthday',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('gender','เพศ') !!}
                        {!! Form::text('gender',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('address','ที่อยู่') !!}
                        {!! Form::text('address',null,['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('tel','เบอร์โทร') !!}
                        {!! Form::text('tel',null,['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group" align="center">
                        {!! Form::submit('อัพเดตข้อมูล',['class'=>'btn btn-primary']) !!}
                    </div>

                </div>

            </div>
            <p align="center">

            </p>
        </div>

    </div>

    <div class="row">

    </div>



    @push('scripts')


    @endpush


@endsection