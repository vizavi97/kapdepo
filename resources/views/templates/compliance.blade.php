@extends('layouts.app')
@section('breadcrumb')
    <section class="about-us">
        <div class="container">
            <div class="site-title clearfix">
                <h2>@lang('Compliance')</h2>
                <ul class="breadcrumbs">
                    <li>
                        <a href="{{ route('home') }}">@lang('Главная')</a>
                    </li>
                    <li>@lang('Compliance')</li>
                </ul>
            </div>
        </div>
    </section>

@endsection
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="ahead">
                        «АТОН» (далее – Компания) в своей деятельности придерживается высоких стандартов комплаенс-контроля. Компания и  ее сотрудники руководствуются не  только требованиями российского законодательства, но и нормами международного права, бизнес-этики, международными стандартами и  лучшими практиками в индустрии.
                    </p>
                    <p class="ahead">
                        «АТОН» (далее – Компания) в своей деятельности придерживается высоких стандартов комплаенс-контроля. Компания и  ее сотрудники руководствуются не  только требованиями российского законодательства, но и нормами международного права, бизнес-этики, международными стандартами и  лучшими практиками в индустрии.
                    </p>
                    <p class="ahead"></p>
                    <div class="user-detail" id="compliance__files">
                        <ul class="new-row-table">
                            <li></li>
                            <li>Файл</li>
                            <li>Дата публикации</li>
                            <li>Период актуальности</li>
                        </ul>
                    </div>
                    <div class="user-detail" id="compliance__domlaund">
                        <a href="#">
                            <ul class="new-row-table">
                                <li>Комплаенс политика ООО «АТОН»</li>
                                <li>
                                    <i class="fas fa-file-pdf"></i>
                                    378.88 Кб
                                </li>
                                <li>17.09.2019</li>
                                <li>по настроящее время</li>
                            </ul>
                        </a>
                    </div>
                    <div class="compliance_create">
                        <div role="tab" id="headingOne" class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-0" aria-expanded="false" aria-controls="collapseOne" class="collapsed">		Сертификация по стандарту ISO 19600:2014
                                </a>
                            </h4>
                            <div id="collapse-0" role="tabpanel" aria-labelledby="headingOne" class="panel-collapse active collapse" aria-expanded="true">
                                <div class="panel">
                                    17 октября 2019 года компания «АТОН» подтвердила соответствие международному стандарту ISO 19600:2014 «Управление функцией комплаенс».
                                    Полученный сертификат ISO подтверждает соответствие системы комплаенс-менеджмента компании международным стандартам по следующим направлениям:
                                </div>
                            </div>
                        </div>
                        <div role="tab" id="headingOne1" class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-1" aria-expanded="false" aria-controls="collapseOne" class="collapsed">		Сертификация по стандарту ISO 19600:2014
                                </a>
                            </h4>
                            <div id="collapse-1" role="tabpanel" aria-labelledby="headingOne1" class="panel-collapse active collapse" aria-expanded="true">
                                <div class="panel">
                                    17 октября 2019 года компания «АТОН» подтвердила соответствие международному стандарту ISO 19600:2014 «Управление функцией комплаенс».
                                    Полученный сертификат ISO подтверждает соответствие системы комплаенс-менеджмента компании международным стандартам по следующим направлениям:
                                </div>
                            </div>
                        </div>
                        <div role="tab" id="headingOne2" class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-2" aria-expanded="false" aria-controls="collapseOne" class="collapsed">		Сертификация по стандарту ISO 19600:2014
                                </a>
                            </h4>
                            <div id="collapse-2" role="tabpanel" aria-labelledby="headingOne2" class="panel-collapse active collapse" aria-expanded="true">
                                <div class="panel">
                                    17 октября 2019 года компания «АТОН» подтвердила соответствие международному стандарту ISO 19600:2014 «Управление функцией комплаенс».
                                    Полученный сертификат ISO подтверждает соответствие системы комплаенс-менеджмента компании международным стандартам по следующим направлениям:
                                </div>
                            </div>
                        </div>
                        <div role="tab" id="headingOne3" class="panel-heading">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-3" aria-expanded="false" aria-controls="collapseOne" class="collapsed">		Сертификация по стандарту ISO 19600:2014
                                </a>
                            </h4>
                            <div id="collapse-3" role="tabpanel" aria-labelledby="headingOne3" class="panel-collapse active collapse" aria-expanded="true">
                                <div class="panel">
                                    17 октября 2019 года компания «АТОН» подтвердила соответствие международному стандарту ISO 19600:2014 «Управление функцией комплаенс».
                                    Полученный сертификат ISO подтверждает соответствие системы комплаенс-менеджмента компании международным стандартам по следующим направлениям:
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection