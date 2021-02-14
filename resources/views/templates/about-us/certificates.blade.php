<section class="anch" id="certificates">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-heading">
                    <h1 style="font-weight: bold; text-transform: uppercase;">@lang('Лицензии и сертификаты')</h1>
                    {{--<a href="#">Узнать подробнее</a>--}}
                </div>
            </div>
            <div class="gallery">
                @foreach($certs as $item)
                    <div class="item">
                        <div class="gallery-img">
                            <a data-toggle="modal" data-target="#modal-{{ $item->id }}" >

                                <img src="storage/{{ $item->image }}" alt="">
                                <h1>{{ $item->title }}</h1>
                            </a>
                        </div>
                    </div>

                @endforeach
            </div>

            @foreach($certs as $item)
                <div class="modal  fade" style="background: #014fd338;" id="modal-{{ $item->id }}">
                    <div class="modal-dialog">
                        <div class="modal-content">
{{--                            <div class="modal-header">--}}
{{--                            </div>--}}
                            <div class="modal-body">
                                <img style="width: 100%" src="storage/{{ $item->image }}" alt="">
                            </div>
{{--                            <div class="modal-footer">--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
