<section class="partners">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-heading">
                    <h1>Рыночные данные 10 лучших компаний</h1>
                </div>
            </div>
        </div>
        <div class="data-page">
            @foreach($comps as $item)
                <div class="present-block">
                <div class="logo-partners">
                    <a href="#"><img src="storage/{{ $item->image }}"></a>
                </div>
                <div class="right-txt">
                    <h3>{{ $item->title }}</h3>
                    <ul>
                        <div class="check">
                            <li>{!! $item->body  !!} </li>
                        </div>
                        <div class="check">
                            @if($item->lang == 'ru')
                                <li><a href="{{ route('kd.comp-data', $item->id) }}">@lang('подробнее')</a></li>
                            @else
                                <li><a href="{{ route('kd.comp-data', $item->parent_id) }}">@lang('подробнее')</a></li>
                            @endif
                        </div>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>