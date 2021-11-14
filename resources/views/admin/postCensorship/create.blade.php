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
        @error('messageWarning')
        <div class="error" style="color: red;font-style: italic">{{ $messageWarning }}</div>
        @enderror
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="title" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mo ta cong viec</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="description" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Yêu Cầu Công Việc</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="requireJob" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nơi làm Việc</label>
                        <select style="display: block;width: 100%;padding: 6px" class="form-select"  name="location">
                            @foreach($locations as $location)
                               <option value="{{ $location->id  }}">{{ $location->nameLocation }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình Thức:</label>
                        <div class="form-check">
                            <input class="form-check-input" name="hinhthuc[]" type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                               Fulltime
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="hinhthuc[]" type="checkbox" value="2" id="defaultCheck2">
                            <label class="form-check-label" for="defaultCheck2">
                                Parttime
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="hinhthuc[]" type="checkbox" value="3" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                Thời vụ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="hinhthuc[]" type="checkbox" value="4" id="defaultCheck3">
                            <label class="form-check-label" for="defaultCheck3">
                                Thực tập sinh
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hạn Nộp Hồ Sơ</label>
                        <input type="datetime-local" class="form-control" name="dateTime" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số lượng tuyển dụng</label>
                        <input type="text" class="form-control" name="numberHuman" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label>Chọn nghành nghề:</label>
                        <select class="form-control" name="parent_id">
                            <option value="0">Chọn danh mục cha</option>
                            {!! $htmlOption !!}
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phúc lợi</label>
                        <div class="form-check">
                            <input name="welfare[]" class="form-check-input" type="checkbox" value="1" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Du Lịch
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="welfare[]" type="checkbox" value="2" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Chế độ bảo hiểm
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="welfare[]" type="checkbox" value="3" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Chăm sóc sức khỏe
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="welfare[]" type="checkbox" value="4" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Xe đưa đón
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="welfare[]" type="checkbox" value="5" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Phụ cấp thâm niên
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="welfare[]" type="checkbox" value="6" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                Đào tạo
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kinh nghiệm</label>
                        <select class="form-control" name="experience">
                            <option value="0">Chưa có kinh nghiệm</option>
                            <option value="1">Yêu cầu kinh nghiệm</option>
                            <option value="2">Không cần kinh nghiệm</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giới tính</label>
                        <select class="form-control" name="gender">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Trình độ học vấn</label>
                        <select class="form-control" name="education">
                            <option value="0">Đại Học</option>
                            <option value="1">Cao đẳng</option>
                            <option value="1">Tốt nghiệp THPT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cấp bậc</label>
                        <select class="form-control" name="level">
                            <option value="0">Sinh Viên / TTS</option>
                            <option value="1">Mới tốt nghiệp</option>
                            <option value="2">Nhân viên</option>
                            <option value="3">Trưởng nhóm / Giám sát</option>
                            <option value="4">Quản lý</option>
                            <option value="5">Phó giám đốc</option>
                            <option value="6">Giám đốc</option>
                            <option value="7">Tổng giám đốc</option>
                            <option value="8">Chủ tịch/ Phó chủ tịch</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <!-- /. ROW  -->
        </div>




        <!-- /. ROW  -->



        @endsection

        @push("scripts-custom")

         @endpush
