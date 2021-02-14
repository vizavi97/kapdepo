<div class="container-fluid">
    <div class="row">
        {{--title--}}
        <div class="col-md-12">
            <h3 class="profile-title">{{ $comp->title }}</h3>
        </div>
        <div class="col-md-6">
            <div class="profile-info">
                <p>{{  isset($comp->info->address) ? $comp->info->address : 'none translation' }}</p>
                <p>{{ isset($comp->info->phone) ? $comp->info->phone : 'none translation' }}</p>
                <p><a href="{{ isset($comp->info->site) ? $comp->info->site : '#'  }}" target="_blank">
                        {{ isset($comp->info->site) ? $comp->info->site : 'none translation' }}</a>
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="profile-category">
                <li>@lang('Сектор'): <span>{{ isset($comp->info->sector) ? $comp->info->sector : 'none translation' }}</span></li>
                <li>@lang('Промышленность'): <span>{{ isset($comp->info->industry) ? $comp->info->industry : 'none' }}</span></li>
            </ul>
        </div>
        {{--Key table--}}
        <div class="col-md-12">
            <h3 class="profile-title">@lang('Руководители')</h3>
            <div class="profile-table-block">

                <table class="profile-table">
                    <thead>
                    <tr>
                        <th>@lang('Имя')</th>
                        <th>@lang('Должность')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($keys as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->position }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--Desc--}}
        <div class="col-md-12">
            <h3 class="profile-title">@lang('Описание')</h3>
            <div class="profile-desc-block">
                <p>@if(isset($comp->info->desc)) {!! $comp->info->desc !!} @else none translation @endif</p>
            </div>
        </div>
    </div>
</div>


<style>
    .profile-title{
        padding: 0 20px;
        font-weight: bold;
        font-size: 17px;
        margin-top: 30px;
    }
    .profile-category{
        list-style-type: none;
        padding: 0;
    }
    .profile-info{
        padding-left: 20px;
    }
    .profile-info p{
        margin: 0;
    }

    .profile-category span{
        font-weight: bold;
    }
    .profile-table-block , .profile-desc-block{
        padding: 0 20px;
    }
    .profile-table{
        width: 100%;
        /*margin: 0 20px;*/
    }
    .profile-table tr{
        border-bottom: 1px solid #e0e4e9;
    }
    .profile-table th{
        font-size: 13px;
        color: #5b636a;
    }
    .profile-table tr td{
        font-size: 15px;
        padding: 5px 0;
    }
    .profile-desc-block p, .profile-info p, .profile-category li{
        font-size: 15px;
    }
</style>
