@extends("admin.master")
@section("content-main")
    <div class="header">
        <h1 class="page-header">
          Cập nhật danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route("welfare.index") }}">Danh Muc</a></li>
            <li><a href="{{ route("welfare.edit",["id"=>$welfare->id]) }}">Cập nhật</a></li>
        </ol>
    </div>
    <div id="page-inner">
        @if(session('warning'))
            <div class="alert alert-danger" role="alert">
                {{session('warning')}}
            </div>
        @endif

    <div class="row">
        <form method="post" enctype="multipart/form-data" action="{{ route("welfare.update",["id"=>$welfare->id]) }}">
            @csrf
            <div class="form-group">
                <label for="txt_name_cate">Tên danh mục:</label>
                <input type="text" value="{{ $welfare->nameWelfare }}" class="form-control" name="welfare_name" id="welfare_name">
                @if ($errors->has('welfare_name'))
                    <p class="error">
                        <i style="color: red;font-style: italic">(*){{ $errors->first('welfare_name') }}</i>
                    </p>
                @endif
            </div>
            <div class="form-group">
                <label for="txt_name_cate">Tên danh mục:</label>
                <input type="text" value="{{ $welfare->iconWelfare }}" class="form-control" name="welfare_icon" id="welfare_icon">
                @if ($errors->has('welfare_icon'))
                    <p class="error">
                        <i style="color: red;font-style: italic">(*){{ $errors->first('welfare_icon') }}</i>
                    </p>
                @endif
            </div>
            <input name="_method" type="hidden" value="PUT">
            <button type="submit" class="btn btn-info">Cập nhật mới</button>
        </form>
    </div>

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
