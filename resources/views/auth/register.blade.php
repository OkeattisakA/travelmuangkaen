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
    <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <h1>สมัครสมาชิก</h1>
                    <p class="text-muted">สมัครสมาชิกสำหรับบผู้ที่ต้องการเเพิ่มข้อมูลสถานที่ท่องเที่ยวและภูมิปัญญาท้องถิ่น</p>

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-group mb-3{{ $errors->has('name') ? ' has-error' : '' }}">
                                <span class="input-group-addon"><i class="icon-user"></i>
                                </span>
                            <input id="name" name="name" type="text" class="form-control" placeholder="ชื่อ" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                            <span class="input-group-addon">@</span>
                            <input id="email" name="email" type="email" class="form-control" placeholder="อีเมล" value="{{ old('name') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-group mb-3">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                            <input id="password" name="password" type="password" class="form-control" placeholder="รหัสผ่าน" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i>
                                </span>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง" required>
                        </div>

                        <button type="submit" class="btn btn-block btn-success">สมัครสมาชิก</button>

                    </form>

                </div>
                <div class="card-footer p-4">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ url('/redirect') }}" class="btn btn-block btn-facebook" type="button">
                                <span>Facebook</span>
                            </a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('node_modules/pace-progress/pace.min.js') }}"></script>

</body>

</html>
