@extends('admin.home')
@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Данные', {timeOut: 5000})
                })
            });
        </script>
    @endif

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Рыночные данные {{ $type }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Рыночные данные</li>
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
                        <div class="card-header d-flex p-2" style="background-color: rgba(0,0,0,.03);">
                            <h3 class="card-title m-0" style="line-height:36px;">Список </h3>
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="#" data-toggle="modal" data-target="#modal-single" class="btn btn-success">
                                        Добавить
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0" style="min-height: 200px;">
                                    <thead>
                                    <tr>
                                        <th># ID</th>
                                        <th>Компания</th>
                                        <th>Цена</th>
                                        <th>Volume</th>
                                        <th>Время/Дата</th>
                                        <th style="text-align: center;">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->company->title }}</td>
                                                <td>{{ $item->last_price }}</td>
                                                <td>{{ $item->volume }}</td>
                                                <td>{{ date('H:i d-m-Y', $item->timestamp) }}</td>
                                                <td style="width: 1%;">
                                                    {{--<a class="" href="">--}}
                                                        {{--<span class="edit action"><i class="far fa-edit"></i></span>--}}
                                                    {{--</a>--}}

                                                    <a class="" data-toggle="modal" data-target="#modal-danger{{ $item->id }}" href="#">
                                                        <span class="trash action" style="color: red"><i class="fas fa-trash-alt"></i></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-danger{{ $item->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Вы уверены, что хотите удалить данныe ? </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{--<p>{{   $item->company->title .  ' - ' . $item->quarter . ' - ' . $item->date }}</p>--}}
                                                        </div>
                                                        <div class="modal-footer">
                                                            @if($type == 'Preference')
                                                                <a href="{{ route('data.delete', ['id' => $item->id, 'pref' => 1]) }}" class="btn btn-outline-light">Удалить</a>

                                                            @else
                                                                <a href="{{ route('data.delete', $item->id) }}" class="btn btn-outline-light">Удалить</a>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <div class="card-tools">
                                {{ $datas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-single">
        <div class="modal-dialog">
            <div class="modal-content bg-success">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить одиночный файл  </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('data.create.single') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($type == 'Preference')
                                <input type="hidden" name="pref" value="1">
                        @endif
                        <div class="form-group">
                            <label for="comp_id">Компания</label>
                            <select  required class="form-control" name="comp_id" id="comp_id">
                                <option value="">Укажите компанию</option>
                                @foreach($comps as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="required">Файл</label>
                            <div class="form-group">
                                <label for="image" class="form-control name-image" style="cursor: pointer;"> <i class="far fa-images"></i> Загрузить файл</label>
                                <input style="display: none;" type="file" class="form-control" placeholder="Название" id="image" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-success">
                        <button type="submit" class="btn btn-outline-light">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script type="text/javascript">
            $(document).ready(function () {

                $('#modal-single').modal('show');
            })
        </script>
    @endif
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                // $('.preview').css('display' , 'block');

                reader.onload = function (e) {
                    $('.prev-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#image").change(function () {
            readURL(this);
            var text  = '';
            var test = $('#image').prop('files');
            // text = test[0].name;
            $('.name-image').text(test[0].name);
            // console.log(text);
        });

    </script>
@endsection
