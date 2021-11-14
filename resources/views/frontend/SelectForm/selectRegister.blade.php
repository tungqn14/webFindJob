@extends("frontend.SelectForm.master")
@section('imgForm1')
    <img src="{{ asset("frontend/image/dangky-uv-ct.png") }}" alt="">
@endsection
@section('linkForm1')
    <a href="{{ route("register.formCandidate") }}" class="btn btn-primary text-uppercase d-flex justify-content-center link-form-register mb-3 text-center">Đăng Ký Ứng Viên</a>
@endsection
@section('imgForm2')
    <img src="{{ asset("frontend/image/dangky-ntd-ct.png") }}" alt="">
@endsection
@section('linkForm2')
    <a href="{{ route("register.formRecruiment") }}" class="btn btn-light text-uppercase d-flex justify-content-center link-form-register mb-3 text-center">Đăng Ký nhà tuyển dụng</a>
@endsection
