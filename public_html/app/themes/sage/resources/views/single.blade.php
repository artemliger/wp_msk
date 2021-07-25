@extends('layouts.app')

@php $single_news = get_field('single_news') @endphp

@section('content')
  <article class="blog-page">
    <h1 class="blog-page__title">{!! get_the_title() !!}</h1>
    <div class="blog-page__content">
      @if($single_news['single_news_image'] || get_the_post_thumbnail_url())
        <div class="blog-page__content-text">{!! $single_news['single_news_text1'] !!}</div>
        <div class="blog-page__content-image">
          @if($single_news['single_news_image'])
            <img class="blog-page__content-image-img" src="{!! $single_news['single_news_image'] !!}"
                 alt="{!! get_the_title() !!}">
          @else
            <img class="blog-page__content-image-img" src="{!! get_the_post_thumbnail_url() !!}"
                 alt="{!! get_the_title() !!}">
          @endif
        </div>
      @else
        <div class="blog-page__content-text" style="max-width: 100%;">{!! $single_news['single_news_text1'] !!}</div>
      @endif
    </div>
    <div class="blog-page__textarea">{!! $single_news['single_news_text2'] !!}</div>
    <div class="blog-page__footer">
      <div class="blog-page__footer-date">{!! get_the_date(); !!}</div>
      <div class="blog-page__footer-links">
        <?php previous_post_link('%link', 'Предыдущая', true); ?>
        <?php next_post_link('%link', 'Следующая', true); ?>
      </div>
    </div>
  </article>
@endsection
