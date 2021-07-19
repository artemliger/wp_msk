export default {
  init() {
    // JavaScript to be fired on the home page
    this.mainSlider();
    this.projectsSlider();
  },

  mainSlider() {
    let slider = $('.front-page__banner-item-slider');
    slider.addClass('owl-carousel')
      .owlCarousel({
        center: false,
        loop: true,
        margin: 0,
        nav: true,
        dots: false,
        items: 1,
        autoplay: false,
        autoplayTimeout: 7500,
        autoplayHoverPause: false,
        autoHeight: false,
        autoplaySpeed: 1000,
        navSpeed: 2000,
        mouseDrag: true,
        touchDrag: true,
      })
  },

  projectsSlider() {
    let slider2 = $('.front-page__projects-content');
    slider2.addClass('owl-carousel')
      .owlCarousel({
        center: true,
        loop: true,
        margin: 23,
        nav: true,
        dots: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 9500,
        autoplayHoverPause: false,
        autoHeight: false,
        autoplaySpeed: 3000,
        navSpeed: 2000,
        mouseDrag: true,
        touchDrag: true,
      });

    $('.owl-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
      //if (!e.namespace || e.property.name != 'position') return
      $('.owl-dots').text(e.relatedTarget.relative(e.item.index) + 1 + '/' + e.item.count)
    });

    setTimeout(function() {
      $('.front-page__projects-content').trigger('refresh.owl.carousel');
    }, 150);

    /*$('.owl-dot').each(function(){
      $(this).children('span').text($(this).index()+1);
    });*/
  },

  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
