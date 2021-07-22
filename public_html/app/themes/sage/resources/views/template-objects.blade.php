{{--
  Template Name: Наши объекты
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $objects = get_field('objects') @endphp
  <div class="objects-page">
    @if($objects['objects_heading'])
      <h1 class="objects-page__heading">{!! $objects['objects_heading'] !!}</h1>
    @else
      <h1 class="objects-page__heading">{!! the_title(); !!}</h1>
    @endif

    <div class="objects-page__main">
      @php $tabs = get_field('objects_tabs') @endphp
      <div class="objects-page__main-tabs">
        <div class="objects-page__main-tabs-item" data-name="all">
          Все объекты
        </div>
        @foreach($tabs as $tabs_item)
          @if (!$tabs_item['objects_tabs_title'] == [])
            <div class="objects-page__main-tabs-item" data-name="{!! $tabs_item['objects_tabs_id'] !!}">
              {!! $tabs_item['objects_tabs_title'] !!}
            </div>
          @endif
        @endforeach
      </div>

      @php $cards = get_field('objects_cards') @endphp
      <div class="objects-page__main-content">
        @foreach($cards as $cards_item)
          <div class="objects-page__main-content_item" data-id="{!! $cards_item['objects_cards_id'] !!}">
            <a href="{!! get_permalink($cards_item['objects_cards_item']) !!}" class="objects-page__main-content_item-image-link">
              <img src="{!! get_the_post_thumbnail_url($cards_item['objects_cards_item']) !!}" alt="{!! get_the_title($cards_item['objects_cards_item']) !!}" class="objects-page__main-content_item-image">
            </a>
            <div class="objects-page__main-content_item-wrapper">
              <a href="{!! get_permalink($cards_item['objects_cards_item']) !!}" class="objects-page__main-content_item-link-title">
                <h3 class="objects-page__main-content_item-title">{!! get_the_title($cards_item['objects_cards_item']) !!}</h3>
              </a>
              @if($cards_item['objects_cards_city'])
                <div class="objects-page__main-content_item-city">{!! $cards_item['objects_cards_city'] !!}</div>
              @endif
              <div class="objects-page__main-content_item-text">{!! get_the_excerpt($cards_item['objects_cards_item']) !!}</div>
              <a href="{!! get_permalink($cards_item['objects_cards_item']) !!}" class="objects-page__main-content_item-link">Подробнее</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @endwhile
@endsection
