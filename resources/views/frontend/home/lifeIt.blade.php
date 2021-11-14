@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
    <main class="bg-white">
        <article class="life-it">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="title-header">Tất cả các bài viết </h3>
                    </div>
                    @foreach($blogs as $blog)
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <div class="card my-4" >
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
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-center my-4">
                    {{ $blogs->links() }}
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
