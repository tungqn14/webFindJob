@extends("admin.main")
@section("content-main")
    <div class="header">
        <h1 class="page-header">
            Thêm mới danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("career.index") }}">Danh Muc</a></li>
            <li><a href="{{ route("career.show") }}">Thêm Mới</a></li>
        </ol>

    </div>
    <div id="page-inner">

        <!-- /. ROW  -->

        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form  method="post" action="{{ route("location.store") }}">
                            @csrf
                            <div class="form-group">
                                <label for="txt_name_cate">Tên địa điểm:</label>
                                <input type="text" class="form-control" name="nameLocation" id="txt_name_cate">
                                @if($errors->has('nameLocation'))
                                    <p class="error">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('nameLocation') }}</i>
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

