@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")

    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="border-bottom pb-2 mb-3">
                        <h3 class="d-inline-block">Danh sách hồ sơ ứng tuyển</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="wrapper-search-candidate">
                        <form method="get" action="{{ route("recruiment.listCVSubmit")}}">
                            <div class="inner-form">
                                <div class="input-field first-wrap">
                                    <div class="svg-wrapper">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                                        </svg>
                                    </div>
                                    <input id="search" name="textSearch" type="text" placeholder="Tên bài tuyển dụng tìm kiếm ?" />
                                </div>
                                <div class="input-field second-wrap">
                                    <button class="btn-search" type="submit">Tìm kiếm</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th class="text-center">Bài đăng</th>
                            <th class="text-center">Thông tin người ứng tuyển</th>
                            <th class="text-center">Xem CV</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listCV as $cv)
                            <tr class="text-center">
                                <td>{{ $cv->post->titlePost }}</td>
                                <td class="text-left">
                                    <div class="m-1">
                                        <b class="mr-2">Tên:</b> {{ $cv->name }}
                                    </div>
                                    <div class="m-1">
                                        <b class="mr-2">Email :</b><span class="text-dark">{{ $cv->email }}</span>
                                    </div>
                                    <div class="m-1">
                                        <b class="mr-2">Số điện thoại :</b><span class="text-dark">{{ $cv->telephone }}</span>
                                    </div>
                                </td>
                                <td>
                                    <a style="cursor: pointer" data-toggle="modal" data-target="#cvModal_{{$cv->id}}" class="text-light text-decoration-none badge badge-info"><i class="fas fa-eye"></i>Xem Cv</a>
                                    <div  class="modal" id="cvModal_{{$cv->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content"  style="width: 1200px;left: -190px;">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Bạn đang xem cv của ứng viên</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    @if($cv->cv)
                                                        <iframe style="width: 1000px" height="500px" src="{{$cv->cv }}">
                                                        </iframe>
                                                    @else
                                                        <div>Chưa cập nhật</div>
                                                    @endif

                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @foreach($CheckData->acceptCvStatus as $item)
                                        @if( array_key_exists($cv->active ,$item))
                                    <span  class="text-light badge {{$item['class']}} text-decoration-none ">{{ $item[$cv->active] }}</span>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#acceptModal_{{$cv->id}}" class="btn btn-success text-white text-decoration-none" ><i class="fas fa-check"></i>Phê duyệt</a>
                                    <div  class="modal" id="acceptModal_{{$cv->id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content"  style="width: 600px;left: 135px;">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Phê duyệt bài ứng tuyển của ứng viên</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                            <form method="post" action="{{ route("CvSubmit.acceptCV") }}">
                                                @csrf
                                                <div class="modal-body flex">
                                                    @if($cv->active == 1)
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" checked name="active" id="inlineRadio2" value="1">
                                                        <label class="form-check-label" for="inlineRadio2">Chấp nhận</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="0">
                                                        <label class="form-check-label" for="inlineRadio2">Từ chối</label>
                                                    </div>
                                                    @else
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="1">
                                                            <label class="form-check-label" for="inlineRadio2">Chấp nhận</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" checked name="active" id="inlineRadio2" value="0">
                                                            <label class="form-check-label" for="inlineRadio2">Từ chối</label>
                                                        </div>
                                                    @endif
                                                    <input type="hidden" name="idCV" value="{{ $cv->id }}">
                                                </div>

                                                <!-- Modal body -->


                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info">Duyệt</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger text-white text-decoration-none" href="{{route("recruiment.deleteCVSubmit",["id"=>$cv->id])}}" onclick="return confirm('Bạn có chắc là muốn xóa không ?')"><i class="fas fa-trash"></i>xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3 ">
                    <div class="float-right">
                        {{$listCV->links()}}
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
@push("custom-scripts")
    @if(Session::has("messDeleteCvSubmit"))
        <script>
            toastr.success("{!! Session::get("messDeleteCvSubmit") !!}");
        </script>
    @endif
    @if(Session::has("messDeleteFailCvSubmit"))
        <script>
            toastr.error("{!! Session::get("messDeleteFailCvSubmit") !!}");
        </script>
    @endif
    @if(Session::has("messAcceptCVsuccess"))
        <script>
            toastr.success("{!! Session::get("messAcceptCVsuccess") !!}");
        </script>
    @endif
    @if(Session::has("messAcceptCVerr"))
        <script>
            toastr.error("{!! Session::get("messAcceptCVerr") !!}");
        </script>
    @endif
@endpush
