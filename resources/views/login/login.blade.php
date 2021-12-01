<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V15</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/jqvmap/jqvmap.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("admin/dist/css/adminlte.min.css") }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/daterangepicker/daterangepicker.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("admin/plugins/summernote/summernote-bs4.min.css") }}">
    <!-- Fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
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
						Đăng Nhập
					</span>
            </div>
            @if(Session::has('message'))
                <p style="text-align: center" class="alert alert-danger">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route("handleLogin") }}" method="post" class="login100-form validate-form">
                @csrf
                <div class="wrap-input100 validate-input m-b-26" >
                    <span class="label-input100">Email</span>
                    <input class="input100" value="{{ old("email") }}" type="email" name="email" placeholder="Nhập email">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('email'))
                    <div class="mb-2" style="color: red;font-style: italic">{{ $errors->first('email') }}</div>
                @endif
                <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                    <span class="label-input100">Mật khẩu</span>
                    <input class="input100" type="password" value="{{ old("password") }}" name="password" placeholder="Nhập mật khẩu">
                    <span class="focus-input100"></span>
                </div>
                @if($errors->has('password'))
                    <div class="mb-2" style="color: red;font-style: italic">{{ $errors->first('password') }}</div>
                @endif
                <div class="flex-sb-m w-full p-b-30">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberMe">
                        <label class="label-checkbox100" for="ckb1">
                            Ghi nhớ mật khẩu
                        </label>
                    </div>

                    <div>
                        <a href="{{ route("forget.index") }}" class="txt1">
                            Quên mật khẩu?
                        </a>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Đăng nhập
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset("admin/plugins/jquery/jquery.min.js") }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset("admin/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- ChartJS -->
<script src="{{ asset("admin/plugins/chart.js/Chart.min.js") }}"></script>
<!-- Sparkline -->
<script src="{{ asset("admin/plugins/sparklines/sparkline.js") }}"></script>
<!-- JQVMap -->
<script src="{{ asset("admin/plugins/jqvmap/jquery.vmap.min.js") }}"></script>
<script src="{{ asset("admin/plugins/jqvmap/maps/jquery.vmap.usa.js") }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset("admin/plugins/jquery-knob/jquery.knob.min.js") }}"></script>
<!-- daterangepicker -->
<script src="{{ asset("admin/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("admin/plugins/daterangepicker/daterangepicker.js") }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset("admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js") }}"></script>
<!-- Summernote -->
<script src="{{ asset("admin/plugins/summernote/summernote-bs4.min.js") }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset("admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("admin/dist/js/adminlte.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("admin/dist/js/demo.js") }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset("admin/dist/js/pages/dashboard.js") }}"></script>
<script src="{{ asset("frontend/ckeditor/ckeditor.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
<!--===============================================================================================-->
<script src="{{ asset("admin/login_template/js/main.js") }}"></script>

</body>
</html>
