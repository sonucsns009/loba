$(window).scroll(function(){
    if ($(this).scrollTop() > 50) {
       $('#topnav').addClass('nav-sticky');
    } else {
       $('#topnav').removeClass('nav-sticky');
    }
});




 /*===========================================

                        WOW

    =============================================*/

    function wowAnimation() {
        new WOW({
            offset: 100,
            animateClass: "animated",
            mobile: true,
        }).init();
    }
    wowAnimation();
/*===========================================

                        Preloader

    =============================================*/

    $(window).on("load", function () {
        $("#status").fadeOut();
        $("#preloader").delay(550).fadeOut("slow");
        $("body").delay(550).css({
            overflow: "visible",
        });
    });

/*===========================================
                      Carousel

    =============================================*/

   $('.owl-carousel').owlCarousel({                
      loop:true,
                margin: 30,
                items: 3,
                nav:true,
                autoplay: true,
                smartSpeed: 1500,
                dots:true,                
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                    },
                    430: {
                        items: 2, 
                    },
                    768: {
                        items: 2, 
                    },
                    992: {
                        items: 3,
                    }
                }
   })

/*===========================================
                      image upload

    =============================================*/

   jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('.upload__inputfile').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}
/*===========================================
                      End image upload

    =============================================*/