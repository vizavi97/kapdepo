<section class="section-location" style="padding:90px 0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map">
                    <div id="map"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="column-location">
                    <img src="{{ asset('front/img/info-icon.png') }}">
                    <div class="column-location-text">
                        <span>Email</span>
                        <p><a href="#">{{ $settings->email }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="column-location">
                    <img src="{{ asset('front/img/phone-icon.png') }}">
                    <div class="column-location-text">
                        <span>@lang('Телефон')</span>
                        <p>{{ $settings->phone }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="column-location">
                    <img src="{{ asset('front/img/location-icon.png') }}">
                    <div class="column-location-text">
                        <span style="padding: 0;">@lang('Адрес')</span>
                        <p>
                            @switch(app()->getLocale())
                                @case('ru')
                                    {{ $settings->address_ru }}
                                @break
                                @case('uz')
                                    {{ $settings->address_uz }}
                                @break
                                @case('en')
                                    {{ $settings->address_en }}
                                @break
                            @endswitch
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    #map{
        width:100%;
        height:370px;
    }

    .data-loc {
        font-family: "Century Gothic";
    }
    .data-loc p{
        padding-left: 10px;
        /*margin: 0;*/
        margin: 10px 0;

    }
    .data-loc h5{
        color: #0b4e96;
        font-weight: bold;
        padding-left: 10px;
    }
    .data-loc a {
        text-transform: uppercase;
        font-weight: bold;
        padding: 3px 10px;
        background: white;
        margin-left: 10px;
        color: #0b4e96;
        border: 1px solid #0b4e96;
        border-radius: 15px;

    }
    .data-loc a:hover{
        color: white;
        background: #0b4e96;
    }
</style>
<script src="https://api-maps.yandex.ru/2.1/?apikey=297d2a23-9054-4b42-b162-0143f07df0d4&lang=ru_RU" type="text/javascript">
</script>


<script type="text/javascript">
    // Initialize and add the map


    $(document).ready(function () {
        // ymaps.ready(init);

        function init(){

            var map = new ymaps.Map('map', {

                center: [41.32,69.30],
                zoom: 11,
                controls: []
            },{
                searchControlProvider: 'yandex#search'
            });

            var objectManager = new ymaps.ObjectManager();

            objectManager.add(branches);
            map.geoObjects.add(objectManager);
            {{--var myPlacemark = new ymaps.Placemark([41.31,69.24], {}, {--}}
            {{--iconLayout: 'default#image',--}}
            {{--iconImageHref: '{{asset('marker.png')}}',--}}
            {{--iconImageSize: [40, 57],--}}
            {{--iconImageOffset: [-21, -59],--}}
            {{--balloonContent:'test',--}}
            {{--iconContent: '12'--}}
            {{--});--}}

            // map.geoObjects.add(myPlacemark);

        }
        var CSRF_TOKEN =  $('meta[name=csrf-token]').attr('content');
        var branches;

        function getBranches() {
            $.ajax({
                type: 'POST',
                url: '/branches',
                dataType: 'JSON',
                data: {_token: CSRF_TOKEN},
                success: function (data) {
                    branches = data;
                    console.log(branches);
                }
            }).done(function () {
                ymaps.ready(init);
            });
        }

        getBranches();
    });

</script>
