<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ระบบสารสนเทศภูมิศาสตร์แสดงข้อมูลการท่องเที่ยวและข้อมูลภูมิปัญญาท้องถิ่น ในพื้นที่เทศบาลเมืองเมืองแกนพัฒนา อำเภอแม่แตง จังหวัดเชียงใหม่</title>

    <!-- Icons -->
    <link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mb-0">
                <div class="card p-4">
                    <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <h1>เข้าสู่ระบบ</h1>
                            <p class="text-muted">เข้าสู่ระบบด้วยบัญชีอีเมล์ของคุณ</p>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                            </div>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                                <input id="password" type="password" name="password" class="form-control" required>


                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">เข้าสู่ระบบ</button>
                                </div>
                                <div class="col-6">
                                    <a href="{{ url('/redirect') }}" class="btn btn-block btn-facebook" type="button">
                                        <span>Facebook</span>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>สมัครสมาชิก</h2>
                            <p>สมัครสมาชิกสำหรับบผู้ที่ต้องการเเพิ่มข้อมูลสถานที่ท่องเที่ยวและภูมิปัญญาท้องถิ่น</p>
                            <a class="btn btn-primary active mt-3" href="{{ url('/register') }}">สมัครตอนนี้</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('node_modules/pace-progress/pace.min.js') }}"></script>



</body>

</html>