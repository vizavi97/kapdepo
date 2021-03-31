@extends('layouts.app')
@push('styles')
  <link rel="stylesheet" href="{{asset('./css/tim/faq.css')}}"/>
@endpush

@section('main_head')
  <section class="banner-section">
    <div class="banner-page-new">
      <div class="item">
        <div class="bg_header"
             style="background: url({{ asset('front/4.jpg') }}) no-repeat; background-size: cover; background-position: 0 32%;"></div>
        <div class="item-banner">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="slider-wrapper__section">
                  <span class="title-span">F.A.Q</span>
                  <span class="bor"></span>

                </div>
                <h1><br></h1>
                <div class="new-block-text">
                  <p><br></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('back-ground')
  <div class="test-block">

  </div>
@endsection
@section('breadcrumb')
  <section class="about-us">
    <div class="container">
      <div class="site-title clearfix">
        <h2>F.A.Q</h2>
        <ul class="breadcrumbs">
          <li>
            <a href="{{ route('home') }}">@lang('Главная')</a>
          </li>
        </ul>
      </div>
    </div>
  </section>
@endsection

@section('content')
  <div class="container">
    <div class="faq-container">
      <ul class="faq-list">
        @foreach($faqs as $faq)
          <li class="faq-item">
            <label>
              <input type="radio" name="faq"/>
              <div class="faq-item-headline">
                <span>?</span>
                <h4>{{$faq->question}}</h4>
              </div>
              <div class="faq-item-body">
                <p>{{$faq->question}}</p>
              </div>
            </label>
          </li>
        @endforeach
      </ul>
    </div>
  </div>

@endsection
