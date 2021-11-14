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
                    <table class="table mt-3">
                        <thead>
                        <tr>
                            <th class="text-center">Bài đăng</th>
                            <th class="text-center">Thông tin người ứng tuyển</th>
                            <th class="text-center">Xem CV</th>
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
                                                        <iframe style="width: 1000px" height="500px" src="{{ asset("frontend/file-cv/".$cv->cv) }}">
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
                                    <a class="text-dark text-decoration-none" href="{{route("recruiment.deleteCVSubmit",["id"=>$cv->id])}}" onclick="return confirm('Bạn có chắc là muốn xóa không ?')"><i class="fas fa-trash"></i>Xóa</a>
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
@endpush
