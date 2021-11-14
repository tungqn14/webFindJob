@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="mt-3 border-bottom pb-3 mb-3">
                        <h3 class="">Tất cả ứng viên</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wrapper-search-candidate">
                        <form method="get" action="{{ route("recruiment.listCandidate")}}">
                            <div class="inner-form">
                                <div class="input-field first-wrap">
                                    <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                        </svg>
                                    </div>
                                    <input id="search" name="txtSearch" type="text" placeholder="Bạn muốn tìm ứng viên nào ?" />
                                </div>
                                <div class="input-field second-wrap">
                                    <button class="btn-search" type="submit">Tìm kiếm</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wrapper-search-candidate">
                        @foreach($candidates as $candidate)

                        <div class="block-profile d-flex border-bottom pb-3 pt-3">
                            <div class="left-img text-center" style="width: 20%">
                                <img width="120px" height="160px" src="{{ $candidate['avatar'] ? asset("frontend/image-profile/".$candidate['avatar']) : asset("frontend/avatar_120x160.png") }}" alt="">
                            </div>
                            <div class="mid-inf" style="width:60%">
                                <div class="text-blue">
                                    <h5 style="color: #007bff;text-transform: uppercase">{{ $candidate['fullName'] ?  $candidate['fullName'] : "chưa cập nhật" }}</h5>
                                </div>
                                @if($candidate['rankUser'])
                                    <p class="p-0 m-0">{{ array_key_exists($candidate['rankUser'],$CheckData->typeRank[0]) ? $CheckData->typeRank[0][$candidate['rankUser']] : "" }}</p>
                                @else
                                    <p class="p-0 m-0">Cập nhật</p>
                                @endif
                                <p class="p-0 m-0"><span class="mr-1 text-muted">Chuyên môn:</span>{{$candidate['position'] ?  $candidate['position'] : "chưa cập nhật" }}</p>
                                <p class="p-0 m-0"><span class="mr-1 text-muted">Năm kinh nghiệm:</span>{{ $candidate['exp'] ?  $candidate['exp'] : "chưa cập nhật" }} năm</p>
                                <p class="p-0 m-0"><span class="mr-1 text-muted">Lương mong muốn:</span>{{ $candidate['desiredMoney'] ? number_format($candidate['desiredMoney'], 0, '', ',') : "chưa cập nhật" }}</p>

                            </div>
                            <div class="right-btn" style="width: 20%">
                                <a href="{{ route("ManageCandidate.detailProfile",["id"=>$candidate["id"]]) }}" class="btn btn-outline-primary"> <i class="fa fa-eye mr-2"></i>Xem chi tiết</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3 ">
                    <div class="float-right">
                        {{$candidates->links()}}
                    </div>

                </div>
            </div>
        </div>

    </main>
@endsection
