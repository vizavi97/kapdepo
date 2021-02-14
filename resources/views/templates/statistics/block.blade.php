<section class="timer-section" id="statistic">

        <div class="container">
            <div class="main-timer-sec">
                <div class="row">
                    <div class="col-timer col-lg-3 col-md-6 col-sm-6">
                        <div class="item-column">
                            <div class="timer-img" id="timer-img3"></div>
                            <div class="fun-fact">
                                <div class="timer counting" data-count="{{{ $stats->years }}}">0</div>
                                <span>@lang('лет')</span>
                            </div>
                            <div class="timer-heading">
                                <span>@lang('Успешной деятельности')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-timer col-lg-3 col-md-6 col-sm-6">
                        <div class="item-column">
                            <div class="timer-img" id="timer-img4"></div>
                            <div class="fun-fact">
                                <div class="timer counting" data-count="{{ $stats->clients }}" style="margin: 0;">0</div>
                            </div>
                            <div class="timer-heading">
                                <span>@lang('Довольных клиентов')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-timer col-lg-3 col-md-6 col-sm-6">
                        <div class="item-column">
                            <div class="timer-img" id="timer-img2"></div>
                            <div class="fun-fact">
                                <div class="timer counting" data-count="{{ $stats->transactions }}">0</div>
                                <span>
{{--                                    @lang('млрд').--}}
                                </span>
                            </div>
                            <div class="timer-heading">
                                <span>@lang('Лучший инвестиционный консультант')</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-timer col-lg-3 col-md-6 col-sm-6">
                        <div class="item-column">
                            <div class="timer-img" id="timer-img1"></div>
                            <div class="fun-fact">
                                <div class="timer counting" data-count="{{ $stats->fond }}">0</div>
                                <span>UZS</span>
                            </div>
                            <div class="timer-heading">
                                <span>@lang('Гарантийный фонд')</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

</section>
<style type="text/css">
    .timer-section .main-timer-sec{
        border-bottom: 4px solid #232c65;
        padding-bottom: 70px;
    }
    .main-timer-sec .row{
        justify-content: center;
    }
    .main-timer-sec .col-timer{
        max-width: 22%;
    }
    .main-timer-sec .counting{
        font-size: 35px!important;
    }
    .main-timer-sec  .timer-heading span{
        font-size: 14px!important;
    }
</style>
<script type="text/javascript">
    function myCount(){
        $('.counting').each(function() {
            var $this = $(this),
                countTo = $this.attr('data-count');

            $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },

                {

                    duration: 1000,
                    easing:'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }

                });


        });
    }


    $(window).scroll(function () {

        var a = $('.timer-section').offset().top;

        var b = $('.timer-section').outerHeight();
        var c = $(window).height();
        var d = $(this).scrollTop();
        if (d > (a - c)) {
            myCount();
        }
    })

</script>
