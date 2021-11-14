@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <h3 class="d-block p-2 bg-dark  text-light">Cập nhật tin tuyển dụng </h3>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form method="post" action="{{ route("ManagePost.update",["id"=>$post->id_post] ) }}">
                            <div class="form-group">
                                <label class="font-weight-bold">Tiêu đề *</label>
                                <small class="form-text text-muted mb-2">Viết ngắn gọn, chính xác vị trí và công việc cần tuyển.</small>
                                <input type="text" class="form-control" value="{{ $post->titlePost ?? "" }}" name="titlePost"  placeholder="VD: Tuyển Dụng Lập Trình Viên PHP">
                                @if ($errors->has('titlePost'))
                                    <p class="error m-2">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('titlePost') }}</i>
                                    </p>
                                @endif
                            </div>
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label class="font-weight-bold">Cấp bậc *</label>
                                <small class="form-text text-muted mb-2"> Có thể tuyển nhiều vị trí chức vụ trong 1 bài đăng </small>
                                <select id="totalEmployee" multiple="multiple" name="rank[]" class="form-control" style="width: 100%">
                                    @if($post->rankPost)
                                        <?php $myRank = array(json_decode($post->rankPost, true)) ?>
                                                @foreach($CheckData->typeRank[0]  as $index=>$rank)
                                                    <option {{ in_array($index,$myRank[0]) ? "selected" : ""}} value="1">{{$rank}}</option>
                                                @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Số lượng cần tuyển</label>
                                <small class="form-text text-muted mb-2"> Để trống mục này nếu không giới hạn số lượng tuyển</small>
                                <input type="text" class="form-control" value="{{  is_numeric($post->quantity) ? $post->quantity :  "" }}" name="quantity" id="exampleInputPassword1" placeholder="số lượng 10 người">

                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Loại hình làm việc*</label>
                                <small class="form-text text-muted mb-2"> Lựa chọn thời gian có thể làm việc cho vị trí tuyển dụng này</small>
                                <select class="form-control" multiple="multiple" id="typeTime" name="typeTime[]"  style="width: 100%">
{{--                                    {{ array_key_exists($user->rank,$CheckData->typeRank[0]) ? $CheckData->typeRank[0][$user->rank] : "" }}--}}
                                    <?php $arrTypeTime = json_decode($post->typeTimePost)  ?>
                                    @foreach($CheckData->typeTime[0] as $index=>$time)
                                    <option {{ in_array($index,$arrTypeTime) ? "selected" : "" }} value="{{ $index }}" >{{ $time }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kỹ năng *</label>
                                <small class="form-text text-muted mb-2"> Lựa chọn các kĩ năng liên quan đến vị trí tuyển dụng này</small>
                                <select class="form-control" id="selectSkill" style="width: 100%" name="id_tech[]" multiple="multiple">
                                    @if($post->tech_id)
                                        <?php $mySkill = json_decode($post->tech_id, true) ?>
                                        @foreach($skills as $skill)
                                            <option {{ in_array($skill->id,$mySkill) ? "selected" : "" }}  value="{{ $skill->id }}">{{ $skill->nameSkill }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Lương</label>
                                <small class="form-text text-muted mb-2"> Để trống mục này là lương thỏa thuận ( đơn vị VNĐ )</small>
                                <input type="text" class="form-control" value="{{ $post->wage ?? "" }}" name="wage" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Hạn chót nộp hồ sơ *</label>
                                <small class="form-text text-muted mb-2"> Sau ngày này tin tuyển dụng sẽ không được hiển thị</small>
                                <input type="date" class="form-control" value="{{ $post->deadline ?? "" }}"  name="deadline" id="exampleInputPassword1" >
                                @if ($errors->has('deadline'))
                                    <p class="error m-2">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('deadline') }}</i>
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Mô tả công việc *</label>
                                <small class="form-text text-muted mb-2">Mô tả công việc phải làm dựa theo vị trí ứng tuyển</small>
                                <textarea  id="motaCongViec" name="desPost" >{!! $post->desPost !!}</textarea>
                                @if ($errors->has('desPost'))
                                    <p class="error m-2">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('desPost') }}</i>
                                    </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Yêu cầu ứng viên *</label>
                                <small class="form-text text-muted mb-2"> Các kỹ năng chuyên môn của ứng viên để đáp ứng nhu cầu công việc, các kỹ năng được ưu tiên của ứng viên... vv</small>
                                <textarea  id="yeuCauUngVien" name="reqPost"  placeholder="Yêu cầu ứng viên">{!! $post->reqPost !!}</textarea>
                                @if ($errors->has('reqPost'))
                                    <p class="error m-2">
                                        <i style="color: red;font-style: italic">(*){{ $errors->first('reqPost') }}</i>
                                    </p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
@push("custom-scripts")
    @if(Session::has("alertSuccessPost"))
        <script>
            toastr.success("{!! Session::get("alertSuccessPost") !!}");
        </script>
    @endif
    @if(Session::has("alertErrorPost"))
        <script>
            toastr.error("{!! Session::get("alertErrorPost") !!}");
        </script>
    @endif
@endpush
