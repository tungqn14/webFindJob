@extends("admin.master")
@section("content-main")
    <div class="header">
        <h1 class="page-header">
            Chi tiết bài viết
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Chi tiết bài viết</a></li>
        </ol>
    </div>
    <div id="page-inner">
        <!-- /. ROW  -->

        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="descriptionDetail" style="font-size: 16px;font-weight: bold">
                    <b>Tiêu đề: </b><span>{{ $post['title'] }}</span>
                </div>
                <div class="descriptionDetail">
                    <b>Mô Tả Công Việc: </b><span>{{ $post['description'] }} </span>
                </div>
                <div class="descriptionDetail">
                    <b>Yêu Cầu Công Việc: </b><span>{{ $post['requireJob'] }} </span>
                </div>
                <div class="descriptionDetail">
                    <b>Nơi làm Việc: </b>
                    <span>
                   {{ $post['description'] }}
                    </span>
                </div>
                <div class="descriptionDetail">
                    <b>Hình Thức: </b>
                    <span>
                       {{ $post['description'] }}
                    </span>
                </div>
                <div class="descriptionDetail">
                    <b>Hạn Nộp Hồ Sơ: </b>
                    <span>
                      {{ $post['dateTime'] }}
                    </span>
                </div>
                <div class="descriptionDetail">
                    <b>Số lượng tuyển dụng: </b>
                    <span>
                       {{ $post['numberHuman'] }}
                    </span>
                </div>
                <div class="descriptionDetail">
                    <b>Nghành nghề: </b><span>{{ $post['description'] }}</span>
                </div>
                <div class="descriptionDetail">
                    <b>Phúc lợi: </b>
                    <ul>
                        <li>
                            Nghỉ mát
                        </li>
                        <li>
                            Nghỉ mát
                        </li>
                        <li>
                            Nghỉ mát
                        </li>
                    </ul>
                </div>
                <div class="descriptionDetail">
                    <b>Email: </b><span>{{ $post['email'] }}</span>
                </div>
                <div class="descriptionDetail">
                    <a href="#" class="btn btn-success">Chấp Nhận</a>
                    <a href="#" class="btn btn-danger">Từ Chối</a>
                </div>
            </div>

            <!-- /. ROW  -->
        </div>

        <!-- /. ROW  -->


 @endsection


