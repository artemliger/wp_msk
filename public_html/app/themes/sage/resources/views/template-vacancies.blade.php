{{--
  Template Name: Вакансии
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @php $vacancies = get_field('vacancies') @endphp
  <div class="vacancies-page">
    @if($vacancies['vacancies_heading'])
      <h1 class="vacancies-page__heading">{!! $vacancies['vacancies_heading'] !!}</h1>
    @else
      <h1 class="vacancies-page__heading">{!! the_title(); !!}</h1>
    @endif
    <div class="vacancies-page__main">
      @foreach($vacancies['vacancies_item'] as $vacancies_item)
        <details class="vacancies-page__main-item">
          <summary class="vacancies-page__main-item_head">
            <span class="vacancies-page__main-item_head-title">{!! $vacancies_item['vacancies_item_title'] !!}</span>
            <div class="vacancies-page__main-item_head-content">
              <div class="vacancies-page__main-item_head-content-experience">
                <span class="vacancies-page__main-item_head-content-experience-title">Требуемый опыт:</span>
                {!! $vacancies_item['vacancies_item_experience'] !!}
              </div>
              <div class="vacancies-page__main-item_head-content-salary">
                <span class="vacancies-page__main-item_head-content-salary-title">З/П:</span>
                {!! $vacancies_item['vacancies_item_salary'] !!}
              </div>
            </div>
          </summary>
          <div class="vacancies-page__main-item-content">
            {!! $vacancies_item['vacancies_item_textarea'] !!}

            <div class="vacancies-page__main-item-content_footer">
              <a href="#" class="vacancies-page__main-item-content_footer-link">Откликнуться на вакансию</a>
              <div class="vacancies-page__main-item-content_footer-info">
                <span class="vacancies-page__main-item-content_footer-info-title">Связаться с HR-отделом:</span>
                <a href="tel:{!! $vacancies_item['vacancies_item_phone_inner'] !!}" class="vacancies-page__main-item-content_footer-info-phone">
                  {!! $vacancies_item['vacancies_item_phone_outer'] !!}
                </a>
              </div>
            </div>
          </div>
        </details>
      @endforeach
    </div>
  </div>
  @endwhile
@endsection
