<section class="anch" id="section-bg8" style="">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading" id="section-title">
                    <h1>@lang('Миссия')</h1>
                    {{--<a href="#">Узнать подробнее</a>--}}
                </div>
                <div class="solutions">
                    <div class="row" id="row-tiitle">
                        <div class="col-12" id="following">
                            <div class="following">
                                <i class="fas fa-laptop-code"></i>
                                <h2>
                                    @switch(App::getLocale())
                                        @case('ru')
                                            Удовлетворение потребностей инвесторов и бизнеса в реализации их стратегических целей на рынке капитала Узбекистана.
                                        @break
                                        @case('en')
                                            Meeting the needs of investors and businesses in realizing their strategic goals in capital market of Uzbekistan.
                                        @break
                                        @case('uz')
                                            Investorlar va biznesning O'zbekiston kapital bozoridagi strategik maqsadlarini amalga oshirishda ehtiyojlarini qondirish.
                                        @break
                                    @endswitch
                                </h2>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
