@php $link = get_field('link') @endphp

<div class="front-page__links">
  <div class="front-page__links-wrapper">
    @foreach($link['link_item'] as $link_item)
      <div class="front-page__links-item">
        @if($link_item['link_item_link'])
          <a href="{!! $link_item['link_item_link'] !!}" class="front-page__links-item-link">
            <div class="front-page__links-item-title">{!! $link_item['link_item_title'] !!}</div>
            <div class="front-page__links-item-text">{!! $link_item['link_item_text'] !!}</div>
          </a>
        @endif
      </div>
    @endforeach
  </div>
</div>
