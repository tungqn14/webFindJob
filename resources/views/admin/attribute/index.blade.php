@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quản trị thuộc tính bài viết</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="mt-3">
                    <h4 class="bg-dark text-white p-2">Danh sách phúc lợi </h4>
                </div>
                <div class="card">
                    <div class="card-header text-right">
                        <button data-toggle="modal" data-target="#themPhucloi" class="btn btn-info text-white"><i class="fas fa-plus-circle mr-1"></i>Thêm mới</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Tên phúc lợi</th>
                                <th class="text-center">Icon</th>
                                <th class="text-center" style="width: 200px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($welfares as $welfare)
                                <tr>
                                    <th style="width: 10px">{{ $welfare['id'] }}</th>
                                    <td class="text-center">{{ $welfare['name_welfare'] }}</td>
                                    <td class="text-center"><i class="{{$welfare['icon_welfare']}}"></i> </td>
                                    <td>
                                        <a data-toggle="modal"
                                           data-id="{{ $welfare['id'] }}"
                                           data-url = "{{ route("welfare.edit",['id'=>$welfare['id']]) }}"
                                           data-target="#suaPhucloi{{$welfare['id']}}"
                                           class="btn btn-info btn-edit-welfare">
                                            <i class="fas fa-pen mr-1"></i>Sửa</a>
                                        <div class="modal fade" id="suaPhucloi{{$welfare['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật phúc lợi</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form >
                                                        <div class="modal-body">

                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên phúc lợi</label>
                                                                <div class="error_welfare_name{{$welfare['id']}}" style="color: red;font-style: italic" > </div>
                                                                <input type="text" class="form-control" id="welfare_name_update{{$welfare['id']}}" name="welfare_name"  placeholder="Gửi xe free">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">Icon phúc lợi</label>
                                                                <div class="error_welfare_icon{{$welfare['id']}}" style="color: red;font-style: italic" > </div>
                                                                <input type="text" class="form-control "  id="welfare_icon_update{{$welfare['id']}}"  name="welfare_icon" placeholder="fa fa-fa-icon">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button type="button"  data-id = "{{ $welfare['id']  }}" data-url ="{{ route("welfare.update",['id'=>$welfare['id']]) }}"  class="btn btn-primary btn_update_welfare">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route("welfare.delete",["id"=>$welfare['id']]) }}" onclick="return confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                       <div class="text-right">
                           {{ $welfares->links() }}
                       </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h4 class="bg-dark text-white p-2">Danh sách công nghệ </h4>
                </div>
                <div class="card">
                    <div class="card-header text-right">
                        <button data-toggle="modal" data-target="#themCongNGhe" class="btn btn-info text-light"><i class="fas fa-plus-circle  mr-1"></i>Thêm mới</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th class="text-center">Tên công nghệ</th>
                                <th class="text-center" style="width: 200px">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($techs as $tech)
                                <tr>
                                    <th >{{ $tech['id'] }}</th>
                                    <td class="text-center">{{ $tech['nameSkill'] }}</td>
                                    <td>
                                        <a data-toggle="modal"
                                           data-url="{{ route("skill.edit",["id"=>$tech['id']]) }}"
                                           data-id="{{$tech['id'] }}"
                                           data-target="#suaTech{{$tech['id']}}"
                                           class="btn btn-info btn-edit-tech">
                                            <i class="fas fa-pen mr-1"></i>Sửa</a>
                                        <div class="modal fade"  tabindex="-1"  role="dialog" id="suaTech{{ $tech['id'] }}" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Cập nhật công nghệ</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form >
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tên công nghệ</label>
                                                                <div class="error_tech" style="color: red;font-style: italic" > </div>
                                                                <input type="text" class="form-control" id="tech_name{{$tech['id']  }}" name="nameSkill" aria-describedby="emailHelp" placeholder="Php,Javascript">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                            <button  data-id = "{{ $tech['id']  }}"  data-url="{{  route("skill.update",['id'=>$tech['id']]) }}" type="button"  class="btn btn-primary btn_update_tech">Cập nhật</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route("skill.delete",["id"=>$tech['id']]) }}" onclick="return confirm('Bạn có chắc là muốn xóa ?')" class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <div class="text-right">
                            {{ $techs->links() }}
                        </div>
                    </div>
                </div>




            </div><!-- /.container-fluid -->
        </section>
        <!-- Modal Add Phuc loi -->
        <div class="modal fade" id="themPhucloi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới phúc lợi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formAddWelfare">
                    <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" id="urlAddWelfare" name="urlAddWelfare" value="{{  route("welfare.store") }}">
                                <label for="exampleInputEmail1">Tên phúc lợi</label>
                                    <div class="error_welfare_name" style="color: red;font-style: italic" > </div>

                                <input type="text" class="form-control" id="welfare_name" name="welfare_name"  placeholder="Gửi xe free">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Icon phúc lợi</label>
                                <div class="error_welfare_icon" style="color: red;font-style: italic" > </div>
                                <input type="text" class="form-control" id="welfare_icon" name="welfare_icon" placeholder="fa fa-fa-icon">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" id="btnAddWelfare" class="btn btn-primary">Thêm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Add Công nghệ-->
        <div class="modal fade" id="themCongNGhe" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm mới công nghệ</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formAddTech" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên công nghệ</label>
                            <div class="error_tech" style="color: red;font-style: italic" > </div>
                            <input type="text" class="form-control" id="tech_name" name="nameSkill" aria-describedby="emailHelp" placeholder="Php,Javascript">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button data-url="{{  route("skill.store") }}" type="button" id="btnAddTech"  class="btn btn-primary">Thêm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>



    </div>

@endsection
@push('custom-scripts')
    <script type="text/javascript" src="{{ asset ('admin/dist/js/custom-scripts.js') }}"></script>
@endpush

