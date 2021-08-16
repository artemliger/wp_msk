import '../pagify/pagify'

export default {
  init() {
    // JavaScript to be fired on all pages
    this.objectsPage();
    this.objectsPagination();
    this.objectsSingleSlider();
    this.productTab();
    this.productSlider();
    this.phoneMask();
    this.labelClass();
    this.callModal();
    this.newsPagination();
    this.scroll();
    this.test();
    this.dropMenu();
    this.frontClientsSlider();
    this.serviceSlider();
    this.objectsSingleRelatedSlider();
  },

  objectsPage() {
    let tabItem = '.objects-page__main-tabs-item';
    let cardsItem = '.objects-page__main-content_item';
    /* делаем первый таб активным */
    if ($('.item--active').length < 1) {
      $(tabItem + ':first-of-type').addClass('item--active');
      $(cardsItem).fadeIn(100);
    }

    /* клик по любому табу */
    $(tabItem + ':not(:first-of-type)').click(function () {
      /* убираем активность с перового таба */
      $(tabItem).removeClass('item--active');
      /* делаем таб активным */
      $(this).addClass('item--active');
      /* делаем все карточки с идентичным id активными, остальные убираем */
      $(cardsItem).fadeOut(100);
      $(cardsItem + '[data-id="' + $(this).data('name') + '"]').fadeIn(100);
      /* проверяем, если нет выбранных табов то выыводим вновь все и делаем первый таб активным */
      if ($('.item--active').length < 1) {
        $(tabItem + ':first-of-type').addClass('item--active');
        $(cardsItem).fadeIn(100);
      }
    });

    /* клик по первому табу "Все объекты" */
    $(tabItem + ':first-of-type').click(function () {
      $(tabItem).removeClass('item--active');
      $(this).addClass('item--active');
      $(cardsItem).fadeIn(100);
    });
  },

  objectsPagination() {
    $('.objects-page__main-content').pagify(9, '.objects-page__main-content_item');
  },

  objectsSingleSlider() {
    let slider = $('.objects-single-page__main-slider');
    slider.addClass('owl-carousel')
      .owlCarousel({
        center: false,
        loop: true,
        margin: 0,
        nav: true,
        dots: true,
        items: 1,
        autoplay: false,
        autoplayTimeout: 7500,
        autoplayHoverPause: false,
        autoHeight: false,
        autoplaySpeed: 1000,
        navSpeed: 2000,
        mouseDrag: true,
        touchDrag: true,
      });

    $('.owl-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
      //if (!e.namespace || e.property.name != 'position') return
      $('.owl-dots').text(e.relatedTarget.relative(e.item.index) + 1 + '/' + e.item.count)
    });

    setTimeout(function() {
      $('.objects-single-page__main-slider').trigger('refresh.owl.carousel');
    }, 150);
  },

  productTab() {
    let tabItem = '.production-page__price-tabs-item';
    let contentItem = '.production-page__price-table';

    $(tabItem + ':first-of-type').addClass('item--active')
    $(tabItem + ':not(:first-of-type)').removeClass('item--active')
    /* клик по любому табу */
    $(tabItem).click(function () {
      /* убираем активность с перового таба */
      /*$(tabItem).removeClass('item--active');*/
      /* делаем таб активным */
      $(this).toggleClass('item--active');
      /* первый блок в топку */
      $(contentItem).fadeOut(0);
      /* ищем блок с идентичным свойством data-name для отображения */
      $(contentItem + '[data-name="' + $(this).data('name') + '"]').fadeToggle(100);
      /* проверяем, если нет выбранных табов то выыводим вновь все и делаем первый таб активным */
      if ($('.item--active').length < 1) {
        $(tabItem).addClass('item--active');
      }
    });

    /* клик по первому табу */
    $(tabItem).click(function () {
      $(tabItem).removeClass('item--active');
      $(this).addClass('item--active');
    });
  },

  productSlider() {
    let slider3 = $('.production-page__product-content');

    slider3.addClass('owl-carousel')
      .owlCarousel({
        center: false,
        loop: false,
        margin: 40,
        nav: true,
        dots: false,
        items: 3,
        autoplay: true,
        autoplayTimeout: 4500,
        autoplayHoverPause: false,
        autoHeight: false,
        autoplaySpeed: 1000,
        navSpeed: 2000,
        mouseDrag: true,
        touchDrag: true,
        responsive: {
          0: {
            items: 1,
            margin: 0,
          },
          600: {
            items: 2,
          },
          768: {
            items: 2,
          },
          990: {
            items: 3,
          },
        },
      });

    $('.production-page__product-item-image img').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true,
        tCounter: '%curr% из %total%',
      },
      callbacks: {
        elementParse: function (qw) {
          qw.src = qw.el.attr('src');
        },
      },
    });

    $('.services-page__gallery-item-image img').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true,
        tCounter: '%curr% из %total%',
      },
      callbacks: {
        elementParse: function (qw) {
          qw.src = qw.el.attr('src');
        },
      },
    });
  },

  phoneMask() {
    $('input[type="tel"]').mask('+7 (999) 999-9999');
  },

  labelClass() {
    $('.wpcf7-form-wrapper-checkbox label').click(function (e) {
      e.preventDefault();
      $(this).toggleClass('checked');
      if ($(this).hasClass('checked')) {
        $(this).find('input').prop('checked', true);
      } else {
        $(this).find('input').prop('checked', false);
      }
    });
  },

  callModal() {
    $('.banner__info-call-modal, .bell-modal').on('click', function (e) {
      e.preventDefault();
      $('.modal__wrapper').fadeIn(250);
      $('#wpcf7-f226-o1').fadeIn(250);
      $('#wpcf7-f226-o2').fadeIn(250);
      $('#wpcf7-f226-o3').fadeIn(250);
    });

    $('.request-modal, .vacancies-page__main-item-content_footer-link').on('click', function (e) {
      e.preventDefault();
      $('.modal__wrapper').fadeIn(250);
      $('#wpcf7-f227-o1').fadeIn(250);
      $('#wpcf7-f227-o2').fadeIn(250);
      $('#wpcf7-f227-o3').fadeIn(250);
    });

    $('.modal__wrapper, .modal__block-close-modal').on('click', (e) => {
      if ($(e.target).hasClass('modal__wrapper') || $(e.target).hasClass('modal__block-close-modal')) {
        $('.modal__wrapper').fadeOut(250);
        $('.modal__block > .wpcf7').fadeOut(250);
      }
    });
  },

  newsPagination() {
    $('.post-page__list').pagify(6, '.post-page__list-item');
  },

  scroll() {
    /* //нужна доработка
    let $page = $('html, body');
    let hash = window.location.hash;
    window.scrollTo(0,420)
    if(hash !== '') $('a[href^='+hash+']').click(function() {
      $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 150,
      }, 600);
      return false;
    });
    */

    /*
    $('a[href*="#"]').click(function() {
      $page.animate({
        scrollTop: $($.attr(this, 'href')).offset().top - 150,
      }, 600);
      return false;
    });
    */
  },

  test() {
    /*
    $('.services-page__sidebar-content_item-link').each(function() {
      let myURL = $(this).attr('href'),
        pageURL = window.location.url;
      if(myURL === pageURL) {
        $(this).addClass('active');
      }
    })
    */
  },

  dropMenu() {
    if ($(window).width() < 1220) {
      $('.banner__nav-primary-list > .menu-item-has-children > a').click(function(e) {
        e.preventDefault();
        //let href = $(this).attr('href');
        if($(this).hasClass('active-sub-menu')){
          $(this).siblings('.sub-menu').css('display','none');
          //document.location.href = href;
        } else {
          $('.banner__nav-primary-list > .menu-item-has-children > a').removeClass('active-sub-menu');
          $('.banner__nav-primary-list > .menu-item-has-children > .sub-menu').css('display','none');
          $(this).addClass('active-sub-menu');
          $(this).siblings('.sub-menu').css('display','flex');
        }
      })
    }
  },

  frontClientsSlider() {
    /*
    var context = $('.front-page__partners-content');

    if ($(window).width() >= 989 && $(window).width() < 1160) {
      while( context.children('div:not(.front-page__partners-content-list)' ).length) {
        context.children('div:not(.front-page__partners-content-list):lt(6)').wrapAll('<div class="front-page__partners-content-list">');
      }
    } else if ($(window).width() >= 768 && $(window).width() < 989) {
      while( context.children('div:not(.front-page__partners-content-list)' ).length){
        context.children('div:not(.front-page__partners-content-list):lt(6)').wrapAll('<div class="front-page__partners-content-list">');
      }
    } else if($(window).width() >= 560 && $(window).width() < 768) {
      while( context.children('div:not(.front-page__partners-content-list)' ).length){
        context.children('div:not(.front-page__partners-content-list):lt(4)').wrapAll('<div class="front-page__partners-content-list">');
      }
    } else if($(window).width() >= 0 && $(window).width() < 560) {
      while( context.children('div:not(.front-page__partners-content-list)' ).length){
        context.children('div:not(.front-page__partners-content-list):lt(4)').wrapAll('<div class="front-page__partners-content-list">');
      }
    } else {
      while( context.children('div:not(.front-page__partners-content-list)' ).length){
        context.children('div:not(.front-page__partners-content-list):lt(5)').wrapAll('<div class="front-page__partners-content-list">');
      }
    }
    $(document).ready(function() {
      let slider4 = $('.front-page__partners-content');

      function callSlider() {
        if (slider4.children().length >= 0) {
          slider4.addClass('owl-carousel')
            .owlCarousel({
              center: false,
              loop: true,
              margin: 5,
              nav: false,
              dots: false,
              items: 1,
              autoplay: true,
              autoplayTimeout: 8000,
              autoplayHoverPause: false,
              autoplaySpeed: 2000,
              navSpeed: 2000,
              mouseDrag: true,
              touchDrag: true,
              responsive: {
                0: {
                  items: 1,
                },
                560: {
                  items: 1,
                },
                768: {
                  items: 1,
                },
                992: {
                  items: 1,
                },
              },
            })
        }
      }

      $(window).resize(function () {
        if ($(window).width() <= 1160) {
          callSlider();
        } else {
          slider4.removeClass('owl-carousel')
            .trigger('destroy.owl.carousel');
        }
      });

      if ($(window).width() <= 1160) {
        callSlider();
      }
    })
    */

    let slider4 = $('.front-page__partners-content');

    if (slider4.children().length >= 11) {
      slider4.addClass('owl-carousel')
        .owlCarousel({
          center: false,
          loop: true,
          margin: 0,
          nav: false,
          dots: false,
          items: 1,
          autoplay: true,
          autoplayTimeout: 8000,
          autoplayHoverPause: false,
          autoplaySpeed: 2000,
          navSpeed: 2000,
          mouseDrag: true,
          touchDrag: true,
          responsive: {
            0: {
              items: 2,
            },
            560: {
              items: 3,
            },
            768: {
              items: 4,
            },
            989: {
              items: 5,
            },
          },
        })
    }

    /*
    $(window).resize(function () {
      if ($(window).width() <= 1160) {
        callSlider();
      } else {
        slider4.removeClass('owl-carousel')
          .trigger('destroy.owl.carousel');
      }
    });

    if ($(window).width() <= 1160) {
      callSlider();
    }
    */
  },

  serviceSlider() {
    let slider5 = $('.services-page__related-content');

    function callSlider() {
      if (slider5.children().length >= 0) {
        slider5.addClass('owl-carousel')
          .owlCarousel({
            center: false,
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            items: 3,
            autoplay: true,
            autoplayTimeout: 9500,
            autoplayHoverPause: false,
            autoplaySpeed: 2000,
            navSpeed: 2000,
            mouseDrag: true,
            touchDrag: true,
            responsive: {
              0: {
                items: 1,
              },
              560: {
                items: 2,
              },
              989: {
                items: 3,
              },
            },
          })
      }
    }

    $(window).resize(function () {
      if ($(window).width() <= 1220) {
        callSlider();
      } else {
        slider5.removeClass('owl-carousel')
          .trigger('destroy.owl.carousel');
      }
    });

    if ($(window).width() <= 1220) {
      callSlider();
    }
  },

  objectsSingleRelatedSlider() {
    let slider6 = $('.objects-single-page__related-content');

    function callSlider() {
      if (slider6.children().length >= 0) {
        slider6.addClass('owl-carousel')
          .owlCarousel({
            center: false,
            loop: true,
            margin: 30,
            nav: false,
            dots: false,
            items: 3,
            autoplay: true,
            autoplayTimeout: 9500,
            autoplayHoverPause: false,
            autoplaySpeed: 2000,
            navSpeed: 2000,
            mouseDrag: true,
            touchDrag: true,
            responsive: {
              0: {
                items: 1,
              },
              560: {
                items: 2,
                margin: 20,
              },
              989: {
                items: 3,
              },
            },
          })
      }
    }

    $(window).resize(function () {
      if ($(window).width() <= 1220) {
        callSlider();
      } else {
        slider6.removeClass('owl-carousel')
          .trigger('destroy.owl.carousel');
      }
    });

    if ($(window).width() <= 1220) {
      callSlider();
    }
  },

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.navi').on('click', function (e) {
      e.preventDefault();
      $(this).toggleClass('navi--active');
      $('.banner__nav-primary').toggleClass('banner__nav-primary--active');
    });

    $('.footer-service-title').on('click', function (e) {
      e.preventDefault();
      //$(this).toggleClass('active');
      $('#menu-nizhnee-menyu-uslugi').toggleClass('active');

      if ($('#menu-nizhnee-menyu-uslugi').hasClass('active')) {
        $(this).addClass('hide');
      } else {
        $(this).removeClass('hide');
      }

    });

    $('.footer-product-title').on('click', function (e) {
      e.preventDefault();
      //$(this).toggleClass('active');
      $('#menu-nizhnee-menyu-produkcziya').toggleClass('active');

      if ($('#menu-nizhnee-menyu-produkcziya').hasClass('active')) {
        $(this).addClass('hide');
      } else {
        $(this).removeClass('hide');
      }

    });
  },
};
