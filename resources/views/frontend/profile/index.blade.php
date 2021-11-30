
@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.layouts.master")
@section("main")
    <main>
        <article style="margin-top: 10%;">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img width="120px" height="160px" class="profile-user-img img-fluid img-circle"
                                         src="{{ $user->avatar ? $user->avatar : asset("frontend/avatar_120x160.png") }}"
                                         alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center mt-2">{{ $user->fullName ? $user->fullName : "Cập nhật" }}</h3>
                               <div class="text-center">
                                   <p class="text-gray mt-2">{{ $user->position ? $user->position : "Cập nhật" }}</p>
                               </div>

                                <hr>
                               <div class="p-1">
                                   <strong class="mr-1"><i class="fas fa-map-marker-alt mr-1"></i>Ngày sinh :</strong>
                                   <span> {{ $user->birthDay ? $user->birthDay : "Cập nhật" }} </span>
                               </div>
                                <hr>
                                <div class="p-1">
                                    <strong><i class="fas fa-venus-mars mr-1"></i> Giới tính :</strong>
                                    @if($user->gender)
                                        <span>{{ array_key_exists($user->gender,$CheckData->typeGender[0]) ? $CheckData->typeGender[0][$user->gender] : "" }} </span>
                                    @else
                                        <span>Cập nhật </span>
                                    @endif

                                </div>
                                <hr>
                                <div class="p-1">
                                    <strong><i class="fas fa-envelope-open-text mr-1"></i> Email :</strong>
                                    <span> {{ $user->email ? $user->email : "Cập nhật" }}</span>
                                </div>
                                <hr>
                                    <div class="p-1">
                                        <strong><i class="fas fa-phone-alt mr-1"></i>Số điện thoại :</strong>
                                        <span>{{ $user->phone ? $user->phone : "Cập nhật" }}</span>
                                    </div>
                                <hr>
                               <div class="p-1">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Địa chỉ :</strong>
                                    <span> {{ $user->address ? $user->address : "Cập nhật" }}</span>
                               </div>
                                <hr>
                                 <div class="p-1">
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Kĩ năng: </strong>
                                    <p class="text-muted">
                                        @foreach($user->skills as $skill)
                                            <span class="tag tag-danger">{{ $skill->nameSkill."," }}</span>
                                        @endforeach
                                    </p>
                                 </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link {{$errors->has("email") ? "" : "active" }}" href="#activity" data-toggle="tab">Thông tin tài khoản</a></li>
                                    <li class="nav-item"><a class="nav-link {{$errors->has("email") ? "active" : ""}}" href="#timeline" data-toggle="tab">Cập nhật thông tin</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class=" tab-pane {{ $errors->has("email") ? "" : "active" }}" id="activity">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h4 class="mb-3 py-2 text-dark" style="background-color: #f1f9ff;"> Thông tin nghề nghiệp</h4>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="">
                                                        <div style="font-size: 18px;">
                                                            <div class="d-flex">
                                                                <div><b>Năm kinh nghiệm::</b></div>
                                                                <div class="text-dark ml-3">{{ $user->exp }} năm</div>
                                                            </div>
                                                            <div class="d-flex">
                                                                <div><b>Cấp bậc :</b></div>
                                                                @if($user->rankUser)
                                                                <div class="text-dark ml-3">{{ array_key_exists($user->rankUser,$CheckData->typeRank[0]) ? $CheckData->typeRank[0][$user->rankUser] : "" }}</div>
                                                                @else
                                                                    <div class="text-dark ml-3">Cập nhật</div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div style="font-size: 18px;">
                                                            <div class="d-flex">
                                                                <div><b>Mức lương mong muốn:</b></div>
                                                                <div class="text-dark ml-3">{{ number_format($user->desiredMoney, 0, '', ',') }} </div>
                                                            </div>
                                                            <div class="d-flex">
                                                                <div><b>Hình thức:</b></div>
                                                                @if($user->typeTimeUser)
                                                                    <div class="text-dark ml-3">{{ array_key_exists($user->typeTimeUser,$CheckData->typeTime[0]) ? $CheckData->typeTime[0][$user->typeTimeUser] : "" }}</div>
                                                                @else
                                                                    <div class="text-dark ml-3">Cập nhật</div>
                                                                @endif
                                                            </div>
                                                            <div class="d-flex">
                                                                <div class="mr-2"><b>Giới thiệu bản thân:</b></div>
                                                                <div class="text-dark ml-3 ">{!! $user->descripYourself ?  $user->descripYourself : "(Cập nhật)" !!}</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <h4 class="my-5 py-2 text-dark" style="background-color: #f1f9ff;"> Nội dung hồ sơ</h4>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                    <div class="text-center">
                                                        @if($user->cv)
                                                        <iframe src="{{ $user->cv ?  $user->cv : "" }}" style="margin:0 auto" width="80%" height="800px">
                                                        </iframe>
                                                        @else
                                                            <div class="text-center"> Cập nhật</div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane  {{ $errors->has("email") ? "active" : "" }}" id="timeline">
                                        <form method="post" action="{{route("profile.save",["id"=>$user->id])}}" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-3 col-form-label">Tên đầy đủ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="fullName" value="{{ $user->fullName ?? "" }}" id="inputName" placeholder="Nguyễn Văn An">
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>

                                                <div class="col-sm-9">
                                                    @if ($errors->has('email'))
                                                        <p class="error m-2">
                                                            <i style="color: red;font-style: italic">{{ $errors->first('email') }}</i>
                                                        </p>
                                                    @endif
                                                    <input type="email" class="form-control" name="email"  value="{{ $user->email ?? "" }}" placeholder="abc@gmail.com">
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Địa chỉ</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="address" value="{{ $user->address ?? "" }}" placeholder="Đường Lê thánh Tông Đống Đa Hà Nội">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? "" }}" placeholder="02135698741">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Ngày sinh</label>
                                                <div class="col-sm-9">
                                                    <input type="date" class="form-control" dateformat="d M y" name="birthDay" value="{{ $user->birthDay ?? "" }}" placeholder="12/12/2012">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Giới tính</label>
                                                <div class="col-sm-9">
                                                    @if($user->gender)
                                                        <select class="form-control" name="gender">
                                                            <option {{ $user->gender == 1 ? "selected" : "" }} value="1">Nam</option>
                                                            <option {{ $user->gender == 2 ? "selected" : "" }} value="2">Nữ</option>
                                                            <option {{ $user->gender == 0 ? "selected" : "" }} value="0">Không xác định</option>
                                                        </select>
                                                    @else
                                                        <select class="form-control" name="gender">
                                                            <option value="1">Nam</option>
                                                            <option value="2">Nữ</option>
                                                            <option value="0">Không xác định</option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Kĩ năng</label>
                                                <div class="col-sm-9">
                                                    <select id="selectSkill" name="skills[]" multiple="multiple" class="form-control" style="width: 100%;padding: 5px">
                                                        @if($mySkill)
                                                            @foreach($listSkills as $skill)
                                                                <option {{ in_array($skill->id,$mySkill) ? "selected" : "" }} value="{{ $skill->id }}">{{ $skill->nameSkill }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach($listSkills as $skill)
                                                                <option value="{{ $skill->id }}">{{ $skill->nameSkill }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Năm kinh nghiệm</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" name="exp" value="{{ $user->exp ?? "" }}" id="inputName2" placeholder="10 năm kinh nghiệm">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Chức danh</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="position" value="{{ $user->position ?? "" }}" placeholder="Frontend Developer">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Mức lương mong muốn</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" name="desiredMoney" value="{{ $user->desiredMoney ?? "" }}" placeholder="10.000.000 VND -> 20.000.000 VND">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-3 col-form-label">Cấp bậc</label>
                                                <div class="col-sm-9">
                                                    @if($user->rankUser)
                                                    <select id="totalEmployee" name="education" class="form-control" style="width: 100%">
                                                        <option {{ $user->rankUser == 1 ? "selected" : "" }} value="1">Cộng tác viên (Collaborators)</option>
                                                        <option  {{ $user->rankUser == 2 ? "selected" : "" }} value="2">Nhân viên (Staff)</option>
                                                        <option  {{ $user->rankUser == 3 ? "selected" : "" }}value="3">Quản lý dự án (Project Manager)</option>
                                                        <option {{ $user->rankUser == 4 ? "selected" : "" }} value="4">Giám đốc kỹ thuật (CTO)</option>
                                                        <option  {{ $user->rankUser == 5 ? "selected" : "" }}value="5">Giám đốc bộ phận IT (IT Manager)</option>
                                                        <option  {{ $user->rankUser == 6 ? "selected" : "" }} value="6">Khác (Other)</option>
                                                    </select>
                                                    @else
                                                        <select id="totalEmployee" name="education" class="form-control" style="width: 100%">
                                                            <option value="1">Cộng tác viên (Collaborators)</option>
                                                            <option value="2">Nhân viên (Staff)</option>
                                                            <option value="3">Quản lý dự án (Project Manager)</option>
                                                            <option value="4">Giám đốc kỹ thuật (CTO)</option>
                                                            <option value="5">Giám đốc bộ phận IT (IT Manager)</option>
                                                            <option value="6">Khác (Other)</option>
                                                        </select>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2"  class="col-sm-3 col-form-label">Hình thức</label>
                                                <div class="col-sm-9">
                                                    @if($user->typeTimeUser)
                                                        <select id="totalEmployee" class="form-control" name="typeTime" style="width: 100%">
                                                            <option {{ $user->typeTimeUser == 4 ? "selected" : ""  }} value="4">Toàn thời gian</option>
                                                            <option {{ $user->typeTimeUser == 3 ? "selected" : ""  }} value="3">Bán thời gian</option>
                                                            <option {{ $user->typeTimeUser == 2 ? "selected" : ""  }} value="2">Cộng tác viên</option>
                                                            <option {{ $user->typeTimeUser == 1 ? "selected" : ""  }} value="1">Thời vụ</option>
                                                        </select>
                                                    @else
                                                        <select id="totalEmployee" class="form-control" name="typeTime" style="width: 100%">
                                                            <option value="4">Toàn thời gian</option>
                                                            <option value="3">Bán thời gian</option>
                                                            <option value="2">Cộng tác viên</option>
                                                            <option value="1">Thời vụ</option>
                                                        </select>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-3 col-form-label">Ảnh cá nhân</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="avatar" class="form-control" >
                                                    <input type="hidden" name="avatarOld" value="{{ $user->avatar ?? "" }}" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputSkills" class="col-sm-3 col-form-label">CV cá nhân</label>
                                                <div class="col-sm-9">
                                                    <input type="file" name="cv" class="form-control" >
                                                    <input type="hidden" value="{{ $user->cv ?? "" }}"  name="cvOld" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputExperience" class="col-sm-3 col-form-label">Giói thiệu bản thân</label>
                                                <div class="col-sm-9">
                                                    <textarea class="form-control" value="{{ $user->descripYourself ?? "" }}" id="aboutCompany" name="descripYourself" placeholder="Giới thiệu bản thân"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">Cập nhật</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.tab-pane -->

                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
        </article>
    </main>
@endsection
@push("custom-scripts")
    @if(Session::has("successUpdateProfile"))
        <script>
            toastr.success("{!! Session::get("successUpdateProfile") !!}");
        </script>
    @endif
    @if(Session::has("failUpdateProfile"))
        <script>
            toastr.error("{!! Session::get("failUpdateProfile") !!}");
        </script>
    @endif

@endpush
