<div class="sidebar">
  <a href="{{ route('admin.home') }}" class="brand-link">
    <img src="{{asset('style/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      {{--Menu--}}
      <li class="nav-item">
        <a href="{{ route('menu.list') }}" class="nav-link ">
          <i class="nav-icon fas fa-bars"></i>
          <p>
            Меню
          </p>
        </a>
      </li>

      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class=" nav-icon fas fa-copy"></i>
          <p>
            Content
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('new.list') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>Новости</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('partners.list') }}" class="nav-link">
              <i class="nav-icon far fa-handshake"></i>
              <p>Партнёры</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('tariff.list') }}" class="nav-link">
              <i class="nav-icon fas fa-file-invoice-dollar"></i>
              <p>Тарифы</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('team.list') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Сотрудники</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('history.list') }}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>История</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('certificates.list') }}" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>Лицензии</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('achiev.list') }}" class="nav-link">
              <i class="nav-icon fas fa-certificate"></i>
              <p>Достижения</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("faq.list") }}" class="nav-link">
              <i class="nav-icon fas fa-question"></i>
              <p>FAQ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("comments.list") }}" class="nav-link">
              <i class="nav-icon fas fa-envelope-open"></i>
              <p>Список комментариев</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route("start-trading.list") }}" class="nav-link">
              <i class="nav-icon fas fa-envelope-square"></i>
              <p>как начать торговать (Этапы)</p>
            </a>
          </li>

        </ul>
      </li>
      {{--            Kd-IDEAS--}}
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-business-time"></i>
          <p>
            Kd-Ideas
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('analytics.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analytics</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kd-ideas.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Kd-Ideas</p>
            </a>
          </li>
        </ul>
      </li>
      {{--Users--}}
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-address-card"></i>
          <p>
            Клиенты
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('users.list')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Список клиентов</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.stocks.list')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Акции</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.import.list')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>PNL данныe </p>
            </a>
          </li>
        </ul>
      </li>

      {{--Market data--}}
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-table"></i>
          <p>
            Рыночные данные
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          {{--    Companies                --}}
          <li class="nav-item">
            <a href="{{ route('data.list.comp') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Компании</p>
            </a>
          </li>
          {{--    Companies Keys                --}}
          <li class="nav-item">
            <a href="{{ route('data.list.key') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Руководители</p>
            </a>
          </li>
          {{--    Reports                --}}
          <li class="nav-item">
            <a href="{{ route('report.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Отчёты</p>
            </a>
          </li>
          {{--    Common Data                --}}
          <li class="nav-item">
            <a href="{{ route('data.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Common Данные</p>
            </a>
          </li>
          {{--    Preference daata                --}}
          <li class="nav-item">
            <a href="{{ route('data.list','pref=1') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Preference Данные</p>
            </a>
          </li>


          {{--    Companies analysis                --}}
          <li class="nav-item">
            <a href="{{ route('data.list.analysis') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Analysis</p>
            </a>
          </li>
          {{--    Companies dividend                --}}
          <li class="nav-item">
            <a href="{{ route('dividend.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dividend</p>
            </a>
          </li>


          {{--    Companies analysis                --}}
          <li class="nav-item">
            <a href="{{ route('bonds.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Облигации</p>
            </a>
          </li>


        </ul>
      </li>
      {{--Branches--}}
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-code-branch"></i>
          <p>
            Филиалы
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('branches.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Список</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('branches.list') }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Добавить</p>
            </a>
          </li>
        </ul>
      </li>


      {{--STATISTICS--}}
      <li class="nav-item">
        <a href="{{ route('stat.edit') }}" class="nav-link ">
          <i class="nav-icon fas fa-chart-bar"></i>
          <p>
            Статистика
          </p>
        </a>

      </li>

      {{--M/D COMPANY--}}
      <li class="nav-item">
        <a href="{{route('company-data-page')}}" class="nav-link ">
          <i class="nav-icon fas fa-chart-bar"></i>
          <p>
            M/D COMPANY
          </p>
        </a>

      </li>


      {{--SEO--}}
      {{--            <li class="nav-item has-treeview">--}}
      {{--                <a href="#" class="nav-link ">--}}
      {{--                    <i class="nav-icon fab fa-stripe-s"></i>--}}
      {{--                    <p>--}}
      {{--                        SEO--}}
      {{--                        <i class="fas fa-angle-left right"></i>--}}
      {{--                    </p>--}}
      {{--                </a>--}}
      {{--                <ul class="nav nav-treeview">--}}
      {{--                    <li class="nav-item">--}}
      {{--                        <a href="{{ route('seo.list') }}" class="nav-link">--}}
      {{--                            <i class="far fa-circle nav-icon"></i>--}}

      {{--                            <p>Список</p>--}}
      {{--                        </a>--}}
      {{--                    </li>--}}
      {{--                </ul>--}}
      {{--            </li>--}}
      {{--Settings--}}
      <li class="nav-item">
        <a href="{{ route('settings') }}" class="nav-link ">
          <i class="nav-icon fas fa-cog"></i>
          <p>
            Настройки
          </p>
        </a>
      </li>


    </ul>
  </nav>
</div>
