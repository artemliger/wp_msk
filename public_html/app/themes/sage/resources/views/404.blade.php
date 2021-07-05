@extends('layouts.app')

@section('content')
  <div class="not-found-page">
    @if (!have_posts())
      <div class="not-found-page__code">
        404
      </div>
      <div class="not-found-page__warning">
        {{ __('Извините, но страница, которую вы пытались просмотреть, не существует.', 'sage') }}
      </div>
    @endif
  </div>
@endsection
