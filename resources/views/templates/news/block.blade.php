<section class="section-news">
    <div class="container">
        <div class="news-all-column">
            <div class="news">
                <div class="news-title">
                    <h5>@lang('последние')<span>@lang('новости')</span></h5>
{{--                    <a href="{{ route('news.page') }}">@lang('Все новости')</a>--}}
                </div>
                @foreach($news as $item)
                    @php
                        if($item->category_id == 1){
                            $category = 'World';
                        }else{
                            $category = 'Uzbekistan';
                        }
                    @endphp
                <div class="tada-type">
                    <p class="date">{{ date('d-m-Y', strtotime($item->created_at)) }} </p>
                    @if(strlen($item->title) > 45)
                        <a href="{{ route('news.item', ['category'=> $category, 'slug' => $item->slug]) }}">
                            <span>{{ mb_substr($item->title, 0 , 45) }}...</span>
                        </a>
                    @else
                        <a href="{{ route('news.item', ['category'=> $category,'slug' => $item->slug]) }}">
                            <span>{{ $item->title }}</span>
                        </a>
                    @endif
                    @if(strlen($item->desc) > 240)
                        <p>{{ mb_substr($item->title, 0 , 240) }}...</p>
                    @else
                        <p>{{ $item->desc }}</p>
                    @endif

                </div>
                @endforeach

            </div>
            <div class="news-img">
                <div class="news-bg"></div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    main .section-news .tada-type .date{
        color: #232c65;
        font-size: 18px;
        font-weight: bold;
    }
</style>
