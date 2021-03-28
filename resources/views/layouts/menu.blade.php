@if(empty($menu))
  <li>
    <a href="javascript:">О нас</a>
    <div class="sab-menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <ul>
              <li class="has-children">
                <a href="#">Состоятельным клиентам</a>
              </li>
              <li class="has-children">
                <a href="#">Корпоративным и институциональным клиентам</a>
              </li>
              <li class="has-children">
                <a href="#">Аналитический департамент</a>
              </li>
              <li>
                <a href="#">Партнерам</a>
              </li>
              <li>
                <a href="#">Прямые инвестиции</a>
              </li>
              <li>
                <a href="#">ATON LAB</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="additional-block">
              <div class="menu-banner">
                <article>
                  <div class="absolute-wrap">
                    <h1>Мы знаем, что Вас беспокоит</h1>
                    <div class="nav-title">
                      <div class="slider-wrapper">
                        Финансовый план и инвестиционная стратегия, мониторинг рынков и актуализация Вашего портфеля –
                        это работа Вашего консультанта
                      </div>
                      {{--<div class="slider-wrapper__buttons">--}}
                      {{--<a href="#" class="button border-white-trans open-popup">Получить консультацию</a>--}}
                      {{--</div>--}}
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
  <li>
    <a href="javascript:">Наши предложения</a>
    <div class="sab-menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <ul>
              <li class="has-children">
                <a href="#">Состоятельным клиентам</a>
              </li>
              <li class="has-children">
                <a href="#">Корпоративным и институциональным клиентам</a>
              </li>
              <li class="has-children">
                <a href="#">Аналитический департамент</a>
              </li>
              <li>
                <a href="#">Партнерам</a>
              </li>
              <li>
                <a href="#">Прямые инвестиции</a>
              </li>
              <li>
                <a href="#">ATON LAB</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="additional-block">
              <div class="menu-banner">
                <article>
                  <div class="absolute-wrap">
                    <h1>Мы знаем, что Вас беспокоит</h1>
                    <div class="nav-title">
                      <div class="slider-wrapper">
                        Финансовый план и инвестиционная стратегия, мониторинг рынков и актуализация Вашего портфеля –
                        это работа Вашего консультанта
                      </div>
                      {{--<div class="slider-wrapper__buttons">--}}
                      {{--<a href="#" class="button border-white-trans open-popup">Получить консультацию</a>--}}
                      {{--</div>--}}
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
  <li>
    <a href="javascript:">Контакты</a>
    <div class="sab-menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <ul>
              <li>
                <a href="#">Состоятельным клиентам</a>
              </li>
              <li>
                <a href="#">Корпоративным и институциональным клиентам</a>
              </li>
              <li>
                <a href="#">Аналитический департамент</a>
              </li>
              <li>
                <a href="#">Партнерам</a>
              </li>
              <li>
                <a href="#">Прямые инвестиции</a>
              </li>
              <li>
                <a href="#">ATON LAB</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-8">
            <div class="additional-block">
              <div class="menu-banner">
                <article>
                  <div class="absolute-wrap">
                    <h1>Мы знаем, что Вас беспокоит</h1>
                    <div class="nav-title">
                      <div class="slider-wrapper">
                        Финансовый план и инвестиционная стратегия, мониторинг рынков и актуализация Вашего портфеля –
                        это работа Вашего консультанта
                      </div>
                      {{--<div class="slider-wrapper__buttons">--}}
                      {{--<a href="#" class="button border-white-trans open-popup">Получить консультацию</a>--}}
                      {{--</div>--}}
                    </div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>
@else
  @foreach($menu as $item)
    <li class="par">
      <a href="{{ route('home') }}/{{ $item->path }}">{{ $item->title }}</a>
      @if(count($item->children) > 0)
        <div class="sab-menu">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <ul class="new-menu-style">
                  @foreach($item->children as $child)
                    <li id="{{ $child->id }}" class=" {{ count($child->children) > 0 ? 'has-children' : 'no-child' }} ">
                      <a href="{{ route('home') }}/{{$child->path}}">{{ $child->title }}</a>
                    </li>
                  @endforeach
                </ul>
              </div>
              <div class="col-lg-8">
                <div class="additional-block">
                  <div class="menu-banner">
                    <article>
                      @foreach($item->children as $child)
                        @if(count($child->children) > 0)
                          <ul class="children" id="{{ 'child-' . $child->id }}">
                            @foreach($child->children as $t)
                              <li><a href="{{ route('home') }}/{{$t->path}}">{{ $t->title }}</a></li>
                            @endforeach
                          </ul>
                        @else
                          <div class="wrap-block" id="{{ 'no-child'.$child->id }}">
                            <h1>{{ $child->subtitle }}</h1>
                            <div class="nav-title">
                              <div class="slider-wrapper">
                                {{  $child->body }}
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach
                      <div class="absolute-wrap">
                        <h1>{{ $item->subtitle   }}</h1>
                        <div class="nav-title">
                          <div class="slider-wrapper">
                            {{  $item->body }}
                          </div>
                          {{--<div class="slider-wrapper__buttons">--}}
                          {{--<a href="#" class="button border-white-trans open-popup">Получить консультацию</a>--}}
                          {{--</div>--}}
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </li>
  @endforeach
  <li class="par">
    <a href="{{route('kd-ideas.page')}}">kd-ideas</a>
  </li>
  {{--        <li>--}}
  {{--            <a href="{{ route('market.page') }}">@lang('Рыночные данные')</a>--}}
  {{--        </li>--}}
@endif


<style type="text/css">

  .children {
    /*display: none !important;*/
  }

  .wrap-child {
    display: none;
  }

  .wrap-block {
    display: none;
  }

  header .menu nav ul li .sab-menu ul li.has-children:after {
    content: "";
    position: absolute;
    z-index: -1;
    width: 8px;
    height: 10px;
    right: 15px;
    top: calc(50% - 5px);
    display: inline-block;
    border-top: 5px solid rgba(0, 0, 0, 0);
    border-bottom: 5px solid rgba(0, 0, 0, 0);
    border-left: 8px solid #ababab;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
  }

  header .menu nav ul li .sab-menu ul li.has-children:hover:after {
    border-left: 8px solid #0151D3;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level {
    position: absolute;
    left: 369px;
    white-space: nowrap;
    top: 0;
    padding-left: 15px;
    min-height: 256px;
    opacity: 0;
    visibility: hidden;
    display: inline-block;
    -webkit-transition: .3s .3s all;
    -o-transition: .3s .3s all;
    transition: .3s .3s all;
    background-color: #ffff;
  }

  header .menu nav ul li .sab-menu ul li.has-children:hover .triple-level {
    opacity: 1;
    visibility: visible;
    -webkit-transition: .3s .3s all;
    -o-transition: .3s .3s all;
    transition: .3s .3s all;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list {
    list-style-position: outside;
    list-style: none;
    width: 369px;
    display: inline-block;
    vertical-align: top;
    border: none;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list:last-of-type {
    padding-left: 30px;
    padding-right: 0;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list li:hover:before {
    content: none;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list li {
    padding: 0;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list li a:hover {
    color: #0151D3;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list li a {
    padding-bottom: 10px;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level .triple-level-list li a span {
    display: block;
    padding-top: 5px;
    font-size: 13px;
    line-height: 15px;
    color: #7f7f7f;
    white-space: normal;
  }

  header .menu nav ul li .sab-menu ul li.has-children:hover .triple-level#style-new {
    top: -45px;
  }

  header .menu nav ul li .sab-menu ul li.has-children .triple-level#style-new {
    top: 50px;
  }


  header ul.children {
    display: none;
  }

  header ul.children li a:hover {
    text-decoration: underline;
    /*color: #0b4e96 !important;*/
  }

  .children.hoverstate {
    display: block;
  }
</style>
<script type="text/javascript">

  $(document).ready(function () {

    $('.children li a').click(function () {
      // $('.sab-menu').css('display', 'none');
      location.reload();
    });
    $('.no-child a').click(function () {
      // $('.sab-menu').css('display', 'none');
      location.reload();
    });
    // Call the event handler on #text
    var $boxes = $('.children');
    $productLinks = $('.sab-menu .has-children').mouseover(function () {
      $boxes.hide().filter('#child-' + this.id).show();
      $('.absolute-wrap').hide();
      $('.wrap-block').hide();
    })
    $('.sab-menu .no-child').mouseover(function () {
      // $boxes.hide().filter('#child-' + this.id).show();
      console.log();
      $('.wrap-block').hide();
      let id = $(this).attr('id');
      $('#no-child' + id).show()
      $('.children').hide();
      $('.absolute-wrap').hide();
    })

    $('.menu').mouseleave(function () {
      $('.children').hide();
      $('.wrap-block').hide();
      $('.absolute-wrap').show();
    });
  });

  $("header .menu nav ul li .sab-menu ul li.has-children").hover(function () {

      var child = $(this).attr('id');
      var test = "#child-" + child;


    },
    // Event two mouse out remove class
    function () {
      var child = $(this).attr('id');

    });
</script>
