@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Quản lý danh sách công ty</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="mt-5">
                    <h4 class="bg-dark text-white p-2">Danh sách </h4>
                </div>
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">Xếp hạng</th>
                                <th class="text-center">Logo công ty</th>
                                <th class="text-center">Tên công ty</th>
                                <th class="text-center">Lượt yêu thích</th>
                                <th class="text-center">Cấp bậc</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($company as $item)
                                <tr>
                                    <td class="text-center">{{  $item->favorites_count }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset("frontend/image-recruiment-logo/".$item->logo) }}" width="200px" height="150px" alt="">
                                    </td>
                                    <td class="text-center">
                                        {{ $item->nameCompany }}
                                    </td>
                                    <td class="text-center">
                                        <i style="color: red" class="fas fa-heart mr-2"></i> {{ $item->favorites_count }} yêu thích
                                    </td>
                                    <td class="text-center">
                                        {!! $item->vip == 1 ? "<span class='badge badge-danger'>Vip</span>" : "<span class='badge badge-secondary'>Normal</span>"  !!}
                                    </td>
                                    <td>
{{--                                        <a--}}
{{--                                            data-toggle="modal"--}}
{{--                                           data-id="{{ $item->id }}"--}}
{{--                                           data-url = "{{ route("company.edit",['id'=>$item->id]) }}"--}}
{{--                                           data-target="#thanghang{{$item->id}}"--}}
{{--                                           class="btn btn-info btn-promotion">--}}
{{--                                            <i class="fas fa-plus"></i>Thăng hạng</a>--}}
{{--                                        <div class="modal fade" id="thanghang{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog" role="document">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">Thăng hạng công ty</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <span aria-hidden="true">&times;</span>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <form  id="frmThangHang">--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                    <div class="text-center ">--}}
{{--                                                        <div class="form-check form-check-inline mr-3">--}}
{{--                                                            <input class="form-check-input" type="radio" id="vip1" name="vip" value="1">--}}
{{--                                                            <label class="form-check-label" for="inlineRadio1"><span class='badge badge-danger'>Vip</span></label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-check form-check-inline">--}}
{{--                                                            <input class="form-check-input" type="radio" id="vip2" name="vip"  value="0">--}}
{{--                                                            <label class="form-check-label" for="inlineRadio2"><span class='badge badge-secondary'>Normal</span></label>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>--}}
{{--                                                            <button type="button"  data-id = "{{ $item->id  }}" data-url ="{{ route("company.promotion",['id'=>$item->id]) }}"  class="btn btn-primary btn_update_career">Cập nhật</button>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                        <a href="{{ route("company.delete",["id"=>$item->id]) }}" onclick="return confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        {{ $company->links() }}
                    </div>
                </div>
            </div>

        </section>

    </div>


@endsection
@push('custom-scripts')
    <script type="text/javascript" src="{{ asset ('admin/dist/js/custom-scripts.js') }}"></script>
@endpush
