{{--
  Template Name: О компании
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $about = get_field('about') @endphp
  <div class="about-page">
    <div class="about-page__main">
      @if($about['about_heading'])
        <h1 class="about-page__main-heading">{!! $about['about_heading'] !!}</h1>
      @else
        <h1 class="about-page__main-heading">{!! the_title(); !!}</h1>
      @endif

      <div class="about-page__main-content">
        {!! $about['about_content'] !!}
      </div>

      <div class="about-page__main-doc">
        @foreach($about['about_doc'] as $about_doc)
          @if($about_doc['about_doc_file'])
            <div class="about-page__main-doc-item">
              <div class="about-page__main-doc-info">
                <div class="about-page__main-doc-info-title">{!! $about_doc['about_doc_title'] !!}</div>
                @if($about_doc['about_doc_subtitle'])
                  <div class="about-page__main-doc-info-subtitle">{!! $about_doc['about_doc_subtitle'] !!}</div>
                @endif
              </div>
              @if($about_doc['about_doc_file'])
                <a href="{!! $about_doc['about_doc_file'] !!}" class="about-page__main-doc-file-link" target="_blank">
                  <div class="about-page__main-doc-file">
                    @if($about_doc['about_doc_file_name'])
                      {!! $about_doc['about_doc_file_name'] !!}
                    @else
                      Скачать файл
                    @endif
                  </div>
                </a>
              @endif
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="about-page__advantages">
      <h2 class="about-page__advantages-title">{!! $about['about_advantages_heading'] !!}</h2>
      <div class="about-page__advantages-content">
        @foreach($about['about_advantages'] as $about_advantages)
          <div class="about-page__advantages-item">
            <div class="about-page__advantages-item-num">{!! $about_advantages['about_advantages_num'] !!}</div>
            <div class="about-page__advantages-item-wrapper">
              <div class="about-page__advantages-item-title">{!! $about_advantages['about_advantages_title'] !!}</div>
              @if($about_advantages['about_advantages_text'])
                <div class="about-page__advantages-item-text">{!! $about_advantages['about_advantages_text'] !!}</div>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @endwhile
@endsection
