@inject('CheckData', 'App\Http\Controllers\frontend\ProfileController')
@extends("frontend.recruiments.master")
@section("contentRecruiment")
    <main class="bg-white shadow-lg p-3 mb-5 bg-white rounded">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="d-flex justify-content-between">
                        <h3 class="d-inline-block">Danh sách các tin đã đăng</h3>
                        @if($checkVip[0]->vip == 1)
                            @if($checkVip[0]->user_post_count >= 5)
                                <p class="d-inline-block" style="color: red;font-style: italic">Số lượng đăng bài của bạn đã hết ! Bạn không thể đăng bài thêm nữa  </p>
                            @else
                                <a href="{{ route("ManagePost.createPost") }}" class="btn btn-success text-decoration-none"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
                            @endif
                        @else
                            @if($checkVip[0]->user_post_count >= 3)
                                <p class="d-inline-block" style="color: red;font-style: italic">Số lượng đăng bài của bạn đã hết ! Bạn không thể đăng bài thêm nữa  </p>
                            @else
                                <a href="{{ route("ManagePost.createPost") }}" class="btn btn-success text-decoration-none"><i class="fas fa-plus mr-1"></i>Thêm mới</a>
                            @endif
                        @endif
                    </div>
                    @if($checkVip[0]->vip == 1)
                        @if($checkVip[0]->user_post_count >= 5)
                            <p class="d-block my-2" style="color: royalblue;font-style: italic">Công ty bạn đang là vip ! Bạn chỉ có thể đăng 5 bài viết </p>
                        @endif
                    @else
                        @if($checkVip[0]->user_post_count >= 3)
                            <p class="d-block my-2" style="color: royalblue;font-style: italic">Bạn chỉ có thể đăng 3 bài viết </p>
                        @endif
                    @endif
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <table class="table mt-3">
                            <thead>
                            <tr>
                                <th class="text-center">Bài đăng</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                <td>
                                   <div class="m-1">
                                       <b class="mr-2">Tiêu đề :</b> {{ $post->titlePost }}
                                   </div>
                                    <div class="m-1">
                                            <b class="mr-2">Địa chỉ :</b><span class="text-dark">{{ $user->address }}</span>
                                    </div>
                                    <?php
                                    $dt = \Carbon\Carbon::now();
                                    ?>
                                    @if($dt->format("d/m/Y") == $post->deadline)
                                        <div class="m-1">
                                            <b class="mr-2">Ngày tuyển dụng :</b><span class="text-dark">Hết hạn</span>
                                        </div>
                                    @else
                                        <div class="m-1">
                                            <b class="mr-2">Ngày tuyển dụng :</b><span class="text-dark">{{ $post->deadline }}</span>
                                        </div>
                                    @endif

                                    <div class="m-1">
                                        @if(is_numeric($post->wage))
                                            <b class="mr-2">Mức lương :</b><span class="text-danger">{{  number_format($post->wage, 0, '', ',')  }} VNĐ</span>
                                        @else
                                            <b class="mr-2">Mức lương :</b><span class="text-danger">{{ $post->wage   }} </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="text-center">
                                    <a href="#" class="text-dark text-decoration-none mr-2" data-toggle="modal" data-target="#see_{{ $post->id_post   }}" ><i class="fas fa-eye "></i>Xem</a>
                                    <div class="text-left modal fade" id="see_{{ $post->id_post   }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="width: 750px;left: -134px;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông tin chi tiết </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div class="my-2">
                                                      <b class="mr-1">Tiêu đề bài viết:</b>{{ $post->titlePost }}
                                                  </div>
                                                    <div class="my-2">
                                                        <b class="mr-1">Số lượng:</b>{{ $post->quantity }}
                                                    </div>
                                                    @if($dt->format("d/m/Y") == $post->deadline)
                                                        <div class="my-2">
                                                            <b class="mr-1">Ngày tuyển dụng:</b>Hết hạn
                                                        </div>
                                                    @else
                                                        <div class="my-2">
                                                            <b class="mr-1">Ngày tuyển dụng:</b>{{ $post->deadline }}
                                                        </div>
                                                    @endif

                                                    <div class="my-2">
                                                        <b class="mr-1">Lương:</b>{{ $post->wage }}
                                                    </div>
                                                    <div class="my-2">
                                                        <b class="mr-1">Mô tả:</b>{!! $post->desPost !!}
                                                    </div>
                                                    <div class="my-2">
                                                        <b class="mr-1">Yêu cầu:</b>{!! $post->reqPost !!}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="text-dark text-decoration-none mr-2" href="{{ route("ManagePost.edit",["id"=>$post->id_post]) }}"><i class="fas fa-pencil-alt "></i>Sửa</a>
                                    <a class="text-dark text-decoration-none" onclick="return confirm('Bạn có chắc là muốn xóa không ?')" href="{{ route("ManagePost.delete",["id"=>$post->id_post]) }}"><i class="fas fa-trash"></i>Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
