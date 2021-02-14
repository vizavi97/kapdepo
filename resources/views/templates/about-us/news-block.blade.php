<section class="anch" id="news">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading">
                    <h1>@lang('Новости компании')</h1>
                    <a href="{{ route('news.page') }}">@lang('Все новости')</a>
                </div>
            </div>
            @foreach($news as $item)
                <div class="col-lg-4">
                    <div class="inner">
                        <img src="storage/{{$item->image}}">
                        <div class="info">
                            <div class="name">{{ $item->title }}</div>
                            <div class="offcut"></div>
                            <p>{{ $item->desc }}</p>
                        </div>
                        <div class="bottom-block"><span class="cake-date">{{ date('d.m.Y', strtotime($item->created_at)) }}</span></div>
                        <a href="{{ route('news.item', $item->slug) }}" class="open-popup" tabindex="0"></a>
                    </div>
                </div>
            @endforeach
            {{--<div class="col-lg-4">--}}
                {{--<div class="inner">--}}
                    {{--<img src="img/management-img.jpg">--}}
                    {{--<div class="info"><div class="name">График работы в праздничные дни</div><div class="offcut"></div><p>Уважаемые Клиенты! Сообщаем вам, что в период новогодних праздников «АТОН» будет работать согласно следующему графику</p></div>--}}
                    {{--<div class="bottom-block"><span class="cake-date">27 декабря 2019</span></div>--}}
                    {{--<a href="#" class="open-popup" tabindex="0"></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-4">--}}
                {{--<div class="inner">--}}
                    {{--<img src="img/management-img.jpg">--}}
                    {{--<div class="info"><div class="name">График работы в праздничные дни</div><div class="offcut"></div><p>Уважаемые Клиенты! Сообщаем вам, что в период новогодних праздников «АТОН» будет работать согласно следующему графику</p></div>--}}
                    {{--<div class="bottom-block"><span class="cake-date">27 декабря 2019</span></div>--}}
                    {{--<a href="#" class="open-popup" tabindex="0"></a>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</section>