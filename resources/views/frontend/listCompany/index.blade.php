@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
    <main class="bg-white">
        <article class="content-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="title-header">Các công ty phổ biến</h3>
                    </div>
                    @foreach($companys as $company)
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                <div class="block-company my-4">
                                    <div class="left-img">
                                        <img src="{{ $company->logo }}" alt="Image"/>
                                    </div>
                                    <a href="{{ route("home.detail",["id"=>$company->userPost[0]["id_post"]]) }}" class="description">
                                        <h3 class="title-post" title="{{ $company->nameCompany }}">{{ $company->nameCompany }} </h3>
                                        <p class="address"> {{ $company->location->name }} </p>
                                    </a>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </article>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-center my-4">
                    {{ $companys->links() }}
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
