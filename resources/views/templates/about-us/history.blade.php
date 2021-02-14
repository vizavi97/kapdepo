<section class="anch" id="history_block">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading">
                    <h1>@lang('Компания с большой историей')</h1>
                </div>
                <div class="history">
                    @foreach($story as $item)
                    <div class="item" style="padding: 0 5px">
                        <div class="history-year">
{{--                            <span>{{ $item->title }}</span>--}}
                            <h1>{{ $item->year }}</h1>
                            <h4>{{ $item->title }}</h4>
                            {{--                            <span class="history__buble"></span>--}}
                        </div>
                        <div class="history-description">
                            <div class="img-user">

                                <img src="storage/{{ $item->image }}">
                            </div>
                            <p>{{ $item->desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<style type="text/css">
    #history_block .title-heading h1{
        text-transform: uppercase;
        font-weight: bold;
    }
</style>
