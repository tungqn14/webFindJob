@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Quản lý bài viết</h1>
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
                        <a href="{{route("blog.show")}}" class="btn btn-info text-white"><i class="fas fa-plus-circle mr-1"></i>Thêm mới</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nội dung</th>
                                <th class="text-center">Active</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                <tr>
                                    <th style="width: 3%">{{$blog->id}}</th>
                                    <td style="width: 60%">
                                        <h4>
                                            {{ $blog->titleBlogs }}
                                        </h4>
                                        <p>
                                            {!! $blog->description !!}
                                        </p>
                                    </td>
                                    <td style="width: 7%" class="text-center">
                                        <span class="badge {{ $blog->active == 0 ? "badge-danger" : "badge-info"}}" >{{ $blog->active == 0 ? "Ẩn" : "Hiển thị" }}</span>
                                    </td>
                                    <td style="width: 30%">
                                        <a data-toggle="modal" data-target="#myModal_{{$blog->id}}"  class="btn btn-warning"><i class="fas fa-eye mr-1"></i>Xem</a>
                                        <div class="modal" id="myModal_{{$blog->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="width: 1100px;left: -300px">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Chi tiết bài viết</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <div class="my-3" style="width: 600px;height: 100px;margin: 0 auto">
                                                            <img style="object-fit: cover;width: 100%;height: 100%" src="{{ asset("frontend/image-blog/".$blog->images) }}" alt="">
                                                        </div>
                                                       <h2>{{$blog->titleBlogs}}</h2>
                                                      <div class="my-3">
                                                          {!! $blog->description !!}
                                                      </div>
                                                        <div>
                                                            {!! $blog->content !!}
                                                        </div>
                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route("blog.edit",["id" => $blog->id ]) }}" onclick="return confirm('Bạn có chắc là muốn sửa ?')"
                                           class="btn btn-warning"><i class="fas fa-pencil-alt mr-1"></i>Sửa</a>
                                        <a href="{{route("blog.delete",["id" => $blog->id ]) }}"
                                           onclick="return confirm('Bạn có chắc là muốn xóa ?')"
                                           class="btn btn-danger"><i class="fas fa-trash mr-1"></i>Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-right">
                        {{$blogs->links()}}
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
