@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать данные по дивидендам</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('dividend.list')}}">Дивиденды</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('dividend.edit', $data->id) }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="comp_id">Компания</label>

                                    <select required id="comp_id" name="company_id" class="form-control" >
                                        <option value="">Укажите компанию</option>
                                        @foreach($comps as $item)
                                            <option @if($item->id == $data->company_id) selected="selected"  @endif value="{{ $item->id }}"> {{ $item->title }}</option>

                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="year" class="required">Год</label>
                                    <input required type="text" class="form-control" placeholder="Год" value="{{ $data->year }}" id="year" name="year">
                                </div>

                                <div class="form-group">
                                    <label for="sum" class="required">Сумма</label>
                                    <input required type="text" class="form-control" placeholder="Сумма" value="{{ $data->sum }}" id="sum" name="sum">
                                </div>
                                    <div class="form-group">
                                        <label for="procent" class="required">%</label>
                                        <input required type="text" class="form-control" placeholder="%" value="{{ $data->procent }}" id="procent" name="procent">
                                    </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right">Сохранить</button>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
