@extends('admin.home')

@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Статистика', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Блок статистика</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Статистика</li>
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
                        <form action="{{ route('stat.edit') }}" method="post">
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
                                    <label for="fond">ГАРАНТИЙНЫЙ ФОНД</label>
                                    <input type="text" class="form-control" value="{{ $stat->fond }}"  id="fond" name="fond">
                                </div>
                                <div class="form-group">
                                    <label for="transactions">Лучший инвестиционный консультант </label>
                                    <input type="text" class="form-control" value="{{ $stat->transactions }}"  id="transactions" name="transactions">
                                </div>
                                <div class="form-group">
                                    <label for="years"> УСПЕШНОЙ ДЕЯТЕЛЬНОСТИ</label>
                                    <input type="text" class="form-control" value="{{ $stat->years }}"  id="years" name="years">
                                </div>
                                <div class="form-group">
                                    <label for="clients">ДОВОЛЬНЫХ КЛИЕНТОВ</label>
                                    <input type="text" class="form-control" value="{{ $stat->clients }}"  id="clients" name="clients">
                                </div>
                                <div class="form-group">
                                    <label for="clients_count">ОбЩЕЕ КОЛ-ВО КЛИЕНТОВ</label>
                                    <input type="text" class="form-control" value="{{ $stat->clients_count }}"  id="clients_count" name="clients_count">
                                </div>


                            </div>
                            <div class="card-footer">
                                <a class="btn btn-success" href="{{ route('stat.update') }}">Обновить</a>
                                <button type="submit" class="btn btn-success float-right">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
