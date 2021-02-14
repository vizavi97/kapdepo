<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('market.balance', ['issuer' => $issuer]) }}" method="get" class="report-filter">
                <div class="form-group">
                    <label for="quarter">@lang('Квартал')</label>
                    <select name="quarter" id="quarter" class="form-control">
                        <option value="1" @if(!empty($report) && $report->quater == 1 ||  Request::get('quarter') == 1) selected @endif>1</option>
                        <option value="2" @if(!empty($report) && $report->quarter == 2 || Request::get('quarter') == 2) selected @endif>2</option>
                        <option value="3" @if(!empty($report) && $report->quarter == 3 ||  Request::get('quarter') == 3) selected @endif>3</option>
                        <option value="4" @if(!empty($report) && $report->quarter == 4 ||  Request::get('quarter') == 4) selected @endif>4</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="year">@lang('Год')</label>
                    <input type="number" required name="year" id="year" value="{{ isset($report->year) ? $report->year : Request::get('year')}}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn report-filter-btn">@lang('Применить')</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="report-table">
                @if(empty($report))
                    <h5 >@lang('Нет данных')</h5>
                @else
                    {!!  $report->body !!}
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .report-table h5{
        font-weight: bold;
        text-align: center;
        margin: 25px;
    }
    .report-filter{
        width: 50%;
        margin: 15px auto;
    }
    .report-filter .form-group{
        display: inline-flex;
        margin: 0 2%;
    }
    .report-filter .form-group label{
        font-weight: bold;
        margin: 0;
        padding: 5px 5px;
    }
    .report-filter .report-filter-btn{
        border: 1px solid #0151D3;
        font-weight: bold;
        color: #0151D3;
        border-radius: 20px;
    }
    .report-filter .report-filter-btn:hover{
        color: white;
        background-color: #0151D3;
    }
    /*table*/
    .report-table table{
        margin: 25px auto;
        width: 100% !important;
    }
    .report-table tbody tr td{
        width: auto !important;
        height: auto !important;
        padding: 0px 5px !important;
    }
    .report-table tbody tr:not(:first-child):hover{
        background-color: #e0f0ff;

    }
    .report-table tbody tr td{
        border: none !important;
    }
    .report-table tbody tr:nth-child(even){
        background-color: #f5f5f7;
    }
    .report-table tbody tr td:first-child{
        font-weight: bold !important;
    }
</style>
