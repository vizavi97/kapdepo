@extends('admin.home')
@section('content')
  @if(session('message'))
    <script>
      $(function () {

        $(document).ready(function () {

          toastr.success('{{session('message')}}', 'Компания', {timeOut: 5000})
        })
      });
    </script>
  @endif
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Компании</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Главная</a></li>
            <li class="breadcrumb-item active">Компании</li>
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
            <div class="card-header d-flex justify-content-between p-2" style="background-color: rgba(0,0,0,.03);">
              <h3 class="card-title m-0" style="line-height:36px;">Список </h3>
              <div class="d-flex mx-auto">
                <a href="{{route('data.list.comp')}}" class="btn btn-warning mr-1">Все</a>
                <a href="{{route('data.list.comp',["status" => "shares"])}}"
                   class="btn btn-warning mr-1 {{request('status') == "shares" ? "active" : ""}}">Акции</a>

                <a href="{{route('data.list.comp',["status" => "bonds"])}}"
                   class="btn btn-warning mr-1 {{request('status') == "bonds" ? "active" : ""}}">Облигации</a>

                <a href="{{route('data.list.comp',["status" => "shares_bonds"])}}"
                   class="btn btn-warning mr-1 {{request('status') == "shares_bonds" ? "active" : ""}}">Акции и
                  Облигации</a>
              </div>
              <div class="d-flex ml-auto">
                <a href="{{ route('data.create.comp') }}" class="btn btn-success">
                  Добавить
                </a>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0" style="min-height: 200px;">
                  <thead>
                  <tr>
                    <th># ID</th>
                    <th>Заголовок</th>
                    <th>Статус</th>
                    <th>Данные</th>
                    <th style="text-align: center;">Действие</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($comps as $item)
                    <tr>
                      <td>{{ $item->id }}.</td>
                      <td>{{ $item->title }}</td>
                      <td>
                        @switch($item->status)
                          @case("shares")
                          Акции
                          @break

                          @case("bonds")
                          Облигации
                          @break
                          @case("shares_bonds")
                          Акции и облигации
                          @break
                          @default
                          Не привяза
                        @endswitch
                      </td>
                      <td>
                        <a class="" data-toggle="modal" data-target="#modal-data{{ $item->id }}" href="#">
                          <span class="" style="color: blue"><i class="fas fa-eye"></i></span>
                        </a>
                      </td>
                      <td style="width: 1%;">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                              Изменить
                            </button>
                            <div class="dropdown-menu" style="padding: 0">
                              <a class="dropdown-item link-edit"
                                 href="{{ route('data.edit.comp', ['id'=> $item->id]) }}">
                                <span class="edit action"><i class="far fa-edit"></i></span>
                                Изменить
                              </a>
                              <div class="dropdown-divider" style="margin: 0;"></div>
                              <a class="dropdown-item link-lang"
                                 href="{{ route('data.trans.comp', ['id' => $item->id, 'lang' => 'en']) }}">
                                <span class="lang action"><i class="fas fa-globe-asia"></i></span>Перевод eng
                              </a>
                              <a class="dropdown-item link-lang"
                                 href="{{ route('data.trans.comp', ['id' => $item->id, 'lang' => 'uz']) }}">
                                <span class="lang action"><i class="fas fa-globe-asia"></i></span>Перевод uzb
                              </a>
                              <div class="dropdown-divider" style="margin: 0;"></div>
                              <a class="dropdown-item link-delete" data-toggle="modal"
                                 data-target="#modal-danger{{ $item->id }}" href="#">
                                <span class="trash action"><i class="fas fa-trash-alt"></i></span>
                                Удалить
                              </a>
                            </div>
                          </div>
                          <!-- /btn-group -->
                        </div>
                      </td>
                    </tr>
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
                            <a href="{{ route('data.delete.comp', ['id' => $item->id]) }}"
                               class="btn btn-outline-light">Удалить</a>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal fade" id="modal-data{{ $item->id }}">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <h4 class="modal-title">Статичные данные <br>
                              Последние
                              обновление: {{ isset($item->details->updated_at) ? $item->details->updated_at : '-'  }}
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <form action="{{ route('data.change.detail', $item->id) }}" method="post">
                            @csrf
                            <div class="modal-body">
                              <div class="form-group">
                                <label class="required">Common stocks</label>
                                <input class="form-control" required name="common_stocks" type="text"
                                       value="{{ isset($item->details->common_stocks) ? $item->details->common_stocks : '0.00'  }}">
                              </div>
                              <div class="form-group">
                                <label class="required">P/E</label>
                                <input class="form-control" required name="p_e" type="text"
                                       value="{{ isset($item->details->p_e) ? $item->details->p_e : '0.00'  }}">
                              </div>
                              <div class="form-group">
                                <label class="required">P/B</label>
                                <input class="form-control" required name="p_b" type="text"
                                       value="{{ isset($item->details->p_b) ? $item->details->p_b : '0.00'  }}">
                              </div>
                              <div class="form-group">
                                <label class="required">In case of capitalization</label>
                                <input class="form-control" required name="capitalization" type="text"
                                       value="{{ isset($item->details->capitalization) ? $item->details->capitalization : '0.00'  }}">
                              </div>
                              <div class="form-group">
                                <label class="required">Face value of shares</label>
                                <input class="form-control" required name="face" type="text"
                                       value="{{ isset($item->details->face) ? $item->details->face : '0.00'  }}">
                              </div>
                              <div style="display: none;" class="form-group">
                                <label>DIVIDEND</label>
                                <input class="form-control" name="dividend" type="text"
                                       value="{{ isset($item->details->dividend) ? $item->details->dividend : null  }}">
                              </div>
                              <div class="form-group">
                                <label>Preference shares</label>
                                <input class="form-control" name="preference" type="text"
                                       value="{{ isset($item->details->preference) ? $item->details->preference : null  }}">
                              </div>
                              <div class="callout callout-info">
                                <div class="form-group">
                                  <label>Free float (%)</label>
                                  <input class="form-control" name="free_procent" type="text"
                                         value="{{ isset($item->details->free_procent) ? $item->details->free_procent : null  }}">
                                </div>
                                <div class="form-group">
                                  <label>Free float quantity</label>
                                  <input class="form-control" disabled name="" type="text"
                                         value="{{ isset($item->details->free_quantity) ? $item->details->free_quantity : null  }}">
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
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer clearfix">
              <div class="card-tools">
                {{ $comps->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

