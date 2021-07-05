<div class="front-page__news">
  <div class="front-page__news-head">
    <h2 class="front-page__news-title">Наши новости</h2>
    <div class="front-page__news-head-info">
      <a href="/category/novosti/" class="front-page__news-head-info-link">Все новости</a>
    </div>
  </div>
  <div class="front-page__news-list">
    @php $news = get_posts('category_name=novosti&posts_per_page=2');@endphp
    @foreach( $news as $item)
      <div class="front-page__news-list-item">
        <a class="front-page__news-list-item-link" href="{!! get_permalink($item->ID) !!}">
          <div class="front-page__news-list-item-title">{!! $item->post_title !!}</div>
        </a>
        <div class="front-page__news-list-item-date">{!! date('d.m.Y', strtotime($item->post_date)); !!}</div>
        <div class="front-page__news-list-item-desc">{!! $item->post_excerpt !!}</div>
        <a class="front-page__news-list-item-link-more" href="{!! get_permalink($item->ID) !!}">Подробнее</a>
      </div>
    @endforeach
  </div>
</div>
