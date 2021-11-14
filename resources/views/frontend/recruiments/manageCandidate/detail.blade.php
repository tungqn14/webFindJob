@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pb-2 mb-3">
                        <div>
                            <span class="font-weight-bold mr-2 text-uppercase">Chức danh / Vị trí :</span>
                            <span class="font-weight-bold" style="color:#007db2">{{$user->position}} ({{ array_key_exists($user->rankUser,$CheckData->typeRank[0]) ? $CheckData->typeRank[0][$user->rankUser] : "" }} )</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="wrap d-flex justify-content-around">
                        <div class="info-left-img-candidate" >
                            <div style="width: 120px; height: 160px; margin: 0 auto;">
                                <img class="w-100 h-100" src="{{ $user->avatar ? asset("frontend/image-profile/".$user->avatar) : asset("frontend/avatar_120x160.png") }}" alt="">
                            </div>
                        </div>
                        <div class="info-right-img-candidate">
                            <ul class="list-unstyled">
                                <li class="d-flex">
                                    <div><b>Ứng viên:</b></div>
                                    <div class="text-primary font-weight-bold ml-3">{{ $user->fullName }}</div>
                                </li>
                                <li class="d-flex">
                                    <div><b>Ngày sinh:</b></div>
                                    <div class="text-dark ml-3">{{ $user->birthDay }}</div>
                                </li>
                                <li class="d-flex">
                                    <div><b>Số điện thoại:</b></div>
                                    <div class="text-dark ml-3">{{ $user->phone }}</div>
                                </li>
                                <li class="d-flex">
                                    <div><b>Giới tính:</b></div>
                                    <div class="text-dark ml-3">{{ array_key_exists($user->gender,$CheckData->typeGender[0]) ? $CheckData->typeGender[0][$user->gender] : "" }}</div>
                                </li>
                                <li class="d-flex">
                                    <div><b>Tỉnh/Thành Phố:</b></div>
                                    <div class="text-dark ml-3">{{ $user->address }}</div>
                                </li>
                                <li class="d-flex">
                                    <div><b>Liên hệ ngay:</b></div>
                                    <div class="text-dark ml-3">
                                        <a class="btn btn-info" href="mailto: {{$user->email}}">{{$user->email}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="mb-3 mt-5 py-2 text-dark" style="background-color: #f1f9ff;"> Thông tin nghề nghiệp</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="">
                        <div style="font-size: 18px;">
                            <div class="d-flex">
                                <div><b>Năm kinh nghiệm::</b></div>
                                <div class="text-dark ml-3">{{ $user->exp }} năm</div>
                            </div>
                            <div class="d-flex">
                                <div><b>Cấp bậc :</b></div>
                                @if($user->rankUser)
                                    <div class="text-dark ml-3">{{ array_key_exists($user->rankUser,$CheckData->typeRank[0]) ? $CheckData->typeRank[0][$user->rankUser] : "" }}</div>
                                @else
                                    <div class="text-dark ml-3">Cập nhật</div>
                                @endif
                            </div>
                        </div>
                        <div style="font-size: 18px;">
                            <div class="d-flex">
                                <div><b>Mức lương mong muốn:</b></div>
                                <div class="text-dark ml-3">{{ number_format($user->desiredMoney, 0, '', ',') }} </div>
                            </div>
                            <div class="d-flex">
                                <div><b>Hình thức:</b></div>
                                @if($user->typeTimeUser)
                                    <div class="text-dark ml-3">{{ array_key_exists($user->typeTimeUser,$CheckData->typeTime[0]) ? $CheckData->typeTime[0][$user->typeTimeUser] : "" }}</div>
                                @else
                                    <div class="text-dark ml-3">Cập nhật</div>
                                @endif
                            </div>
                            <div class="d-flex">
                                <div class="mr-2"><b>Giới thiệu bản thân:</b></div>
                                <div class="text-dark ml-3 ">{!! $user->descripYourself ?  $user->descripYourself : "(Cập nhật)" !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4 class="my-5 py-2 text-dark" style="background-color: #f1f9ff;"> Nội dung hồ sơ</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="text-center">
                        @if($user->cv)
                            <iframe src="{{ $user->cv ?  asset("frontend/file-cv/". $user->cv) : "" }}" style="margin:0 auto" width="80%" height="800px">
                            </iframe>
                        @else
                            <div class="text-center">Chưa cập nhật</div>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
