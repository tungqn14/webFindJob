@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-between">
                        <h3 class="d-inline-block">Quản lý tài khoản</h3>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <nav class="mt-3">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link text-dark active"
                                   id="nav-home-tab" data-toggle="tab"
                                   href="#nav-home" role="tab" aria-controls="nav-home"
                                   aria-selected="true">Thông tin tài khoản</a>
                                <a class="nav-item nav-link text-dark"
                                   id="nav-profile-tab" data-toggle="tab"
                                   href="#nav-profile" role="tab" aria-controls="nav-profile"
                                   aria-selected="false">Thông tin công ty</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <form method="post" action="{{ route("ManageAccount.storeAccount",["id"=>Auth::user()->id]) }}">
                                    <div class="form-group">
                                        @csrf
                                        <label class="font-weight-bold">Tên nhà tuyển dụng</label>
                                        <small class="form-text text-muted mb-2">Viết ngắn gọn, chính xác.</small>
                                        <input type="text" class="form-control" value="{{ $employer[0]["fullName"] ?? "" }}" name="fullName" placeholder="VD: Nguyễn Văn A">
                                        @if ($errors->has('fullName'))
                                            <p class="error m-2">
                                                <i style="color: red;font-style: italic">{{ $errors->first('fullName') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Email</label>
                                        <small class="form-text text-muted mb-2">Email này sẽ được ứng viên gửi cv đến đồng thời cũng là email đăng nhập</small>
                                        <input type="email"  class="form-control" value="{{ $employer[0]["email"] ?? "" }}" name="email"  placeholder="VD: abc@gmail.com">
                                        @if ($errors->has('email'))
                                            <p class="error m-2">
                                                <i style="color: red;font-style: italic">{{ $errors->first('email') }}</i>
                                            </p>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-bold">Địa chỉ làm việc</label>
                                        <small class="form-text text-muted mb-2">Nêu cụ thể như số nhà bao nhiêu, đường nào,quận huyện </small>
                                        <input type="text" class="form-control" name="address" value="{{ $employer[0]["address"] ?? "" }}"  placeholder="VD:Số nhà 141 đường Chiến Thắng Tân Triều Thanh Trì Hà Nội">
                                        @if ($errors->has('address'))
                                            <p class="error m-2">
                                                <i style="color: red;font-style: italic">{{ $errors->first('address') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Số điện thoại</label>
                                        <small class="form-text text-muted mb-2">Số điện thoai này sẽ được úng viên gọi đến </small>
                                        <input type="number" class="form-control" name="phone" value="{{ $employer[0]["phone"] ?? "" }}"  placeholder="VD: 0384849854">
                                        @if ($errors->has('phone'))
                                            <p class="error m-2">
                                                <i style="color: red;font-style: italic">{{ $errors->first('phone') }}</i>
                                            </p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <form enctype="multipart/form-data" method = "post" action="{{ route("ManageAccount.storeCompany",["id"=>Auth::user()->id])  }}">
                                                    <div class="form-group">
                                                        @csrf
                                                        <label class="font-weight-bold">Tên công ty</label>
                                                        <small class="form-text text-muted mb-2">Viết ngắn gọn, chính xác.</small>
                                                        <input type="text" class="form-control" name="nameCompany" value="{{ $employer[0]->company['nameCompany'] ?? ""}}"  placeholder="VD: Công ty TNHH GIÀY THƯỢNG ĐÌNH...">
                                                        @if ($errors->has('nameCompany'))
                                                            <p class="error m-2">
                                                                <i style="color: red;font-style: italic">(*){{ $errors->first('nameCompany') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold w-100 d-block">Tổng số nhân viên</label>
                                                        <select class="js-states form-control" id="totalEmployee" style="width: 100%" name="scale">
                                                            <option value="1">0-100</option>
                                                            <option value="2">100-200</option>
                                                            <option value="3">200-300</option>
                                                            <option value="4">300-400</option>
                                                            <option value="5">400-500</option>
                                                            <option value="6">>500</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold w-100 d-block">Lĩnh vực hoạt động</label>
                                                        <select class="js-states form-control" id="field_of_activity" style="width: 100%" name="id_career[]" multiple="multiple">
                                                            @if(!isset($employer[0]->company['career_id']))
                                                                @foreach($careers as $career)
                                                                    <option value="{{ $career->id }}">{{ $career->name_career }}</option>
                                                                @endforeach
                                                                @else
                                                                <?php $arrCareer =  array_map('intval', json_decode($employer[0]->company['career_id']))  ?>
                                                                  @foreach($careers as $career)
                                                                       <option {{ in_array($career->id,$arrCareer) ? "selected" : "" }} value="{{ $career->id }}">{{ $career->name_career }}</option>
                                                                   @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Website công ty</label>
                                                        <input type="text" class="form-control" value="{{ $employer[0]->company['website'] ?? "" }}" placeholder="google.com" name="website" >
                                                        @if ($errors->has('site'))
                                                            <p class="error m-2">
                                                                <i style="color: red;font-style: italic">(*){{ $errors->first('site') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Thành phố trụ sở công ty</label>
                                                        <select class="js-states form-control" id="field_of_activity" style="width: 100%" name="officeAddress">
                                                            @foreach($locations as $location)
                                                                <option {{ $employer[0]->company['officeAddress'] == $location['id'] ? "selected" : "" }}  value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Giới thiệu về công ty</label>
                                                        <textarea name="aboutCompany" id="aboutCompany">{!! $employer[0]->company['aboutCompany'] ?? "" !!}</textarea>
                                                        <input type="hidden" name="aboutCompanyOld" value="{{ $employer[0]->company['aboutCompany'] }}">
                                                        @if ($errors->has('aboutCompany'))
                                                            <p class="error m-2">
                                                                <i style="color: red;font-style: italic">(*){{ $errors->first('aboutCompany') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold">Upload Ảnh Logo</label>
                                                        <input type="file" name="logo" class="form-control"  >
                                                        <input type="hidden" name="logo_old" class="form-control"  value="{{ $employer[0]->company['logo'] }}" >
                                                        <div class="mt-3 mb-3" id="preview"></div>
                                                        @if ($errors->has('logo'))
                                                            <p class="error m-2">
                                                                <i style="color: red;font-style: italic">(*){{ $errors->first('logo') }}</i>
                                                            </p>
                                                        @endif
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="font-weight-bold d-block">Phúc lợi</label>
                                                        <div class="row">
                                                                @if(!isset($employer[0]->company['welfare_id']))
                                                                    @foreach($welfares as $welfare)
                                                                    <div class="col-3 col-lg-3 mb-2">
                                                                        <input type="checkbox" name="id_welfare[]"  value="{{ $welfare->id }}"><i class="{{ $welfare->icon_welfare  }} mx-2"></i>{{ $welfare->name_welfare  }}
                                                                    </div>
                                                                    @endforeach
                                                                @else
                                                                    <?php $arrWelfare =  array_map('intval', json_decode($employer[0]->company['welfare_id']))  ?>
                                                                        @foreach($welfares as $welfare)
                                                                            <div class="col-3 col-lg-3 mb-2">
                                                                                <input type="checkbox" {{in_array($welfare->id,$arrWelfare) ? "checked" : "" }} name="id_welfare[]"  value="{{ $welfare->id }}"><i class="{{ $welfare->icon_welfare  }} mx-2"></i>{{ $welfare->name_welfare  }}
                                                                            </div>
                                                                        @endforeach
                                                                @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Lưu thông tin</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </main>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push("custom-scripts")
@if(Session::has("alertSuccessStoreProfile"))
    <script>
        toastr.success("{!! Session::get("alertSuccessStoreProfile") !!}");
    </script>
@endif
@if(Session::has("alertErrorStoreProfile"))
    <script>
        toastr.error("{!! Session::get("alertErrorStoreProfile") !!}");
    </script>
@endif

@endpush
