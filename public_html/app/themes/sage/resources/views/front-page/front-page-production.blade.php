@php $production = get_field('production') @endphp

<div class="front-page__production">
  <h2 class="front-page__production-title">{!! $production['production_title'] !!}</h2>
  <div class="front-page__production-content">
    @foreach($production['production_item'] as $production_item)
      <div class="front-page__production-content_item" style="background: url({!! $production_item['production_item_bg_image'] !!}) no-repeat top / cover">
        <h3 class="front-page__production-content_item-title">{!! $production_item['production_item_title'] !!}</h3>
        <div class="front-page__production-content_item-subtitle">{!! $production_item['production_item_subtitle'] !!}</div>
        <div class="front-page__production-content_item-links">
          @foreach($production_item['production_item_link'] as $production_item_link)
            <a href="{!! $production_item_link['production_item_link_url'] !!}" class="front-page__production-content_item-link">{!! $production_item_link['production_item_link_name'] !!}</a>
          @endforeach
        </div>
      </div>
    @endforeach
  </div>
</div>
