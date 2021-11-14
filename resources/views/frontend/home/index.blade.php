
@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
    <main class="bg-white">
        <article class="content-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="title-header">Việc làm hot nhất </h3>
                    </div>
                    @foreach($postHot as $post)
                        @foreach($post->userPost as $item)
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="block-post">
                                <div class="left-img">
                                    <img src="{{ asset("frontend/image-recruiment-logo/".$post->logo) }}" alt="Image"/>
                                </div>
                                <a href="{{ route("home.detail",["id"=>$item->id_post]) }}" class="description">
                                    <h3 class="title-post">{{ $item["titlePost"] }} </h3>{{$post->wage}}
                                    <p class="address">{{ $post->location->name }} </p>
                                    <div class="d-flex justify-content-between">
                                        <div class="salary">
                                            <span class="title-deal-gross">Mức lương : </span>
                                            @if(is_numeric($item->wage))
                                                <span class="deal-gross">{{ number_format($item->wage, 0, '', ',')." VNĐ" }}</span>
                                            @else
                                                <span class="deal-gross">Thỏa thuận</span>
                                            @endif
                                        </div>
                                        <?php
                                        $dt = \Carbon\Carbon::now();
                                        ?>
                                        @if($dt->format("d/m/Y") == $item->deadline)
                                        <span class="time">
                                                 <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i> Hết hạn
                                        </span>
                                        @else
                                    <span class="time">
                                        <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i>  {{ $item->deadline }}
                                    </span>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                         @endforeach
                    @endforeach
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="block-post">
                <div class="left-img">
                    <img src="image/TopDev-CMCGlobal-Logo-1626313776.jpg" alt="Image"/>
                </div>
                <a href="details.html" class="description">
                    <h3 class="title-post">12 Java Developers (AngularJS, SQL) | Up to $2,000 (AngularJS, Java, Full-Stack, Spring) </h3>
                    <p class="address"> Quận Cầu Giấy, Hà Nội </p>
                    <div class="d-flex justify-content-between">
                        <div class="salary">
                            <span class="title-deal-gross">Mức lương : </span>
                            <span class="deal-gross">Thỏa thuận</span>
                        </div>
                        <span class="time">
                        <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i>  31/12/1999 </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</article>
<div class="banner-ad">
<img src="{{asset("frontend/image/bg-qc.jpg")}}" alt="bg-qc"/>
</div>
<article class="content-hot">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="d-flex justify-content-between">
                <h3 class="title-header d-inline-block">Việc làm mới nhất </h3>
                <a href="{{ route("action.listPost") }}" style="text-decoration: underline" class="pr-5 d-inline-block pt-5 text-capitalize text-dark">Xem tất cả </a>
            </div>
        </div>
        <div class="wrapPostSlick" style="width: 100%;margin-right:50px">
            @foreach($postNormal as $post)
                @foreach($post->userPost as $item)
                        <div>
                        <div class="block-post" style="margin: 30px 20px;">
                            <div class="left-img">
                                <img height="120px" src="{{ asset("frontend/image-recruiment-logo/".$post->logo) }}" alt="Image"/>
                            </div>
                            <a href="{{ route("home.detail",["id"=>$item->id_post]) }}" class="description">
                                <h3 class="title-post">{{ $item["titlePost"] }} </h3>{{$post->wage}}
                                <p class="address">{{ $post->location->name }} </p>
                                <div class="d-flex justify-content-between">
                                    <div class="salary">
                                        <span class="title-deal-gross">Mức lương : </span>
                                        @if(is_numeric($item->wage))
                                            <span class="deal-gross">{{ number_format($item->wage, 0, '', ',')." VNĐ" }}</span>
                                        @else
                                            <span class="deal-gross">Thỏa thuận</span>
                                        @endif
                                    </div>
                                    <?php
                                    $dt = \Carbon\Carbon::now();
                                    ?>
                                    @if($dt->format("d/m/Y") == $item->deadline)
                                    <span class="time">
                                    <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i> Hết hạn
                                    </span>
                                    @else
                                    <span class="time">
                                    <i class="fa fa-calendar" style="margin-right:3px;color: gray;"></i>  {{ $item->deadline }}
                                    </span>
                                    @endif
                                </div>
                            </a>
                        </div>
                        </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>
</article>
<article class="life-it">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="title-header">Cuộc sống IT</h3>
        </div>
        @foreach($blogs as $blog)
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <div class="card" >
                <img class="card-img-top" src="{{ asset("frontend/image-blog/$blog->images") }}" title="Card image cap">
                <div class="card-body">
                    <a class="d-block" href="{{ route("action.detailLifeIT",["id"=>$blog->id]) }}"><h5 class="card-title">{{ $blog->titleBlogs }}</h5></a>
                    <div class="card-text">
                        {!! $blog->description !!}
                    </div>

                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
</article>

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
