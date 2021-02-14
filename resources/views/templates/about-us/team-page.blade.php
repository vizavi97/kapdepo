@extends('layouts.app')
@section('breadcrumb')
    <section class="about-us">
            <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Наша команда экспертов')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>
                        <a href="{{ route('about.page') }}">@lang('О нас')</a>
                    </li>
                    <li>@lang('Наша команда экспертов')</li>
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 column-bio">
                    <div id="bio-photos" class="small-button" data-toggle="modal" data-target="#dir">
                        <img src="/storage/{{ $director->photo }}">
                    </div>
                    <div class="bio-anketa">
                        <p>{{ $director->surname . ' ' . $director->name}}</p>
                        {{--<p>{{ $director->name }}</p>--}}
                    </div>
                    <div class="modal fade" id="dir" tabindex="-1" role="dialog" aria-labelledby="dir" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form method="POST">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Должность:<b>{{ $director->position }}</b></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="description">
                                        <p>{{ $director->surname . ' ' . $director->name . ' ' . $director->patronymic }}</p>
                                        {{--<p>Очество:<b>Маршалл</b></p>--}}
                                        <p>Номер телефона:<a href="#"><b>{{ $director->phone_one }}</b></a></p>
                                        @if(!empty($director->phone_two))
                                        <p>Номер телефона:<a href="#"><b>{{ $director->phone_two }}</b></a></p>
                                        @endif
                                        <p>email:<a href="#"><b>{{ $director->email }}</b></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($team as $item)
                    <div class="col-lg-4 col-md-6 column-bio">
                        <div id="bio-photos" class="small-button" data-toggle="modal" data-target="#person-id{{ $item->id }}">
                            <img src="/storage/{{ $item->photo }}">
                        </div>
                        <div class="bio-anketa">
                            <p>{{ $item->surname . ' ' . $item->name}}</p>
                            {{--<p>Маршалл</p>--}}
                        </div>
                        <div class="modal fade" id="person-id{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="person-id{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Должность:<b>{{ $item->position }}</b></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="description">
                                            <p>{{ $item->surname . ' ' . $item->name . ' ' . $item->patronymic }}</p>                                            <p>Очество:<b>Маршалл</b></p>
                                            <p>Номер телефона:<a href="#"><b>{{ $item->phone_one }}</b></a></p>
                                            @if(!empty($item->phone_two))
                                                <p>Номер телефона:<a href="#"><b>{{ $item->phone_two }}</b></a></p>
                                            @endif
                                            <p>email:<a href="#"><b>{{ $item->email }}</b></a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    <div class="join-our-team">
                        <a href="{{ route('team.resume') }}">@lang('Вступить в нашу команду')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection