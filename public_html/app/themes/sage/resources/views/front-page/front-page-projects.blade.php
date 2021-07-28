@php $projects = get_field('projects') @endphp

<div class="front-page__projects">
  <h2 class="front-page__projects-title">{!! $projects['projects_title'] !!}</h2>
  <div class="front-page__projects-content full-width-outside">
    @foreach($projects['projects_item'] as $projects_item)
      <div class="front-page__projects-content_item">
        <div class="front-page__projects-content_item-textarea">
          <a href="{!! $projects_item['projects_item_link'] !!}" class="front-page__projects-content_item-textarea-title-link">
            <h3 class="front-page__projects-content_item-textarea-title">{!! $projects_item['projects_item_title'] !!}</h3>
          </a>
          <div class="front-page__projects-content_item-textarea-text">{!! $projects_item['projects_item_text'] !!}</div>
          <a href="/obekty/" class="front-page__projects-content_item-textarea-link">Все объекты</a>
        </div>
        <div class="front-page__projects-content_item-image">
          <img src="{!! $projects_item['projects_item_bg_image'] !!}" alt="" class="front-page__projects-content_item-image-img">
        </div>
      </div>
    @endforeach
  </div>
</div>
