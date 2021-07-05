{{--
  Template Name: Услуги/Продукция
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $services = get_field('services') @endphp
  <div class="services-page">
    <div class="services-page__main">
      <div class="services-page__main-info">
        @if($services['services_heading'])
          <h1 class="services-page__main-heading">{!! $services['services_heading'] !!}</h1>
        @else
          <h1 class="services-page__main-heading">{!! the_title(); !!}</h1>
        @endif

        <div class="services-page__main-content">
          {!! $services['services_content'] !!}
        </div>
      </div>

      <aside class="services-page__sidebar">
        <h3 class="services-page__sidebar-title">{!! $services['services_aside_heading'] !!}</h3>
        @if($services['services_aside'])
          <div class="services-page__sidebar-content">
            @foreach($services['services_aside'] as $services_aside_item)
              <a href="{!! get_permalink($services_aside_item['services_aside_link']) !!}" class="services-page__sidebar-content_item-link">
                <div class="services-page__sidebar-content_item">
                  {!! get_the_title($services_aside_item['services_aside_link']) !!}
                </div>
              </a>
            @endforeach
          </div>
        @endif
      </aside>
    </div>

    <div class="services-page__advantages">
      <h2 class="services-page__advantages-title">{!! $services['services_advantages_heading'] !!}</h2>
      <div class="services-page__advantages-content">
        @foreach($services['services_advantages'] as $services_advantages)
          <div class="services-page__advantages-item">
            <div class="services-page__advantages-item-num">{!! $services_advantages['services_advantages_num'] !!}</div>
            <div class="services-page__advantages-item-title">{!! $services_advantages['services_advantages_title'] !!}</div>
          </div>
        @endforeach
      </div>
    </div>

    @if($services['services_related_title'] || $services['services_related'])
      <div class="services-page__related">
        <h2 class="services-page__related-title">{!! $services['services_related_title'] !!}</h2>
        <div class="services-page__related-content">
          @foreach($services['services_related'] as $services_related)
            <div class="services-page__related-content_item">
              <img src="{!! get_the_post_thumbnail_url($services_related['services_related_item']) !!}" alt="{!! get_the_title($services_related['services_related_item']) !!}" class="services-page__related-content_item-image">
              <div class="services-page__related-content_item-wrapper">
                <a href="{!! get_permalink($services_related['services_related_item']) !!}" class="services-page__related-content_item-link-title">
                  <h3 class="services-page__related-content_item-title">{!! get_the_title($services_related['services_related_item']) !!}</h3>
                </a>
                @if($services_related['services_related_city'])
                  <div class="services-page__related-content_item-city">{!! $services_related['services_related_city'] !!}</div>
                @endif
                <div class="services-page__related-content_item-text">{!! get_the_excerpt($services_related['services_related_item']) !!}</div>
                <a href="{!! get_permalink($services_related['services_related_item']) !!}" class="services-page__related-content_item-link">Подробнее</a>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
  @endwhile
@endsection
