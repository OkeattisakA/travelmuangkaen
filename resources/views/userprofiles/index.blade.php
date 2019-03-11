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
                            <p><b>ชื่อ : </b>{{ $user->firstname }}</p>
                            <p><b>นามสกุล : </b>{{ $user->lastname }}</p>
                            <p><b>วันเกิด : </b>{{ $user->birthday }}</p>
                            <p><b>เพศ : </b>{{ $user->gender }}</p>
                            <p><b>ที่อยู่ : </b>{{ $user->address }}</p>
                            <p><b>เบอร์โทร : </b>{{ $user->tel }}</p>
                            </div>

                        </div>
                        <p align="center">
                            <a href="{{ url("userprofiles/{$user->id}/edit") }}" class="btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
                        </p>
                    </div>

                </div>

    <div class="row">

    </div>



    @push('scripts')


    @endpush


@endsection