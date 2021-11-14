
@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Thêm mới bài viết</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-info">
                            <form class="form-horizontal" action="{{ route("blog.store") }}" enctype="multipart/form-data" method="post">
                                <div class="card-body">
                                    <div class="form-group row">
                                        @csrf
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('titleBlog'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('titleBlog') }}</i>
                                                </p>
                                            @endif
                                            <input type="text" name="titleBlog" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('desBlog'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('desBlog') }}</i>
                                                </p>
                                            @endif
                                            <textarea class="form-control" name="desBlog" required id="desBlog" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nội dung</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('contentBlog'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('contentBlog') }}</i>
                                                </p>
                                            @endif
                                            <textarea name="contentBlog" required class="form-control" id="contentBlog" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('theme'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('theme') }}</i>
                                                </p>
                                            @endif
                                            <input name="theme" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-info" type="submit">Đăng bài</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>




            </div>

        </section>
        <!-- /.content -->

    </div>


@endsection
@push('custom-scripts')
    <script>
        CKEDITOR.replace( 'desBlog', {
            filebrowserBrowseUrl: '{{ asset("frontend/ckfinder/ckfinder.html") }}',
            filebrowserImageBrowseUrl: '{{ asset("frontend/ckfinder/ckfinder.html") }}',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
        });
        CKEDITOR.replace( 'contentBlog', {
            filebrowserBrowseUrl: '{{ asset("frontend/ckfinder/ckfinder.html") }}',
            filebrowserImageBrowseUrl: '{{ asset("frontend/ckfinder/ckfinder.html") }}',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
            filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            filebrowserWindowWidth : '1000',
            filebrowserWindowHeight : '700'
        });
    </script>
@endpush
