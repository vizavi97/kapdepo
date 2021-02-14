@extends('admin.home')

@section('content')
    @if(session('message'))
        <script>
            $(function() {

                $(document).ready(function(){

                    toastr.success('{{session('message')}}', 'SEO', {timeOut: 5000})
                })
            });
        </script>
    @endif
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Seo страниц</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
                        <li class="breadcrumb-item active">SEO</li>
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
                            <h3 class="card-title m-0" style="line-height:36px;">Список страниц</h3>
                            <ul class="nav nav-pills ml-auto">
                                <li class="nav-item">
                                    <a href="{{ route('seo.create') }}" class="btn btn-success">
                                        Добавить
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-0">

                        </div>
                        <div class="card-footer clearfix">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection