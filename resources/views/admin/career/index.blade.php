@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Quản lý các lĩnh vực hoạt động của các công ty</h1>
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
                    <div class="card-header text-right">
                        <button data-toggle="modal" data-target="#themLinhVuc" class="btn btn-info text-white"><i class="fas fa-plus-circle mr-1"></i>Thêm mới</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên nghành nghề</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $menu)
                                <tr>
                                    <th >{{  $menu['id'] }}</th>
                                    <td class="text-center">{{ $menu['name_career'] }}</td>
                                    <td  class="text-center">
                                        <a data-toggle="modal"
                                           data-id="{{ $menu['id'] }}"
                                           data-url = "{{ route("career.edit",['id'=>$menu['id']]) }}"
                                           data-target="#suaNganhNghe{{$menu['id']}}"
                                           class="btn btn-info btn-edit-career">
                                            <i class="fas fa-pen mr-1"></i>Sửa</a>
                                        <div class="modal fade" id="suaNganhNghe{{$menu['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật ngành nghề</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form >
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label class="text-left" for="exampleInputEmail1">Tên nghành nghề</label>
                                                                <div class="text-left error_career_name" style="color: red;font-style: italic" > </div>
                                                                <input type="text" class="form-control" id="career_name_update{{$menu['id']}}" name="career_name"  placeholder="IT phần mềm">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button type="button"  data-id = "{{ $menu['id']  }}" data-url ="{{ route("career.update",['id'=>$menu['id']]) }}"  class="btn btn-primary btn_update_career">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route("career.delete",["id"=>$menu['id']]) }}" onclick="return confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        {{ $data->links() }}
                    </div>
                </div>


            </div>

        </section>
        <!-- /.content -->

    </div>
    <!-- Modal Add Phuc loi -->
    <div class="modal fade" id="themLinhVuc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới nghành nghề</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formAddCareer">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên nghành nghề</label>
                            <div class="error_career_name" style="color: red;font-style: italic" > </div>
                            <input type="text" class="form-control" id="career_name" name="career_name"  placeholder="IT phần mềm">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="btnAddCareer" data-url="{{  route("career.store") }} " class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('custom-scripts')
    <script type="text/javascript" src="{{ asset ('admin/dist/js/custom-scripts.js') }}"></script>
@endpush
