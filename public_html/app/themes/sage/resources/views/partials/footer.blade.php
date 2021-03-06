<footer class="content-info">
  <div class="content-info__footer-head">
    <a href="#" class="content-info__footer-head-button bell-modal">Заказать звонок</a>
    <a href="#" class="content-info__footer-head-button request-modal">Оставить заявку</a>
  </div>
  <div class="content-info__footer">
    <nav class="content-info__footer-navigation content-info__footer-navigation-main">
      @if (has_nav_menu('footer_navigation'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'footer__nav-list footer__nav-list-main']) !!}
      @endif
    </nav>
    <nav class="content-info__footer-navigation content-info__footer-navigation-service">
      <span class="content-info__footer-title footer-service-title">Услуги</span>
      @if (has_nav_menu('footer_navigation_service'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation_service', 'menu_class' => 'footer__nav-list footer__nav-list-service']) !!}
      @endif
    </nav>
    <nav class="content-info__footer-navigation content-info__footer-navigation-product">
      <span class="content-info__footer-title footer-product-title">Продукция</span>
      @if (has_nav_menu('footer_navigation_product'))
        {!! wp_nav_menu(['theme_location' => 'footer_navigation_product', 'menu_class' => 'footer__nav-list footer__nav-list-product']) !!}
      @endif
    </nav>
    <div class="content-info__footer-contacts">
      <span class="content-info__footer-title">Контакты</span>
      <a href="tel:{!! get_field('phone_inner', 'options') !!}" class="content-info__footer-contacts-item content-info__footer-contacts_phone">
        {!! get_field('phone_outer', 'options') !!}
      </a>
      @if(get_field('phone_inner_add', 'options') && get_field('phone_outer_add', 'options'))
      <a href="tel:{!! get_field('phone_inner_add', 'options') !!}" class="content-info__footer-contacts-item content-info__footer-contacts_phone">
        {!! get_field('phone_outer_add', 'options') !!}
      </a>
      @endif
      <a href="mailto:{!! get_field('email', 'options') !!}" class="content-info__footer-contacts-item content-info__footer-contacts_email">
        {!! get_field('email', 'options') !!}
      </a>
      <a href="{!! get_field('address_link', 'options') !!}" target="_blank" class="content-info__footer-contacts-item content-info__footer-link">
        {!! get_field('address', 'options') !!}
      </a>
    </div>
  </div>
  <div class="content-info__footer-bottom">
    <div class="content-info__footer-bottom-wrapper">
      <small class="content-info__footer-bottom-item content-info__footer-bottom-copyright">© 2021 ООО «Стройсталь» проектирование, изготовление и монтаж металлоконструкций</small>
      <span class="content-info__footer-bottom-item">
      <a href="/privacy" class="content-info__footer-bottom-item-link" rel="nofollow noopener noreferrer" target="_blank">Политика конфиденциальности</a>
    </span>
    </div>
  </div>
</footer>

<div class="modal__wrapper">
  <div class="modal__block">
    <span class="modal__block-close-modal modal__block-close-modal--form"></span>
    {!! do_shortcode('[contact-form-7 id="226" title="Заказать звонок"]') !!}
    {!! do_shortcode('[contact-form-7 id="227" title="Форма | Оставьте заявку"]') !!}
  </div>
</div>

<script async defer>
  /*
  document.body.scrollTop = 0;

  let window.scrolled = false;
  $(document).one('ready scroll hashchange', function(e) {
    if(window.scrolled != false || location.hash.length == 0) return;

    e.preventDefault();

    let name = location.hash.substr(1);
    let el = $('#'+name+', [name='+name+']');

    console.log(el);

    if(el.size()>0)
    {
      $('body, html').animate({
        scrollTop: el.offset().top
      }, 3000);

      window.scrolled = true;
    }

  });
  */
</script>
