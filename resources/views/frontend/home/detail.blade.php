
@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
<main class="detail-main">
    <div class="container bg-white">
        <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        <article>
                            <section class="content-detail-company">
                                <div class="top-header-img d-flex justify-content-between">
                                    <div class="img-header">
                                        <img src="{{ asset("frontend/image-recruiment-logo/".$listPost->logo) }}" alt="">
                                    </div>
                                    <h4 class="title-company">
                                      {{ $listPost->nameCompany }}</h4>
                                </div>
                                <div class="tabs-inf">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                          <a class="nav-link active" id="company-tab"
                                          data-toggle="tab" href="#company" role="tab"
                                           aria-controls="company" aria-selected="true">Về công ty</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="job-tab"
                                          data-toggle="tab" href="#job" role="tab"
                                          aria-controls="job" aria-selected="false">Công việc</a>
                                        </li>
                                        @if(Auth::check())
                                            @if(Auth::user()->user_level == 2)
                                                <li>
                                                    <div class="group-action">
{{--                                                        <div class="icon-save">--}}
{{--                                                            <i class="fas fa-bookmark"></i>Theo dõi--}}
{{--                                                        </div>--}}
                                                        <?php $activeFavorite = \App\Model\Company::where("id",$listPost->id)->whereHas("favorites",function ($query){
                                                            $query->where("user_id",Auth::user()->id);
                                                        })->get();   ?>
                                                        <div class="icon-save iheart {{ $activeFavorite->count() ? "active-heart" : "" }}"
                                                             data-idUser="{{ Auth::user()->id }}"
                                                             data-idComapany="{{$listPost->id}}"
                                                             data-url="{{route("user.favorite")}}"
                                                             id="clickFavorite">
                                                            <i class="fas fa-heart"></i>Yêu thích
                                                        </div>
                                                    </div>
                                                </li>

                                            @endif
                                        @endif

                                      </ul>
                                      <div class="tab-content" id="tab-list-content">
                                        <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="company-tab">
                                             {!! $listPost->aboutCompany  !!}
                                        </div>
                                        <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
                                          <div>
                                              <div class="my-3">
                                                  <b class="mr-2">Tiêu đề bài viết:</b>
                                                  {{$listPost->titlePost ?? "Chưa cập nhật"}}
                                              </div>
                                              <div class="my-3">
                                                  <b class="mr-2">Lương:</b>
                                                  {{$listPost->wage ?? "Chưa cập nhật"}}
                                              </div>
                                              <div class="my-3">
                                                  <b class="mr-2">Thời hạn:</b>
                                                  {{$listPost->deadline ?? "Chưa cập nhật"}}
                                              </div>
                                              <div class="my-3">
                                                  <b class="mr-2">Vị trí:</b>
                                                  <?php $arrRankPost =  collect(array_map('intval', json_decode($listPost->rankPost)))  ?>
                                                  @foreach($CheckData->typeRank[0] as $key=>$rankPost)
                                                      @if($arrRankPost->contains($key))
                                                          <span class="mx-2">{{ $rankPost}}</span>
                                                      @endif
                                                  @endforeach
                                              </div>
                                            <div class="my-3"><b>Mô tả công việc:</b></div>
                                              <div>
                                                  {!!  $listPost->desPost !!}
                                              </div>
                                              <div  class="my-3"><b>Yêu cầu công việc:</b></div>
                                              <div>
                                                  {!!  $listPost->reqPost !!}
                                              </div>
                                          </div>
                                            @if(Auth::check())
                                                @if(Auth::user()->user_level == 2 )
                                                 <div class="text-center my-3">
                                                     <button class="btn btn-danger" data-toggle="modal" data-target="#modalApply">Ứng tuyển ngay</button>
                                                 </div>
                                                @endif
                                            @elseif(!Auth::check())
                                                <div class="text-center my-3">
                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#modalApply">Ứng tuyển ngay</button>
                                                </div>
                                            @endif
                                        </div>
                                      </div>
                                </div>
                             @if($postOther)
                                 @foreach($postOther as $itemPost)
                                        <div class="bottom-description">
                                            <h4 class="w-100">
                                                <a style="color:#e24c32" class="text-decoration-none d-block w-100 text-uppercase" href="{{ route("home.detail",["id"=>$itemPost['id_post']]) }}">{{ $itemPost["titlePost"] }}</a>
                                            </h4>
                                            <div class="my-2">
                                                <span><span class="mr-2">Hạn nộp:</span><i style="color: gray;" class="fa fa-calendar mr-2"></i>{{ $itemPost["deadline"] }}</span>
                                                @if(is_numeric($itemPost["wage"]))
                                                    <span class="mx-2"><span class="mr-2">Lương:</span><i style="color: #e24c32" class="fas fa-dollar-sign"></i>{{ number_format($itemPost["wage"], 0, '', ',')." VNĐ"  }}</span>
                                                @else
                                                    <span class="mx-2"><span class="mr-2">Lương:</span><i style="color: #e24c32" class="fas fa-dollar-sign"></i>Thỏa thuận</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="group-using-skill">
                                                    <?php $mySkill = collect(json_decode($itemPost["tech_id"], true)) ?>
                                                    @if(!empty($mySkill))
                                                        @foreach($skills as $skill)
                                                            @if($mySkill->contains($skill->id))
                                                                <span class="career-span my-2">{{ $skill->nameSkill }}</span>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <span class="career-span">null</span>
                                                    @endif

                                                </div>
                                                <div class="btn-link-ungtuyen text-center">
                                                    <a class="text-decoration-none" style="padding: 5px 10px;
                                            background-color: #e24c32;
                                            color: white;" href="{{ route("home.detail",["id"=>$itemPost['id_post']]) }}">Ứng tuyển</a>
                                                </div>

                                            </div>
                                        </div>
                                 @endforeach
                              @endif

                            </section>
                        </article>
                    </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <aside class="right-inf-company">
                        <div class="d-block my-2">
                            <b class="d-block">Website</b>
                            <span>{{ $listPost->website }}</span>
                        </div>
                        <div class="d-block my-2">
                           <b class="d-block">Địa điểm</b>
                            <span>{{$listPost->address}}</span>
                        </div>
                        <div class="d-block my-2">
                            <b class="d-block">Quy Mô Công Ty</b>
                            {{ array_key_exists($listPost->scale ,$CheckData->scale[0]) ? $CheckData->scale[0][$listPost->scale ] : "null" }}
                        </div>
                        <div class="d-block">
                            <b class="d-block my-2">Ngành Nghề</b>
                            @if(empty($listPost->career_id))
                                <span class="p-1 mx-2" > null </span>
                            @else
                                <?php $arrCareer =  collect(array_map('intval', json_decode($listPost->career_id)))  ?>
                                @foreach($careers as $career)
                                    @if($arrCareer->contains($career->id))
                                        <span class="career-span">{{ $career->name_career}}</span>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                        <div class="d-block">
                           <b class="d-block my-2">Tech Stack</b>
                            <?php $mySkill = collect(json_decode($listPost->tech_id, true)) ?>
                            @if(!empty($mySkill))
                                @foreach($skills as $skill)
                                    @if($mySkill->contains($skill->id))
                                        <span class="career-span">{{ $skill->nameSkill }}</span>
                                    @endif
                                @endforeach
                            @else
                                <span class="career-span">null</span>
                            @endif

                        </div>
                        <div class="d-block my-2">
                            <b class="d-block">Đãi Ngộ</b>
                            <ul class="ml-3">
                                @if(empty($listPost->welfare_id))
                                    <li> null</li>
                                @else
                                    <?php $arrWelfare =  collect(array_map('intval', json_decode($listPost->welfare_id))) ?>
                                    @foreach($welfares as $welfare)
                                        @if($arrWelfare->contains($welfare->id))
                                            <li class="ml-3">
                                                    <i class="{{ $welfare->icon_welfare  }} mx-2"></i>{{ $welfare->name_welfare  }}
                                            </li>
                                        @endif

                                    @endforeach
                                @endif

                             </ul>
                        </div>
                    </aside>
                </div>
        </div>
    </div>
        @if(Auth::check())
            @if(Auth::user()->user_level == 2 )
                <div class="modal fade  bd-example-modal-lg" id="modalApply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Bạn đang ứng tuyển vị trí <span class="mx-2" style="color: #e24c32;">  {{ $listPost->titlePost }}</span></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="formSendCv" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Họ và tên</label>
                                    @csrf
                                    <div class="col-sm-10">
                                      <input type="text" name="nameSubmit" id="nameSubmit" value="{{ Auth::user()->fullName ? Auth::user()->fullName : "" }}" required class="form-control">
                                        <p style="color: red;font-style: italic" class="my-2 error_nameSubmit"></p>
{{--                                      <input type="hidden" id="postSubmit" name="listPost" value="{{ array(["id_post"=>$listPost->post_id,"titlePost"=>$listPost->titlePost])  }}">--}}
                                      <input type="hidden" id="urlSubmit"  value="{{ route("home.storeApplyJob") }}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                      <input type="email" id="emailSubmit"  name="emailSubmit" value="{{ Auth::user()->email ? Auth::user()->email : "" }}" required class="form-control">
                                        <p style="color: red;font-style: italic" class="my-2 error_emailSubmit"></p>
                                    </div>
                                  </div>
                                <div class="form-group row">
                                  <label for="number" class="col-sm-2 col-form-label">Số điện thoại</label>
                                  <div class="col-sm-10">
                                    <input type="number" id="phoneSubmit" name="phoneSubmit" value="{{ Auth::user()->phone ? Auth::user()->phone : "" }}" required class="form-control">
                                      <p style="color: red;font-style: italic" class="my-2 error_phoneSubmit"></p>
                                  </div>
                                </div>
                                @if(Auth::user()->cv)
                                <div class="form-group row">
                                    <label for="number" class="col-sm-2 col-form-label">FILE PDF CV</label>
                                    <div class="col-sm-10">
                                          <input type="file" id="cvSubmit" name="cvSubmit">
                                          <input type="hidden" id="cvSubmit_Old" value="{{Auth::user()->cv}}" name="cvSubmit_Old">
                                        <div class="my-2">
                                            <small class="text-blue">CV đã tồn tại bạn có thể ko cần upload nếu như không cần thiết</small>
                                        </div>
                                        <p style="color: red;font-style: italic" class="my-2 error_cvSubmit"></p>
                                    </div>

                                  </div>
                                @else
                                    <div class="form-group row">
                                        <label for="number" class="col-sm-2 col-form-label">FILE PDF CV</label>
                                        <div class="col-sm-10">
                                            <input type="file" required id="cvSubmit" name="cvSubmit">
                                            <input type="hidden" id="cvSubmit_Old"  name="cvSubmit_Old">
                                            <p style="color: red;font-style: italic" class="my-2 error_cvSubmit"></p>
                                        </div>
                                    </div>
                                @endif
                              </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          <button type="button" id="btnSubmitCv" class="btn btn-danger">Gửi CV</button>
                        </div>
                      </div>
                    </div>
            @endif
        @elseif(!Auth::check())
           <div class="modal fade  bd-example-modal-lg" id="modalApply" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Bạn đang ứng tuyển vị trí <span class="mx-2" style="color: #e24c32;">  {{ $listPost->titlePost }}</span></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="formSendCv" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Họ và tên</label>
                                                @csrf
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" id="nameSubmit"  required class="form-control">
                                                    <p style="color: red;font-style: italic" class="mt-2 error_nameSubmit"></p>
                                                    <input type="hidden" id="urlSubmit"  value="{{ route("home.storeApplyJob") }}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" id="emailSubmit"  name="emailSubmit"  required class="form-control">
                                                    <p style="color: red;font-style: italic" class="mt-2 error_emailSubmit"></p>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="number" class="col-sm-2 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-10">
                                                    <input type="number" id="phoneSubmit" name="phoneSubmit"  required class="form-control">
                                                    <p style="color: red;font-style: italic" class="mt-2 error_phoneSubmit"></p>
                                                </div>
                                            </div>
                                                <div class="form-group row">
                                                    <label for="number" class="col-sm-2 col-form-label">FILE PDF CV</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" required id="cvSubmit" name="cvSubmit">
                                                        <input type="hidden" id="cvSubmit_Old"  name="cvSubmit_Old">
                                                     <p style="color: red;font-style: italic" class="mt-2 error_cvSubmit"></p>
                                                    </div>

                                                </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                        <button type="button" id="btnSubmitCv" class="btn btn-danger">Gửi CV</button>
                                    </div>
                                </div>
                        </div>
        @endif

</main>
@endsection
@push("custom-scripts")
    <script>
        $('#btnSubmitCv').click(function(e){
            e.preventDefault();
            let nameSubmit = $("#nameSubmit").val();
            let emailSubmit = $("#emailSubmit").val();
            let cvSubmit = $("#cvSubmit").prop('files')[0];
            let postId = {{ $listPost->id_post }};
            let phoneSubmit = $("#phoneSubmit").val();
            let cvSubmit_Old = $("#cvSubmit_Old").val() ? $("#cvSubmit_Old").val() : "" ;
            let url = $("#urlSubmit").val();
            var formData = new FormData();
            formData.append('nameSubmit', nameSubmit);
            formData.append('phoneSubmit', phoneSubmit);
            formData.append('cvSubmit', cvSubmit);
            formData.append('postId', postId);
            formData.append('emailSubmit', emailSubmit);
            formData.append('postId', postId);
            formData.append('cvSubmit_Old', cvSubmit_Old);
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:  url ,
                type:'POST',
                dataType:"json",
                mimeType: "multipart/form-data",
                contentType: false,
                processData: false,
                data:formData,
            }) .done(function(res) {
                if(res.status == 0){
                    console.log(res.error);
                    $.each(res.error, function( index, value ) {
                        $(".error_"+index).text('');
                    });
                    $.each(res.error, function( index, value ) {
                        $(".error_"+index).text(value[0]);
                    });
                }else{
                    console.log(res);
                    $("#formSendCv")[0].reset();
                    $('#modalApply').modal('hide');
                    location.reload();
                    alert("Gửi cv thành công")
                }
            })
                .fail(function(res) {
                    console.log("res lỗi:"+res);
                    alert("Lỗi Server !!! Gửi cv thất bại !!!")
                });
        });
        $('#clickFavorite').click(function(e){
            e.preventDefault();
            let idUser = $(this).attr("data-idUser");
            let idComapany = $(this).attr("data-idComapany");
            let url = $(this).attr("data-url");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:  url ,
                type:'POST',
                dataType:"json",
                data:{
                    idUser:idUser,
                    idCompany:idComapany,
                },
            }) .done(function(res) {
                if(res.status == 200){
                    if(res.code == 1){
                        $(".iheart").addClass("active-heart");
                        alert("Bạn vừa vote yêu thích cho công ty thành công");
                    }else{
                        $(".iheart").removeClass("active-heart");
                        alert("Bạn vừa hủy vote yêu thích cho công ty");
                    }
                }else{
                    alert(res.message);
                }
            })
                .fail(function(res) {
                    alert("Lỗi Server !!! Yêu thích công ty thất bại !!!")
                });
        });
    </script>
@endpush
