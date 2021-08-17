{{--
  Template Name: Наши объекты - стр. Одного объекта
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $objects_single = get_field('objects_single') @endphp
  <div class="objects-single-page">
    <div class="objects-single-page__main">
      <div class="objects-single-page__main-info">
        @if($objects_single['objects_single_heading'])
          <h1 class="objects-single-page__main-heading">{!! $objects_single['objects_single_heading'] !!}</h1>
        @else
          <h1 class="objects-single-page__main-heading">{!! the_title(); !!}</h1>
        @endif

        <div class="objects-single-page__main-content">
          {!! $objects_single['objects_single_content'] !!}
        </div>
        @if($objects_single['objects_single_list_title'] || $objects_single['objects_single_list'])
          <ul class="objects-single-page__main-list">
            <span class="objects-single-page__main-list-title">{!! $objects_single['objects_single_list_title'] !!}</span>
            @foreach($objects_single['objects_single_list'] as $objects_single_item)
              <li class="objects-single-page__main-list-item">{!! $objects_single_item['objects_single_list_item'] !!}</li>
            @endforeach
          </ul>
        @endif
        <div class="objects-single-page__main-footer">
          @if($objects_single['objects_single_city'])
            <div class="objects-single-page__main-footer-city">{!! $objects_single['objects_single_city'] !!}</div>
          @endif
          @if($objects_single['objects_single_date'])
            <div class="objects-single-page__main-footer-date">{!! $objects_single['objects_single_date'] !!}</div>
          @endif
        </div>
      </div>

      @if($objects_single['objects_single_slider'])
        <div class="objects-single-page__main-slider">
          @foreach($objects_single['objects_single_slider'] as $objects_single_slider)
            <img src="{!! $objects_single_slider['objects_single_slider_image'] !!}" alt="" class="objects-single-page__main-slider-item">
          @endforeach
        </div>
      @endif
    </div>

    @if($objects_single['objects_single_related_title'] || $objects_single['objects_single_related'])
      <div class="objects-single-page__related">
        <h2 class="objects-single-page__related-title">{!! $objects_single['objects_single_related_title'] !!}</h2>
        <div class="objects-single-page__related-content">
          @foreach($objects_single['objects_single_related'] as $objects_single_related)
            <div class="objects-single-page__related-content_item">
              <a href="{!! get_permalink($objects_single_related['objects_single_related_item']) !!}" class="objects-single-page__related-content_item-image-link">
                <img src="{!! get_the_post_thumbnail_url($objects_single_related['objects_single_related_item']) !!}" alt="{!! get_the_title($objects_single_related['objects_single_related_item']) !!}" class="objects-single-page__related-content_item-image">
              </a>
              <div class="objects-single-page__related-content_item-wrapper">
                <a href="{!! get_permalink($objects_single_related['objects_single_related_item']) !!}" class="objects-single-page__related-content_item-link-title">
                  <h3 class="objects-single-page__related-content_item-title">{!! get_the_title($objects_single_related['objects_single_related_item']) !!}</h3>
                </a>
                @if($objects_single_related['objects_single_related_city'])
                  <div class="objects-single-page__related-content_item-city">{!! $objects_single_related['objects_single_related_city'] !!}</div>
                @endif
                @if($objects_single_related['objects_single_related_year'])
                  <div class="objects-page__main-content_item-year">{!! $objects_single_related['objects_single_related_year'] !!}</div>
                @endif
                <div class="objects-single-page__related-content_item-text">{!! get_the_excerpt($objects_single_related['objects_single_related_item']) !!}</div>
                <a href="{!! get_permalink($objects_single_related['objects_single_related_item']) !!}" class="objects-single-page__related-content_item-link">Подробнее</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
  @endwhile
@endsection
