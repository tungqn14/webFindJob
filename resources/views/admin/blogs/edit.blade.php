
@extends("admin.main")
@section("content-main")
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Cập nhật bài viết</h1>
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
                            <form class="form-horizontal" method="post" action="{{ route("blog.update",["id"=>$blog->id]) }}"  enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tiêu đề</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('titleBlog'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('titleBlogs') }}</i>
                                                </p>
                                            @endif
                                            <input type="text" value="{{ $blog->titleBlogs }}" name="titleBlog" class="form-control" >
                                                {{ method_field('put') }}

                                        </div>
                                    </div>
                                    @csrf
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Mô tả</label>
                                        <div class="col-sm-10">
                                            @if ($errors->has('desBlog'))
                                                <p class="error">
                                                    <i style="color: red;font-style: italic">(*){{ $errors->first('desBlog') }}</i>
                                                </p>
                                            @endif
                                            <textarea class="form-control"  name="desBlog" required id="desBlog" rows="3">
                                                {!! $blog->description !!}
                                            </textarea>
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
                                            <textarea name="contentBlog" required class="form-control" id="contentBlog" rows="3">{!! $blog->content !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ảnh đại diện</label>
                                        <div class="col-sm-10">
                                            <input name="theme" type="file">
                                                <input type="hidden" name="themeOld" value="{{ $blog->images }}">
                                            <div class="my-4 border" style="width: 300px;height: 100px">
                                                <img style="width: 100%;height: 100%;object-fit: cover" src="{{ asset("frontend/image-blog/".$blog->images) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Hiển thị</label>
                                        <div class="col-sm-10">
                                            @if($blog->active == 0)
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" checked name="active"  value="0">
                                                <label class="form-check-label" for="inlineRadio1">Ẩn</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="active" value="1">
                                                <label class="form-check-label" for="inlineRadio2">Hiện</label>
                                            </div>
                                            @else
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="active"  value="0">
                                                    <label class="form-check-label" for="inlineRadio1">Ẩn</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" checked  name="active" value="1">
                                                    <label class="form-check-label" for="inlineRadio2">Hiện</label>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button class="btn btn-info" type="submit">Cập nhật</button>
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

{{--            @if($blog->content)--}}
{{--                CKEDITOR.instances['contentBlog'].setData("{{ $blog->content }}");--}}
{{--            @endif--}}
{{--            @if($blog->description)--}}
{{--        var desBlog = CKEDITOR.instances['desBlog'];--}}
{{--        desBlog.insertHtml("{{ $blog->description }}");--}}
{{--        @endif--}}

    </script>
@endpush
