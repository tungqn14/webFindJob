@extends('frontend.layouts.master')
@section('main')
<main>
    <article class="wrapper-select-register">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card-candidate d-flex flex-column justify-content-around">
                        <div class="img-form">
                          @yield('imgForm1')
                        </div>
                        <div class="sub-text">
                            <ul class="list-unstyled fs-14 lh-28">
                                <li><i class="fas fa-check pr-2"></i>Công việc được cập nhật thường xuyên</li>
                                <li><i class="fas fa-check pr-2"></i>Ứng tuyển công việc yêu thích HOÀN TOÀN MIỄN PHÍ</li>
                                <li><i class="fas fa-check pr-2"></i>Hiển thị thông tin hồ sơ với nhà tuyển dụng hàng đầu</li>
                                <li><i class="fas fa-check pr-2"></i>Nhận bản tin công việc phù hợp định kỳ</li>
                            </ul>
                        </div>
                        @yield('linkForm1')
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="card-candidate card-recruiment d-flex flex-column justify-content-around">
                        <div class="img-form">
                            @yield('imgForm2')
                        </div>
                        <div class="sub-text">
                            <ul class="list-unstyled fs-14 lh-28">
                                <li><i class="fas fa-check pr-2"></i>Ứng viên sẵn sàng tiếp cận thông tin tuyển dụng</li>
                                <li><i class="fas fa-check pr-2"></i>Không giới hạn tương tác với ứng viên qua hệ thống nhắn tin nội bộ MIỄN PHÍ</li>
                                <li><i class="fas fa-check pr-2"></i>Quảng cáo thông minh giúp tin tuyển dụng được phủ rộng trên toàn bộ hệ thống</li>
                                <li><i class="fas fa-check pr-2"></i>Quảng cáo công ty trên Fanpage số 1 về việc làm – tuyển dụng</li>
                            </ul>
                        </div>
                        @yield('linkForm2')
                    </div>
                </div>
            </div>
        </div>
    </article>
</main>
@endsection
