var hero_slide_selector = $('.hero-slide-container'),
  tile_selector = $('.tile-item-container'),
  single_slide = $('.single-slide-inner');

const heroSlide = () => {
  hero_slide_selector.each(function (idx) {
    var id = $(this).parent().attr('id');
    if (!id) {
      id = "hero_slide_" + (idx + 1);
      $(this).parent().attr('id', id);
    }
    var $carousel_id = $('#' + id).find('.hero-slide-container');
    $carousel_id.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      infinite: true,
      arrows: false,
      speed: 600,
      dots: true,
      dotsClass: 'item-dots',
      appendDots: $carousel_id.parent().find('.slide-dots')
    });
  });
};

const multiItemSlide = () => {
  tile_selector.each(function (idx) {
    var id = $(this).parent().attr('id');
    if (!id) {
      id = "tile_slide_" + (idx + 1);
      $(this).parent().attr('id', id);
    }
    var $tile_id = $('#' + id).find('.tile-item-container');
    $tile_id.slick({
      dots: false,
      arrows: true,
      appendArrows: $tile_id.parent().find('.carousel-navigation'),
      prevArrow: '<div class="arrow prev"></div>',
      nextArrow: '<div class="arrow next"></div>',
      infinite: true,
      speed: 600,
      slidesToShow: 3,
      slidesToScroll: 3,
      responsive: [
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
            centerMode: true,
            centerPadding: '27px',
            dotsClass: 'item-dots',
            appendDots: $tile_id.parent().find('.slide-dots')
          }
        }
      ]
    });
  });
}

const singleSlide = () => {
  single_slide.each(function (idx) {
    var id = $(this).attr('id');
    if (!id) {
      id = "single_slide_" + (idx + 1);
      $(this).attr('id', id);
    }
    var $carousel_id = $('#' + id);
    $carousel_id.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      infinite: true,
      arrows: false,
      speed: 600,
      dots: true,
      dotsClass: 'item-dots',
      appendDots: $carousel_id.parent().find('.slide-dots')
    });
  });
};

const init = () => {
  if (!hero_slide_selector.length) {
    return;
  } else {
    heroSlide();
  }
  multiItemSlide();
  singleSlide();
}

export {init}