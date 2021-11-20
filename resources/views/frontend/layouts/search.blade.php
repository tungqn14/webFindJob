<section class="banner-bg">
    <h1>Công nghệ dẫn đầu cuộc chơi</h1>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <section class="search-sec">
            <div class="container">
                <form method="get" action="{{  route("action.search") }}">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-0">
                                    <input type="text" name="textSearch" class="form-control search-slt" id="textSearch" placeholder="Nhập từ khóa tìm kiếm">
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <?php $locations  =\App\Model\Location::all(); ?>
                                    <select class="form-control search-slt" name="textLocation" id="textLocation">
                                        @foreach($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                                    <button type="submit" class="btn btn-danger wrn-btn">Tìm kiếm việc</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        </div>
      </div>
    </div>
</section>
@push("custom-scripts")
    <script>
        // $('#btnSearch').click(function(e){
        //     e.preventDefault();
        //     console.log("okok");
        //     let textLocation = $("#textLocation").val();
        //     let textSearch = $("#textSearch").val();
        //     let url = $(this).attr('data-url');
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         url:  url ,
        //         type:'get',
        //         dataType:"json",
        //         data:{
        //             textLocation: textLocation,
        //             textSearch: textSearch,
        //         },
        //         beforeSend: function() {
        //            console.log(url);
        //         },
        //     }) .done(function(res) {
        //         console.log("okok");
        //         console.log(res);
        //     })
        //         .fail(function(res) {
        //             alert("Lỗi Server !!! Thêm mới thất bại !!!")
        //         });
        // });
    </script>
@endpush
