@php /** Шаблон страницы вывода содержания Рубрики */ @endphp

@extends('layouts.app')

@section('content')
  @if(is_category('novosti'))
    <div class="post-page">
      <h1 class="post-page__title">Наши новости</h1>

      @php
        $project = get_categories(array(
        'taxonomy'     => 'category',
        'type'         => 'post',
        'child_of'     => 0,
        //'parent'       => '42',
        'orderby'      => 'id',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
      ));
      @endphp

      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('К сожалению, на данный момент здесь ничего нет.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @else
        <div class="post-page__list">
          @php $news_page = get_posts('category_name=novosti&posts_per_page=-1');@endphp
          @foreach( $news_page as $item)
            <div class="post-page__list-item">
              <a href="{!! get_permalink($item->ID) !!}">
                <div class="post-page__list-item-title">{!! $item->post_title !!}</div>
              </a>
              <div class="post-page__list-item-date">{!! date('d.m.Y', strtotime($item->post_date)); !!}</div>
              @if(get_the_post_thumbnail_url($item,'post-thumbnail'))
                <div class="post-page__list-item-image">
                  <img class="post-page__list-item-image-img" src="{!! get_the_post_thumbnail_url($item,'post-thumbnail') !!}"
                       alt="{!! $item->post_title !!}">
                </div>
              @endif
              <div class="post-page__list-item-text">{!! $item->post_excerpt !!}</div>
              <a class="post-page__list-item-more" href="{!! get_permalink($item->ID) !!}">Подробнее</a>
            </div>
          @endforeach
        </div>
      @endif
    </div>

  @else
    <div class="no-category-page">
      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('К сожалению, на данный момент здесь ничего нет.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @else
        <div class="no-category-page__list">
          @while (have_posts()) @php the_post() @endphp
          <h1 class="title">{!! get_the_title() !!}</h1>
          <a href="{!! get_permalink() !!}" class="link">{!! get_permalink() !!}</a>
          @endwhile
        </div>
      @endif
    </div>
  @endif

  {!! get_the_posts_navigation() !!}

@endsection
