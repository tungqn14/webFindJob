@extends("admin.master")
@section("content-main")
    <div class="header">
        <h1 class="page-header">
            Quản lý bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Danh sách bài viết</a></li>
        </ol>
    </div>
    <div id="page-inner">
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-xs-12">
                @foreach($data as $item)

                <a href="{{ route("posts.detail",["id"=>$item['id']] ) }}"   class="block-post">
                    <div class="time-date">
                            {{ $item['dateTime'] }}
                    </div>
                    <div class="title-send" id="change" href="#">
                        {{ $item['title'] }}
                    </div>
                    <p class="descripton-send" >
                        {{ $item['description'] }}
                    </p>
                </a>
                @endforeach

            </div>
            <div class="col-md-12 col-sm-12 text-right">
                {{ $data->links() }}
            </div>
            <!-- /. ROW  -->
        </div>




        <!-- /. ROW  -->



@endsection

@push("scripts-custom")
            <script>

            </script>
@endpush
