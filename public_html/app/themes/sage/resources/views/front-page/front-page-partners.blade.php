@php $partners = get_field('partners') @endphp

<div class="front-page__partners">
  <div class="front-page__partners-content">
    @foreach($partners['partners_item'] as $partners_item)
      <div class="front-page__partners-content-item">
        <img class="front-page__partners-content-item-image" src="{!! $partners_item['partners_item_img'] !!}" alt=""/>
      </div>
    @endforeach
  </div>
</div>
