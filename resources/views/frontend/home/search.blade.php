
@extends("frontend.layouts.master")
@include("frontend.layouts.search")
@section("main")
    <main class="bg-white">
        <article class="content-hot">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h3 class="title-header">Tìm kiếm</h3>
                    </div>
{{--                    @dd($dataSearch)--}}
                    @if($dataSearch->count() > 0)
                        @foreach($dataSearch as $item)
{{--                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">--}}
{{--                                <div class="block-company my-4">--}}
{{--                                    <div class="left-img">--}}
{{--                                        <img src="{{ asset("frontend/image-recruiment-logo/".$item->logo) }}" alt="Image"/>--}}
{{--                                    </div>--}}
{{--                                    <a href="{{ route("home.detail",["id"=>$item->id_post]) }}" class="description">--}}
{{--                                        <h3 class="title-post" title="{{ $item->nameCompany }}">{{ $item->nameCompany }} </h3>--}}
{{--                                        <p class="address"> {{$item->name }} </p>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="block-post">
                                    <div class="left-img">
                                        <img src="{{$item->logo }}" alt="Image"/>
                                    </div>
                                    <a href="{{ route("home.detail",["id"=>$item->id_post]) }}" class="description">
                                        <h3 class="title-post">{{ $item->titlePost }} </h3>
                                        <span class="title-deal-gross">Địa chỉ : </span>  <span class="address">{{ $item->name }} </span>
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
                    @else
                        <p>Không có kết quả tìm kiếm</p>
                    @endif
                </div>
            </div>
        </article>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="d-flex justify-content-center my-4">
                    {{ $dataSearch->links() }}
                </div>
            </div>
        </div>
    </main>


@endsection
@push("custom-scripts")
    <script>

    </script>
@endpush
