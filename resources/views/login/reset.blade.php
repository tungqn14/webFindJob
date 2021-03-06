<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset("admin/login_template/images/icons/favicon.ico") }}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/bootstrap/css/bootstrap.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/fonts/font-awesome-4.7.0/css/font-awesome.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/fonts/Linearicons-Free-v1.0.0/icon-font.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/animate/animate.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/css-hamburgers/hamburgers.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/animsition/css/animsition.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/select2/select2.min.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/vendor/daterangepicker/daterangepicker.css") }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/css/util.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/login_template/css/main.css") }}">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image:url({{ asset("admin/login_template/images/bg-01.jpg") }})">
					<span class="login100-form-title-1">
						?????t l???i m???t kh???u m???i
					</span>
            </div>
            @if(Session::has('messageSuccess'))
                <p style="text-align: center" class="alert alert-success">{{ Session::get('messageSuccess') }}</p>
            @endif
            @if(Session::has('message'))
                <p style="text-align: center" class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            @if(Session::has('error'))
                <p style="text-align: center" class="alert alert-danger">{{ Session::get('error') }}</p>
            @endif
            <form action="{{ route("reset-password") }}" method="post" class="login100-form validate-form">
                @csrf
                <input type="hidden" name="token" value="{{ $token ?? '' }}">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">

                    <span class="label-input100">Email</span>

                    <input class="input100" value="{{ old("email") }}" type="email" name="email" placeholder="Nh???p email">

                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('email'))
                    <div style="color: red;font-style: italic">{{ $errors->first('email') }}</div>
                @endif
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">M???t kh???u</span>
                    <input class="input100" type="password" value="{{ old("password") }}" name="password" placeholder="Nh???p m???t kh???u">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password'))
                    <div style="color: red;font-style: italic">{{ $errors->first('password') }}</div>
                @endif
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">X??c nh???n m???t kh???u</span>
                    <input class="input100" type="password" value="{{ old("password_confirmation") }}" name="password_confirmation" placeholder="Nh???p lai m???t kh???u">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password_confirmation'))
                    <div style="color: red;font-style: italic">{{ $errors->first('password_confirmation') }}</div>
                @endif
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        C???p nh???t
                    </button>
                    <a  href="{{ route("login.index") }}"  class="btn btn-default btn-comback-login">
                      Quay V??? ????ng Nh???p
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/jquery/jquery-3.2.1.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/animsition/js/animsition.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/bootstrap/js/popper.js") }}"></script>
<script src="{{ asset("admin/login_template/vendor/bootstrap/js/bootstrap.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/select2/select2.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/daterangepicker/moment.min.js") }}"></script>
<script src="{{ asset("admin/login_template/vendor/daterangepicker/daterangepicker.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/vendor/countdowntime/countdowntime.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/js/main.js") }}"></script>

</body>
</html>
