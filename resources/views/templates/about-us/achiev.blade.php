<section class="anch" id="achievments">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading">
                    <h1 style="font-weight: bold; text-transform: uppercase;">@lang('Наши награды')</h1>
                    {{--<a href="#">Узнать подробнее</a>--}}
                </div>
            </div>
            <div class="achievs">
                @foreach($achievs as $item)
                    <div class="item">
                        <div class="gallery-img">
                            <img src="storage/{{ $item->image }}" alt="">
                            <h1>{{ $item->title }}</h1>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
