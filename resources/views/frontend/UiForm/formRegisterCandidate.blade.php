@extends("frontend.layouts.master")
@section("main")
    <main>
        <article style="margin-top: 10%;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-4 col-lg-4">
                        <div class="h-100 p-3 text-center" style="background-color: #0091ce;">
                            <div class="img-form mb-4">
                                <img src="{{asset("frontend/image/bg-dangki-uv-in.png")}}" alt="">
                            </div>
                            <div class="sub-text text-left">
                                <ul class="list-unstyled fs-14 lh-28 text-white">
                                    <li><i class="fas fa-check pr-2"></i>Tiếp cận hàng triệu công việc hoàn toàn miễn phí</li>
                                    <li><i class="fas fa-check pr-2"></i>Ứng tuyển nhanh chóng, dễ dàng</li>
                                    <li><i class="fas fa-check pr-2"></i>Nhận bản tin công việc phù hợp định kỳ</li>
                                    <li><i class="fas fa-check pr-2"></i>Nâng cao cơ hội tìm việc với chương trình ứng viên năng động</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-8 col-lg-8">
                        <div class="h-100 bg-white p-5">
                            <h3 class="mb-5 text-center">Đăng ký ứng viên</h3>
                            <form action="{{ route("register.storeCandidate") }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Họ và tên<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('fullName'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('fullName') }}</i>
                                            </p>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old("fullName") ?? "" }}" name="fullName" placeholder="Nhập Họ và tên">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Email</label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('email'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('email') }}</i>
                                            </p>
                                        @endif
                                        <input type="email" class="form-control" value="{{ old("email") ?? "" }}" name="email" placeholder="Nhập email của bạn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Mật khẩu</label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('password'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('password') }}</i>
                                            </p>
                                        @endif
                                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu của bạn">
                                        <div style="font-size: 12px;color: gray;" class="mt-2">
                                            Mật khẩu tối thiểu 6 ký tự.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">SĐT liên hệ<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('telephone'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('telephone') }}</i>
                                            </p>
                                        @endif
                                        <input type="number" class="form-control" value="{{ old("telephone") ?? "" }}" name="telephone" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row d-block text-center">
                                    <button type="submit" class="btn btn-primary text-uppercase" >Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </article>


    </main>
@endsection
@push("custom-scripts")
@if(Session::has("messageRegisterAccountError"))
    <script>
        toastr.error("{!! Session::get("messageRegisterAccountError") !!}");
    </script>
@endif
@endpush
