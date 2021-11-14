@extends("admin.master")
@section("content-main")
    <div class="header">
        <h1 class="page-header">
            Thêm mới phúc lợi
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("attribute.index") }}">Danh Muc</a></li>
            <li><a href="{{ route("welfare.create") }}">Thêm Mới</a></li>
        </ol>

    </div>
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form enctype="multipart/form-data" method="post" action="{{ route("welfare.store") }}">
                            @csrf
                            <div class="form-group">
                                <label for="txt_name_cate">Tên phúc lợi:</label>
                                <input type="text" class="form-control" placeholder="Đào tạo" name="welfare_name" id="welfare_name">
                                @if ($errors->has('welfare_name'))
                                    <p class="error">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('welfare_name') }}</i>
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="txt_name_cate">Icon:</label>
                                <input type="text" class="form-control" placeholder="fa fa-icon" name="welfare_icon" id="welfare_icon">
                                @if ($errors->has('welfare_icon'))
                                    <p class="error">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('welfare_icon') }}</i>
                                    </p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-info">Thêm mới</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
    </div>




    <!-- /. ROW  -->



@endsection
@push('scripts-custom')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush
