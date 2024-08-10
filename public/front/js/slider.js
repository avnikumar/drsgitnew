$(document).ready(function() {
  $(".banner-slider").slick({
    dots: true,
    infinite: true,
    arrows: false,
    autoplay: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    responsive: [{
      breakpoint: 991,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    },{
      breakpoint: 767,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    },{
      breakpoint: 560,
      settings: {
        dots: true,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
      }
    }]
  });
});
$(document).ready(function() {
  $("#services-slider").slick({
    dots: true,
    infinite: true,
    arrows: false,
    autoplay: false,
    slidesToShow: 6,
    slidesToScroll: 1,
    autoplaySpeed: 2000,
    responsive: [{
      breakpoint: 991,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
      }
    },{
      breakpoint: 767,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true,
      }
    },{
      breakpoint: 560,
      settings: {
        dots: true,
        arrows: false,
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
      }
    }]
  });
});
$(document).ready(function() {
    $("#hospital-slider").slick({
      dots: false,
      infinite: true,
      arrows: true,
      autoplay: true,
      slidesToShow: 4,
      prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
      nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>',
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      responsive: [{
        breakpoint: 991,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 767,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 560,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 420,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      }]
    });
  });

  $(document).ready(function() {
    $("#health-product-slider").slick({
      dots: false,
      infinite: true,
      arrows: true,
      autoplay: false,
      slidesToShow: 5,
      prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-angle-left"></i></button>',
      nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-angle-right"></i></button>',
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      responsive: [{
        breakpoint: 1200,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 991,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 767,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 460,
        settings: {
          dots: false,
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      }]
    });
  });

  $(document).ready(function() {
    $(".network-slider").slick({
      dots: true,
      infinite: true,
      arrows: false,
      autoplay: false,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      responsive: [{
        breakpoint: 1400,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 5,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 1200,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 992,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 767,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
        breakpoint: 430,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        }
      }]
    });
  });

  $(document).ready(function() {
    $(".countries-slider").slick({
      dots: false,
      infinite: true,
      arrows: false,
      autoplay: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      responsive: [{
        breakpoint: 1200,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 991,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 767,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          infinite: true,
        }
      },{
        breakpoint: 460,
        settings: {
          dots: false,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        }
      }]
    });
  });
  $(document).ready(function() {
    $(".concerns-slider").slick({
      dots: true,
      infinite: true,
      arrows: false,
      autoplay: false,
      slidesToShow: 7,
      slidesToScroll: 7,
      autoplaySpeed: 2000,
      responsive: [{
        breakpoint: 1200,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 5,
          slidesToScroll: 5,
          infinite: true,
        }
      },{
        breakpoint: 991,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
        }
      },{
        breakpoint: 767,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
        }
      },{
        breakpoint: 460,
        settings: {
          dots: true,
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
        }
      }]
    });
  });