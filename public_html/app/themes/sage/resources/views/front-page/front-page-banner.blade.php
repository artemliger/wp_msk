@php $banner = get_field('banner') @endphp

<div class="front-page__banner">
  <div class="front-page__banner-item">
    <div class="front-page__banner-item-content full-width-outside">
      @if($banner['banner_headtitle'])
        <div class="front-page__banner-item-content-headtitle">{!! $banner['banner_headtitle'] !!}</div>
      @endif
      <h1 class="front-page__banner-item-content-title">
        {!! $banner['banner_heading'] !!}
        @if($banner['banner_heading_emit'])
          <span class="front-page__banner-item-content-title-emit">{!! $banner['banner_heading_emit'] !!}</span>
        @endif
      </h1>
      <div class="front-page__banner-item-content-subtitle">{!! $banner['banner_subtitle'] !!}</div>
    </div>
    <div class="front-page__banner-item-slider">
      @foreach($banner['banner_item'] as $banner_item)
        <div class="front-page__banner-item-slider-pic" style="background: url({!! $banner_item['banner_item_image'] !!}) no-repeat center top / cover"></div>
      @endforeach
    </div>
  </div>
</div>
