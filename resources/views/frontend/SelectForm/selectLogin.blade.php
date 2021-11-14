@extends("frontend.SelectForm.master")
@section('imgForm1')
    <img src="{{ asset("frontend/image/dangnhap-uv-ct.png") }}" alt="">
@endsection
@section('linkForm1')
    <a href="{{ route("login.formCandidate") }}" class="btn btn-primary text-uppercase d-flex justify-content-center link-form-register mb-3 text-center">Đăng Nhập Ứng Viên</a>
@endsection
@section('imgForm2')
    <img src="{{ asset("frontend/image/dangnhap-ntd-ct.png") }}" alt="">
@endsection
@section('linkForm2')
    <a href="{{ route("login.formRecruiment") }}" class="btn btn-light text-uppercase d-flex justify-content-center link-form-register mb-3 text-center">Đăng Nhập nhà tuyển dụng</a>
@endsection
