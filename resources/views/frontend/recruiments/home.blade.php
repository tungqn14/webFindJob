@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="border-bottom pb-2 mb-3">
                        <h3 class="d-inline-block">Chào mừng bạn đến với trang quản lý của nhà tuyển dụng</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="block-infor-company p-5 mt-3">
                        <h4 class="border-bottom pb-3 mb-3">Thông tin nhà tuyển dụng</h4>
                        <div class="border-bottom mb-2 d-flex  justify-content-lg-around pb-4">
                            <div style="width: 20%">
                                <img width="100%" height="160px" src="{{ $company['logo'] }}" alt="">
                            </div>
                            <div style="width: 70%">
                                <div><b class="mr-2">Họ và tên:</b> {{ $user->fullName }} </div>
                                <div><b class="mr-2">Email:</b> {{ $user->email }}</div>
                                <div class="mb-4"> <b class="mr-2">Số điện thoại:</b> {{ $user->phone }}</div>
                            </div>

                        </div>
                        <h4 class="border-bottom pb-3 mb-3">Thông tin công ty</h4>
                        <div class="my-2"> <b class="mr-2">Tên công ty:</b>{{ $company['nameCompany'] }} </div>
                        <div class="my-2"> <b class="mr-2">Tổng số nhân viên:</b>
                            {{ array_key_exists($company['scale'] ,$CheckData->scale[0]) ? $CheckData->scale[0][$company['scale'] ] : "cập nhật" }}
                        </div>
                        <div class="my-2"> <b class="mr-2">Lĩnh vực hoạt động:</b>
                            @if(empty($company['career_id']))
                                <span class="p-1 mx-2" > Cập nhật ngay... </span>
                            @else
                                <?php $arrCareer =  collect(array_map('intval', json_decode($company['career_id'])))  ?>
                                @foreach($careers as $career)
                                    @if($arrCareer->contains($career->id))
                                        <span style="font-size: 13px;" class="p-1 mx-2 border" >{{ $career->name_career}} </span>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="my-2">  <b class="mr-2">Địa chỉ:</b> {{$user->address }}</div>
                        <div class="my-2"> <b class="mr-2">Website:</b>{{ $company['website'] }}</div>
                        <div class="my-2">
                            <div class="mr-2"><b>Phúc lợi công ty:</b></div>
                            <div style="flex-flow: wrap" class="d-flex">
                                @if(empty($company['welfare_id']))
                                    <span style="width: 200px" class="mx-3 p-2">
                                                    Cập nhật ngay...
                                    </span>
                                @else
                                    <?php $arrWelfare =  collect(array_map('intval', json_decode($company['welfare_id']))) ?>
                                    @foreach($welfares as $welfare)
                                        @if($arrWelfare->contains($welfare->id))
                                            <span style="width: 200px" class="mx-3 p-2">
                                                    <i class="{{ $welfare->icon_welfare  }} mx-2"></i>{{ $welfare->name_welfare  }}
                                            </span>
                                        @endif

                                    @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="my-2">
                            <b class="mr-2">Giới  thiệu về công ty:</b>
                            <div class="mt-2">
                                {!! $company['aboutCompany'] !!}
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </main>
@endsection
