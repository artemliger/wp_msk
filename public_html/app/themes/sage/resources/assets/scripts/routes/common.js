import '../pagify/pagify'

export default {
  init() {
    // JavaScript to be fired on all pages
    this.objectsPage();
    this.objectsPagination();
    this.objectsSingleSlider();
    this.phoneMask();
    this.labelClass();
    this.callModal();
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
        nav: false,
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
      })
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

    $('.request-modal').on('click', function (e) {
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

  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
