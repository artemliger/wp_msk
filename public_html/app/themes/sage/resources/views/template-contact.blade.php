{{--
  Template Name: Контакты
--}}

@extends('layouts.app')

@section('content')
  @php $contact = get_field('contact') @endphp
  <div class="contact-page">
    <div class="contact-page__wrapper">
      <div class="contact-page__info">
        @if($contact['contact_heading'])
          <h1 class="contact-page__info-heading">{!! $contact['contact_heading'] !!}</h1>
        @else
          <h1 class="contact-page__info-heading">{!! get_the_title() !!}</h1>
        @endif
        <div class="contact-page__info-content">
          <div class="contact-page__info-content-main contact-page__info-content-main-address">
            <div class="contact-page__info-content-main-title">Адрес:</div>
            <a href="{!! get_field('address_link', 'options') !!}" class="contact-page__info-content-main-link" target="_blank">
              {!! get_field('address', 'options') !!}
            </a>
          </div>
          <div class="contact-page__info-content-main contact-page__info-content-main-phones">
            <div class="contact-page__info-content-main-title">Отдел продаж:</div>
            <div class="contact-page__info-content-main-phones-wrapper">
              @php
                $phone = "+7 (495) 745-75-31";
                $phone1 = "+7 (495) 690-10-06";
                $phone2 = "+7 (495) 690-44-73";
                $phone3 = "+7 (917) 500-33-40";
                $phoneNumb = str_replace(array(' ', '(', ')', '-'), '', $phone);
                $phoneNumb1 = str_replace(array(' ', '(', ')', '-'), '', $phone1);
                $phoneNumb2 = str_replace(array(' ', '(', ')', '-'), '', $phone2);
                $phoneNumb3 = str_replace(array(' ', '(', ')', '-'), '', $phone3);
              @endphp
              <a href="tel:{!! $phoneNumb !!}" class="contact-page__info-content-main-phone">{!! $phone !!}</a>
              <a href="tel:{!! $phoneNumb1 !!}" class="contact-page__info-content-main-phone">{!! $phone1 !!}</a>
              <a href="tel:{!! $phoneNumb2 !!}" class="contact-page__info-content-main-phone">{!! $phone2 !!}</a>
              <a href="tel:{!! $phoneNumb3 !!}" class="contact-page__info-content-main-phone">{!! $phone3 !!}</a>
            </div>
          </div>
          <div class="contact-page__info-content-main contact-page__info-content-main-phones">
            <div class="contact-page__info-content-main-title">Секретарь:</div>
            <div class="contact-page__info-content-main-phones-wrapper">
              @php
                $phone4 = "+7 (495) 690-10-06";
                $phone5 = "+7 (495) 690-44-73 ";
                $phoneNumb4 = str_replace(array(' ', '(', ')', '-'), '', $phone4);
                $phoneNumb5 = str_replace(array(' ', '(', ')', '-'), '', $phone5);
              @endphp
              <a href="tel:{!! $phoneNumb4 !!}" class="contact-page__info-content-main-phone">{!! $phone4 !!}</a>
              <a href="tel:{!! $phoneNumb5 !!}" class="contact-page__info-content-main-phone">{!! $phone5 !!}</a>
            </div>
          </div>
          <div class="contact-page__info-content-main contact-page__info-content-main-mail">
            <div class="contact-page__info-content-main-title">E-mail:</div>
            <a href="mailto:{!! get_field('email', 'options') !!}" class="contact-page__info-content-main-link">
              {!! get_field('email', 'options') !!}
            </a>
          </div>
        </div>
      </div>
      <div class="contact-page__map" >{!! get_field('map', 'options') !!}</div>
    </div>
  </div>

@endsection
