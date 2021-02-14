@extends('admin.home')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Редактировать отчёт</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('report.list')}}">Отчёты</a></li>
                        <li class="breadcrumb-item active">Добавить отчёт</li>
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
                        <form action="{{ route('report.edit', $report->id) }}" method="post" enctype="multipart/form-data">
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
                                    <label class="required">Тип отчёта</label>
                                    <div class="form-check">
                                        <input type="radio" id="finance" name="type" @if($report->type == 'finance') checked @endif required value="finance" class="form-check-input">
                                        <label for="finance" class="form-check-label">Финансовый</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" id="balance" name="type" @if($report->type == 'balance') checked @endif required value="balance" class="form-check-input">
                                        <label for="balance" class="form-check-label">Баланс</label>
                                    </div>
                                </div>
                                <div class="callout callout-info">

                                    <label class="required">Укажите период</label>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="kvartal"> Квартал </label>
                                            <select name="kvartal" id="kvartal" class="form-control" >
                                                <option >Выбрать</option>
                                                @switch($report->quarter)
                                                    @case(1)
                                                        <option value="1" selected>1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    @break
                                                    @case(2)
                                                        <option value="1">1</option>
                                                        <option value="2" selected>2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    @break
                                                    @case(3)
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3" selected>3</option>
                                                        <option value="4">4</option>
                                                    @break
                                                    @case(4)
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4" selected>4</option>
                                                    @break
                                                @endswitch

                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label>Дата:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="dd/mm/YYYY" name="date"  value="{{ $report->date }}" data-inputmask='"mask": "99/99/9999"' data-mask>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="title" class="required">Выбрать компанию</label>
                                    <select name="company" class="form-control">
                                        <option> Выбрать компанию</option>
                                        @foreach($comps as $comp)
                                            <option value="{{ $comp->id }}" @if($report->company_id == $comp->id) selected @endif >{{ $comp->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="body" class="required">Отчёт (скопируйте и вставьте таблицу)</label>
                                    <textarea class="textarea" name="body" id="body" >{{ $report->body }}</textarea>
                                </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            var count = 1;
            var editor = CKEDITOR.replace( 'body', {

            } );
        });

    </script>
@endsection