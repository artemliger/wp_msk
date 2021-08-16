<header class="banner">
  <div class="banner__header">
    <a class="banner__header-logo" href="{{ home_url('/') }}">
      <img src="{!! get_field('logo', 'options') !!}" class="banner__header-logo-img" alt="{!! the_title() !!}">
      @if(get_field('logo_title', 'options'))
        <h3 class="banner__header-logo-title">{!! get_field('logo_title', 'options') !!}</h3>
      @endif
    </a>

    <nav class="banner__nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'banner__nav-primary-list']) !!}
      @endif
    </nav>

    <div class="banner__info">
      <address class="banner__info-contact">
        <a href="tel:{!! get_field('phone_inner', 'options') !!}" class="banner__info-contact_phone">
          {!! get_field('phone_outer', 'options') !!}
        </a>
      </address>

      <div class="banner__info-call-modal">Заказать звонок</div>
    </div>

    <a href="#nowhere" class="navi"></a>
  </div>
</header>
