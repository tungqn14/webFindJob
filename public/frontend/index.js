$( document ).ready(function() {
  $("#totalEmployee").select2({
      allowClear: true
  });
  $("#selectSkill").select2({
      placeholder: "Lựa chọn kỹ năng",
      allowClear: true
  });
  $("#selectLevel").select2();
  $("#selectTypeAction").select2();
  $("#typeTime").select2();
  $("#selectExp").select2();
  $("#selectCategory").select2({
      placeholder: "Lựa chọn nghành nghề",
      allowClear: true
  });
  $("#field_of_activity").select2();


    $('.slide-block-company').slick({
      dots: true,
      infinite: true,
      slidesToShow: 7,
      slidesToScroll: 7,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }

      ]
      // autoplay: true,
      // autoplaySpeed: 2000,
      });
      $('.slide-company-favoris').slick({
        dots: true,
        initialSlide: 4,
        infinite: false,
        adaptiveHeight: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        // responsive: [
        //   {
        //     breakpoint: 1024,
        //     settings: {
        //       slidesToShow: 3,
        //       slidesToScroll: 3,
        //       infinite: true,
        //       dots: true
        //     }
        //   },
        //   {
        //     breakpoint: 600,
        //     settings: {
        //       slidesToShow: 2,
        //       slidesToScroll: 2
        //     }
        //   },
        //   {
        //     breakpoint: 480,
        //     settings: {
        //       slidesToShow: 1,
        //       slidesToScroll: 1
        //     }
        //   }

        // ]
        // autoplay: true,
        // autoplaySpeed: 2000,
        });
    $('#aboutCompany').summernote({
      placeholder: 'Nhâp nội dung ....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ],
      codemirror: {
        theme: 'monokai'
      }
    });
    $('#motaCongViec').summernote({
      placeholder: 'Nhâp nội dung ....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ],
      codemirror: {
        theme: 'monokai'
      }
    });
    $('#yeuCauUngVien').summernote({
      placeholder: 'Nhâp nội dung ....',
      tabsize: 2,
      height: 200,
      minHeight: 100,
      maxHeight: 300,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
      ],
      codemirror: {
        theme: 'monokai'
      }
    });
});

function saveCompany(){
  $(".changeColorFa").toggleClass("changeColorFavorite" );
}

function getImagePreview(event)
{
  let image=URL.createObjectURL(event.target.files[0]);
  let imagediv= document.getElementById('preview');
  let newimg=document.createElement('img');
  imagediv.innerHTML='';
  newimg.src=image;
  newimg.width="200";
  newimg.style="border:1px solid gray;padding:5px;border-radius:5px;box-shadow:grey 1px 1px 10px 2px";
  imagediv.appendChild(newimg);
}

	$(function() {
		var header = $(".start-style");
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();

			if (scroll >= 250) {
				header.removeClass('start-style').addClass("scroll-on");

        $(".navigation-wrap").addClass("change-bg-nav");

			} else {
				header.removeClass("scroll-on").addClass('start-style');

        $(".navigation-wrap").removeClass("change-bg-nav");
			}
		});
	});

	//Animation

	$(document).ready(function() {
		$('body.hero-anime').removeClass('hero-anime');
	});

	//Menu On Hover

	$('body').on('mouseenter mouseleave','.nav-item',function(e){
			if ($(window).width() > 750) {
				var _d=$(e.target).closest('.nav-item');_d.addClass('show');
				setTimeout(function(){
				_d[_d.is(':hover')?'addClass':'removeClass']('show');
				},1);
			}
	});
