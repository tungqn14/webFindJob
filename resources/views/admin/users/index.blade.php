@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Quản lý danh sách các tài khoản của người dùng</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Thông tin người dùng</th>
                                <th class="text-center">Thuộc</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <th>
                                        {{   $user->id }}
                                    </th>
                                    <td class="text-center">
                                       <p><b>Tên đầy đủ: </b>{{  $user->fullName }}</p>
                                       <p><b>Email: </b>{{  $user->email }}</p>
                                       <p><b>Điện thoại: </b>{{  $user->phone }}</p>
                                    </td>
                                    <th class="text-center">{!!  $user->user_level == 1 ? "<span class='badge badge-warning'>Nhà tuyển dụng</span>" : "<span class='badge badge-info'>Ứng viên</span>" !!}</th>
                                    <td  class="text-center">
                                        <a href="{{ route("users.delete",["id"=>$user->id]) }}" onclick="return confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        {{ $users->links() }}
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
