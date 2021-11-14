$( document ).ready(function() {

    //Thêm mới phúc lợi
    $('#btnAddWelfare').click(function(e){
        e.preventDefault();
       let tenPhucLoi = $("#welfare_name").val();
       let iconPhucLoi = $("#welfare_icon").val();
        let url = $("#urlAddWelfare").val();
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
                welfare_icon: iconPhucLoi,
                welfare_name: tenPhucLoi,
            },
            beforeSend:function () {
                $(document).find(".form-group .errorValidate").text('');
            }
        }) .done(function(res) {
            if(res.status == 0){
                $.each(res.error, function( index, value ) {
                     $(".error_"+index).text(value[0]);
                });
            }else{
                $("#formAddWelfare")[0].reset();
                $('#themPhucloi').modal('hide');
                location.reload();
                alert("Thêm mới thành công")
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Thêm mới thất bại !!!")
            });
    });
   // show chi tiết phúc lợi
    $('.btn-edit-welfare').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  url ,
            type:'get',
            dataType:"json",
        }) .done(function(res) {
            if(res.status == 200){
                let icon = res.data.icon_welfare;
                let name = res.data.name_welfare;
                 $("#welfare_icon_update"+id).val(icon);
                 $("#welfare_name_update"+id).val(name);
            }else{
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });
    // Cập nhật phúc lợi
    $('.btn_update_welfare').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        let iconPhucLoi= $("#welfare_icon_update"+id).val();
        let tenPhucLoi = $("#welfare_name_update"+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url:  url ,
            type:'put',
            dataType:"json",
            data:{
                welfare_icon: iconPhucLoi,
                welfare_name: tenPhucLoi,
            },
        }) .done(function(res) {
            if(res.status == 200){
                $('#suaPhucloi'+id).modal('hide');
                location.reload();
                alert("Cập nhật thành công")
            }else{
                if(res.status == 0){
                    $.each(res.error, function( index, value ) {
                        $(".error_welfare_name"+id).text(value[0]);
                        $(".error_welfare_icon"+id).text(value[0]);
                    });
                }
                $('#suaPhucloi'+id).modal('show');
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });

    //Thêm mới phúc lợi
    $('#btnAddTech').click(function(e){
        e.preventDefault();
        let tenTech = $("#tech_name").val();
        let url = $(this).attr('data-url');
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
                tech_name: tenTech,
            },
            beforeSend:function () {
                $(document).find(".error_tech").text('');
            }
        }) .done(function(res) {
            if(res.status == 0){
                $.each(res.error, function( index, value ) {
                    $(".error_tech").text(value[0]);
                });
            }else{
                $("#formAddTech")[0].reset();
                $('#themCongNGhe').modal('hide');
                location.reload();
                alert("Thêm mới thành công")
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Thêm mới thất bại !!!")
            });
    });
    // show chi tiết phúc lợi
    $('.btn-edit-tech').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  url ,
            type:'get',
            dataType:"json",
        }) .done(function(res) {
            if(res.status == 200){
               let name = res.data.nameSkill;
                $("#tech_name"+id).val(name);
            }else{
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });
    // Cập nhật phúc lợi
    $('.btn_update_tech').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        let tenTech = $("#tech_name"+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  url ,
            type:'put',
            dataType:"json",
            data:{
               tech_name: tenTech            },
        }) .done(function(res) {
            if(res.status == 200){
                $('#suaTech'+id).modal('hide');
                location.reload();
                alert("Cập nhật thành công")
            }else{
                if(res.status == 0){
                    $.each(res.error, function( index, value ) {
                        $(".error_tech").text(value[0]);
                    });
                }
                $('#suaTech'+id).modal('show');
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });


    //Thêm mới nghành nghề
    $('#btnAddCareer').click(function(e){
        e.preventDefault();
        console.log("okok");
        let tenCareer = $("#career_name").val();
        let url = $(this).attr('data-url');
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
                career_name: tenCareer,
            },
            beforeSend:function () {
                $(document).find(".error_career_name").text('');
            }
        }) .done(function(res) {
            if(res.status == 0){
                $.each(res.error, function( index, value ) {
                    $(".error_career_name").text(value[0]);
                });
            }else{
                $("#formAddCareer")[0].reset();
                $('#themLinhVuc').modal('hide');
                location.reload();
                alert("Thêm mới thành công")
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Thêm mới thất bại !!!")
            });
    });

    // show chi tiết nghành nghề
    $('.btn-edit-career').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  url ,
            type:'get',
            dataType:"json",
        }) .done(function(res) {
            if(res.status == 200){
                let name = res.data.name_career;
                $("#career_name_update"+id).val(name);
            }else{
                if(res.status == 0){
                    $.each(res.error, function( index, value ) {
                        $(".error_career_name").text(value[0]);
                    });
                }
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!");
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });

    // Cập nhật nghành nghề
    $('.btn_update_career').click(function(e){
        e.preventDefault();
        let url = $(this).attr("data-url");
        let id = $(this).attr("data-id");
        let tenCareer = $("#career_name_update"+id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:  url ,
            type:'put',
            dataType:"json",
            data:{
                career_name: tenCareer            },
        }) .done(function(res) {
            if(res.status == 200){
                $('#suaNganhNghe'+id).modal('hide');
                location.reload();
                alert("Cập nhật thành công")
            }else{
                if(res.status == 0){
                    $.each(res.error, function( index, value ) {
                        $(".error_career_name").text(value[0]);
                    });
                }
                $('#suaNganhNghe'+id).modal('show');
            }
        })
            .fail(function(res) {
                alert("Lỗi Server !!! Không thể hiển thị thông tin !!!")
            });
    });








});
