@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
    <main class="bg-white">
        <article class="content-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="title-header">Tất cả các việc làm </h3>
                    </div>

                    @foreach($posts as $post)
                        @foreach($post->userPost as $item)
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="block-post" style="margin: 30px 20px;">
                                    <div class="left-img">
                                        <img height="120px" src="{{ $post->logo }}" alt="Image"/>
                                    </div>
                                    <a href="{{ route("home.detail",["id"=>$item->id_post]) }}" class="description">
                                        <h3 class="title-post">{{ $item["titlePost"] }} </h3>{{$post->wage}}
                                        <span class="title-deal-gross">Địa chỉ : </span>  <span class="address">{{ $post->location->name }} </span>
                                        <div class="d-flex justify-content-between">
                                            <div class="salary">
                                                <span class="title-deal-gross">Mức lương : </span>
                                                @if(is_numeric($item->wage))
                                                    <span class="deal-gross">{{ number_format($item->wage, 0, '', ',')." VNĐ" }}</span>
                                                @else
                                                    <span class="deal-gross">Thỏa thuận</span>
                                                @endif
                                            </div>
                                            <span class="time">
                        <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i>  {{ $item->deadline ?? "Chưa cập nhật" }}
                     </span>
                                        </div>
                                    </a>
                                    @if($post->vip == 1)
                                    <div class="hot">Nổi bật</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>
        </article>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-center my-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>





    </main>


@endsection
@push("custom-scripts")
    <script>
        $('.wrapPostSlick').slick({
            infinite: true,
            dots: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 2,
            slidesPerRow: 1,
            rows: 3,
            arrows:false,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                    }
                },{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
            ]
        });
    </script>
@endpush
