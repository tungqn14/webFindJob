@extends("frontend.layouts.master")
@section("main")
    <main>
        <article style="margin-top: 10%;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3">
                        <div class="h-100 p-3 text-center" style="background-color: #0091ce;">
                            <div class="img-form mb-4">
                                <img src="{{ asset("frontend/image/bg-dangki-uv-in.png") }}" alt="">
                            </div>
                            <div class="sub-text text-left">
                                <ul class="list-unstyled fs-14 lh-28 text-white">
                                    <li><i class="fas fa-check pr-2"></i>Công việc được cập nhật thường xuyên</li>
                                    <li><i class="fas fa-check pr-2"></i>Ứng tuyển công việc yêu thích HOÀN TOÀN MIỄN PHÍ</li>
                                    <li><i class="fas fa-check pr-2"></i>Hiển thị thông tin hồ sơ với nhà tuyển dụng hàng đầu</li>
                                    <li><i class="fas fa-check pr-2"></i>Nhận bản tin công việc phù hợp định kỳ</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-9 col-lg-9">
                        <div class="h-100 bg-white p-3">
                            <h3 class="mb-5 text-center">Đăng ký nhà tuyển dụng</h3>
                            <form  action="{{ route("register.storeRecruiment") }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Email</label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('email'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('email') }}</i>
                                            </p>
                                        @endif
                                        <input type="email" class="form-control" name="email" value="{{ old("email") ?? "" }}" placeholder="Nhập email của bạn">

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
                                        <input type="password" class="form-control" name="password" value="{{ old("password") ?? "" }}"  placeholder="Nhập mật khẩu của bạn">
                                        <div style="font-size: 12px;color: gray;" class="mt-2">
                                            Mật khẩu tối thiểu 6 ký tự.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Tên nhà tuyển dụng<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('fullName'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('fullName') }}</i>
                                            </p>
                                        @endif
                                        <input type="text" class="form-control" name="fullName" value="{{ old("fullName") ?? ""  }}" placeholder="Họ và tên">
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
                                        <input type="number" maxlength="11" class="form-control" value="{{ old("telephone") ?? ""  }}" name="telephone" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Tên công ty<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('nameCompany'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('nameCompany') }}</i>
                                            </p>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old("nameCompany") ?? ""  }}" name="nameCompany" placeholder="Tên công ty">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Website công ty<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('site'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('site') }}</i>
                                            </p>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old("site") ?? ""  }}" name="site" placeholder="https://google.com.vn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Địa chỉ trụ sở công ty<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                        @if ($errors->has('wards'))
                                            <p class="error">
                                                <i style="color: red;font-style: italic">(*){{ $errors->first('wards') }}</i>
                                            </p>
                                        @endif
                                        <input type="text" class="form-control" value="{{ old("wards") ?? ""  }}" name="wards" placeholder="Địa chỉ">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-12 col-lg-3 col-form-label">Tỉnh thành phố<span class="ml-2" style="color: red;">(*)</span></label>
                                    <div class="col-sm-12 col-lg-9">
                                            <select class="form-control" name="city" id="locationRegister">
                                                @foreach($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name  }}</option>
                                                @endforeach
                                            </select>
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
    <script>
        $("#locationRegister").select2();
    </script>
    @if(Session::has("messageRegisterAccountError"))
        <script>
            toastr.error("{!! Session::get("messageRegisterAccountError") !!}");
        </script>
    @endif
@endpush
