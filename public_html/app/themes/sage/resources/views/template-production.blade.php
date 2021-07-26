{{--
  Template Name: Продукция
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $production = get_field('production') @endphp
  <div class="production-page">
    <div class="production-page__main">
      <div class="production-page__main-info">
        @if($production['production_heading'])
          <h1 class="production-page__main-heading">{!! $production['production_heading'] !!}</h1>
        @else
          <h1 class="production-page__main-heading">{!! the_title(); !!}</h1>
        @endif

        <div class="production-page__main-content">
          {!! $production['production_content'] !!}
        </div>
      </div>

      <aside class="production-page__sidebar">
        @if($production['production_aside_heading'])
          <h3 class="production-page__sidebar-title">{!! $production['production_aside_heading'] !!}</h3>
        @else
          <h3 class="production-page__sidebar-title">Наша продукция:</h3>
        @endif
        <div class="production-page__sidebar-content">
          @if (has_nav_menu('footer_navigation_product'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation_product', 'menu_class' => 'footer__nav-list production-page__sidebar-nav-list']) !!}
          @endif
        </div>
      </aside>
    </div>

    @if($production['production_price_heading'] || $production['production_price'])
    <div id="price" class="production-page__price">
      <h3 class="production-page__price-title">{!! $production['production_price_heading'] !!}</h3>
      <div class="production-page__price-content">
        @if($production['production_price'])
        <div class="production-page__price-tabs">
          @foreach($production['production_price'] as $production_item_tabs)
            @if (!$production_item_tabs['production_price_tabs'] == [])
              <div class="production-page__price-tabs-item" data-name="{!! $production_item_tabs['production_price_tabs'] !!}">
                {!! $production_item_tabs['production_price_tabs'] !!}
              </div>
            @endif
          @endforeach
        </div>
        @endif

        @if($production['production_price'])
        <div class="production-page__price-table-wrapper">
          @foreach($production['production_price'] as $production_table)
            <div class="production-page__price-table" data-name="{!! $production_table['production_price_tabs'] !!}">
              <div class="production-page__price-table-title_row">
                <span class="production-page__price-table-title_row-depth production-page__price-table-title_row-item">Толщина материала</span>
                <span class="production-page__price-table-title_row-value-99 production-page__price-table-title_row-item">До 100 м.п</span>
                <span class="production-page__price-table-title_row-value-499 production-page__price-table-title_row-item">100-500 м.п</span>
                <span class="production-page__price-table-title_row-value-999 production-page__price-table-title_row-item">500-1000 м.п</span>
                <span class="production-page__price-table-title_row-value-1001 production-page__price-table-title_row-item">св. 1000 м.п</span>
              </div>
              <div class="production-page__price-table-content">
                @foreach($production_table['production_table_row'] as $production_table_row)
                  <div class="production-page__price-table_row">
                    <span class="production-page__price-table_row-depth production-page__price-table_row-item">{!! $production_table_row['production_table_row_name'] !!}</span>
                    <span class="production-page__price-table_row-value-99 production-page__price-table_row-item">{!! $production_table_row['production_table_row_value_99'] !!}</span>
                    <span class="production-page__price-table_row-value-499 production-page__price-table_row-item">{!! $production_table_row['production_table_row_value_499'] !!}</span>
                    <span class="production-page__price-table_row-value-999 production-page__price-table_row-item">{!! $production_table_row['production_table_row_value_999'] !!}</span>
                    <span class="production-page__price-table_row-value-1001 production-page__price-table_row-item">{!! $production_table_row['production_table_row_value_1001'] !!}</span>
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

    @if($production['production_product_heading'] || $production['production_product_gallery'])
    <div class="production-page__product">
      <h3 class="production-page__product-title">{!! $production['production_product_heading'] !!}</h3>
      @if($production['production_product_gallery'] )
      <div class="production-page__product-content">
        @foreach($production['production_product_gallery'] as $production_gallery_item)
          <div class="production-page__product-item">
            <div class="production-page__product-item-image">
              <img src="{!! $production_gallery_item['production_product_gallery_image'] !!}" alt="" class="production-page__product-item-image-img">
            </div>
            <h4 class="production-page__product-item-title">{!! $production_gallery_item['production_product_gallery_title'] !!}</h4>
          </div>
        @endforeach
      </div>
      @endif
    </div>
    @endif
  </div>
  @endwhile
@endsection
