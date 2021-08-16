{{--
  Template Name: Услуги
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
        @if($services['services_aside_heading'])
          <h3 class="services-page__sidebar-title">{!! $services['services_aside_heading'] !!}</h3>
        @else
          <h3 class="services-page__sidebar-title">Наши услуги:</h3>
        @endif

        <div class="services-page__sidebar-content">
          @if (has_nav_menu('footer_navigation_service'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation_service', 'menu_class' => 'footer__nav-list services-page__sidebar-nav-list']) !!}
          @endif
        </div>
      </aside>
    </div>

    @if($services['services_advantages_heading'] || $services['services_advantages'])
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
    @endif

    @if($services['services_gallery'] )
      <div class="services-page__gallery">
        @foreach($services['services_gallery'] as $services_gallery_item)
          <div class="services-page__gallery-item">
            <div class="services-page__gallery-item-image">
              <img src="{!! $services_gallery_item['services_gallery_image'] !!}" alt="" class="services-page__gallery-item-image-img">
            </div>
          </div>
        @endforeach
      </div>
    @endif

    @if($services['services_price_heading'] || $services['services_price'])
      <div id="price" class="production-page__price">
        <h3 class="production-page__price-title">{!! $services['services_price_heading'] !!}</h3>
        <div class="production-page__price-content">
          @if($services['services_price'])
            <div class="production-page__price-tabs">
              @foreach($services['services_price'] as $services_item_tabs)
                @if (!$services_item_tabs['services_price_tabs'] == [])
                  <div class="production-page__price-tabs-item" data-name="{!! $services_item_tabs['services_price_tabs'] !!}">
                    {!! $services_item_tabs['services_price_tabs'] !!}
                  </div>
                @endif
              @endforeach
            </div>
          @endif

          @if($services['services_price'])
            <div class="production-page__price-table-wrapper">
              @foreach($services['services_price'] as $services_table)
                <div class="production-page__price-table" data-name="{!! $services_table['services_price_tabs'] !!}">
                  <div class="production-page__price-table-title_row">
                    <span class="production-page__price-table-title_row-depth production-page__price-table-title_row-item">Толщина материала</span>
                    <span class="production-page__price-table-title_row-value-99 production-page__price-table-title_row-item">До 100 м.п</span>
                    <span class="production-page__price-table-title_row-value-499 production-page__price-table-title_row-item">100-500 м.п</span>
                    <span class="production-page__price-table-title_row-value-999 production-page__price-table-title_row-item">500-1000 м.п</span>
                    <span class="production-page__price-table-title_row-value-1001 production-page__price-table-title_row-item">св. 1000 м.п</span>
                  </div>
                  <div class="production-page__price-table-content">
                    @foreach($services_table['services_table_row'] as $services_table_row)
                      <div class="production-page__price-table_row">
                        <span class="production-page__price-table_row-depth production-page__price-table_row-item">{!! $services_table_row['services_table_row_name'] !!}</span>
                        <span class="production-page__price-table_row-value-99 production-page__price-table_row-item">{!! $services_table_row['services_table_row_value_99'] !!}</span>
                        <span class="production-page__price-table_row-value-499 production-page__price-table_row-item">{!! $services_table_row['services_table_row_value_499'] !!}</span>
                        <span class="production-page__price-table_row-value-999 production-page__price-table_row-item">{!! $services_table_row['services_table_row_value_999'] !!}</span>
                        <span class="production-page__price-table_row-value-1001 production-page__price-table_row-item">{!! $services_table_row['services_table_row_value_1001'] !!}</span>
                      </div>
                    @endforeach
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </div>
    @endif

    @if($services['services_related_title'] || $services['services_related'])
      <div class="services-page__related">
        <h2 class="services-page__related-title">{!! $services['services_related_title'] !!}</h2>
        <div class="services-page__related-content">
          @foreach($services['services_related'] as $services_related)
            <div class="services-page__related-content_item">
              <a href="{!! get_permalink($services_related['services_related_item']) !!}">
                <img src="{!! get_the_post_thumbnail_url($services_related['services_related_item']) !!}" alt="{!! get_the_title($services_related['services_related_item']) !!}" class="services-page__related-content_item-image">
              </a>
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
