@php $about = get_field('about') @endphp

<div class="front-page__about">
  <div class="front-page__about-wrapper">
    <div class="front-page__about-image">
      <img src="{!! $about['about_img'] !!}" alt="" class="front-page__about-image-img">
    </div>
    <div class="front-page__about-textarea full-width-outside">
      <h2 class="front-page__about-textarea-title">{!! $about['about_title'] !!}</h2>
      <div class="front-page__about-textarea-content">{!! $about['about_text'] !!}</div>
    </div>
  </div>
</div>
