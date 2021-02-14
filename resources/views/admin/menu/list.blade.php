@extends('admin.home')

@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'Меню', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Меню</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Меню</li>
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
                            <h3 class="card-title m-0" style="line-height:36px;">Список пунктов</h3>
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('menu.list.lang', ['lang' => 'ru']) }}" style="margin-right: 5px;" class="btn btn-success">
                                        Русский
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('menu.list.lang', ['lang' => 'en']) }}" style="margin-right: 5px;" class="btn btn-success">
                                        Английский
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('menu.list.lang', ['lang' => 'uz']) }}" style="margin-right: 5px;" class="btn btn-success">
                                        Узбекский
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('menu.create') }}" class="btn btn-success">
                                        Добавить
                                    </a>
                                </li>
                            </ul>
                        </div>

                            <div class="card-body">

                                <div class="dd">
                                    <ol class="dd-list">
                                        @foreach($menu as $item)
                                            <li class="dd-item dd3-item"  data-id="{{ $item->id }}">
                                                <div class="dd3-handle dd-handle">
                                                </div>
                                                <div class="dd3-content">{{ $item->title}}</div>
                                                <div class="btn-group">
                                                    <a href="{{ route('menu.edit', ['id' => $item->id]) }}" class="btn-actions">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="del btn-actions" data-toggle="modal" data-target="#modal-danger{{ $item->id }}"> <span class="trash"><i class="far fa-trash-alt"></i> </span> </a>
                                                </div>
                                                @if(isset($item->children))
                                                    <ol class="dd-list">
                                                        @foreach($item->children as $child)
                                                            <li class="dd-item dd3-item"  data-id="{{ $child->id }}">
                                                                <div class="dd3-handle dd-handle">
                                                                </div>
                                                                <div class="dd3-content">{{ $child->title}}</div>
                                                                <div class="btn-group">
                                                                    <a href="{{ route('menu.edit', ['id' => $child->id]) }}" class="btn-actions">
                                                                        <i class="far fa-edit"></i>
                                                                    </a>
                                                                    <a href="#" class="del btn-actions" data-toggle="modal" data-target="#modal-danger{{ $child->id }}"> <span class="trash"><i class="far fa-trash-alt"></i> </span> </a>
                                                                </div>
                                                                @if(isset($child->children))
                                                                    <ol class="dd-list">
                                                                        @foreach($child->children as $little)
                                                                            <li class="dd-item dd3-item"  data-id="{{ $little->id }}">
                                                                                <div class="dd3-handle dd-handle">
                                                                                </div>
                                                                                <div class="dd3-content">{{ $little->title}}</div>
                                                                                <div class="btn-group">
                                                                                    <a href="{{ route('menu.edit', ['id' => $little->id]) }}" class="btn-actions">
                                                                                        <i class="far fa-edit"></i>
                                                                                    </a>
                                                                                    <a href="#" class="del btn-actions" data-toggle="modal" data-target="#modal-danger{{ $little->id }}"> <span class="trash"><i class="far fa-trash-alt"></i> </span> </a>
                                                                                </div>
                                                                            </li>
                                                                            <div class="modal fade" id="modal-danger{{ $little->id }}">
                                                                                <div class="modal-dialog">
                                                                                    <div class="modal-content bg-danger">
                                                                                        <div class="modal-header">
                                                                                            <h4 class="modal-title">Вы уверены, что хотите удалить ? </h4>
                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                <span aria-hidden="true">&times;</span>
                                                                                            </button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <p>{{  $little->title }}</p>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <a href="{{ route('menu.delete', ['id' => $little->id]) }}" class="btn btn-outline-light">Удалить</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </ol>
                                                                @endif
                                                            </li>
                                                            <div class="modal fade" id="modal-danger{{ $child->id }}">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content bg-danger">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Вы уверены, что хотите удалить ? </h4>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>{{  $child->title }}</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a href="{{ route('menu.delete', ['id' => $child->id]) }}" class="btn btn-outline-light">Удалить</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </ol>
                                                @endif
                                            </li>

                                        @endforeach
                                    </ol>
                                    @foreach($menu as $item)
                                        <div class="modal fade" id="modal-danger{{ $item->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content bg-danger">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Вы уверены, что хотите удалить ? </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>{{  $item->title }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('menu.delete', ['id' => $item->id]) }}" class="btn btn-outline-light">Удалить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button"  class="saveorder btn btn-primary float-right">Сохранить</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <script type="text/javascript">



        $(document).ready(function () {
                $('.dd').nestable({
                    maxDepth: 4,
                    group: 3
                });


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')
                }
            });

            $('.saveorder').on('click', function () {
                var order = $('.dd').nestable('serialize');
                console.log(order)
                $.ajax({
                    type: 'POST',
                    url: '{{route('menu.order')}}',
                    data: {menu:order},
                    success: function (data) {
                        console.log(data)
                        location.reload();
                        toastr.success('{{session('message')}}', 'Меню обновлено ', {timeOut: 5000})
                    }
                });
            });


        });


    </script>
@endsection
