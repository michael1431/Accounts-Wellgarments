@extends('layouts.fixed')
@section('title','Ledger Book')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Individual Ledger</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Ledgers Report</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{--start searching individual ledger report --}}
    <section class="content no-print">
        <div class="container-fluid">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                @if($errors->any())
                    <div class="col-md-12 alert alert-danger emptyMsg">
                        <h6>{{$errors->first(1)}}</h6>
                    </div>
                @endif

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">

                        {{Form::open(['url'=>'reports/ledger', 'method'=>'get']) }}

                        <div class="form-row">
                            <div class="form-group col-md-3" style="margin: -2px 0 0 0;">
                                {{Form::label('ledger_name', 'Accounts Name', ['class'=>''])}}
                                {!! Form::select('ledger_name',$repository->ledgerLists(),null,['class' => 'form-control','placeholder'=>'Ledger Name']) !!}
                            </div>

                            <div class="form-group col-md-2">
                                {{-- <label class="input-group-addon"></label>--}}
                                {{Form::label('accounts_name', 'From Date', ['class'=>''])}}
                                <input type="text" name="start" id="start" style="margin: -1px 2px" class="datePicker form-control pull-right"  placeholder="select start date">
                            </div>

                            <div class="form-group col-md-2">
                                {{--<label class="input-group-addon"></label>--}}
                                {{Form::label('accounts_name', 'To Date', ['class'=>''])}}
                                <input type="text" name="end" id="end" style="margin: -1px 2px" class="datePicker form-control pull-right"  placeholder="select end date">
                            </div>

                            <div class="form-group col-md-3" style="padding-bottom: 10px; margin: 29px 0 0 0;">
                                <input type="submit" class="btn btn-info" value="search">
                            </div>

                            <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                                <button class="btn btn-success btn-sm" onclick="window.print(); return false;">Print</button>
                                <button class="btn btn-primary btn-sm" href="#add_show_case" data-toggle="tab">Pdf</button>
                            </div>
                        </div>
                        {{  Form::close() }}

                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>{{--end --}}
    </section>
    {{--end searching individual ledger report --}}




    {{--    <!-- Main content -->--}}
    <section class="content">
        <div class="col-lg-12">
            <div class="card-body">
                {{-- start showin gsuccess message --}}
                <div class="col-md-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                {{-- end showin gsuccess message --}}
                <br><br>


                <div class="row">
                    <div class="col-lg-12">
                        <div class=" bg-light">
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Ledger Report</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                <div class="card-body" style="display: block;">
                                    <div class="box-header with-border text-center" style="margin-bottom: -25px!important;">
                                        <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                                        <p>{{ str_before(app_info()->address,"|") }}</p>
                                        <small>{{ str_after(app_info()->address,"|") }}</small>

                                        @if (!empty($ledger_name))
                                            <h3>{{\App\Account\AccountLedger::query()->where('id',$ledger_name)->first()->name }}</h3>
                                        @else
                                            <h3>Select a accounts name</h3>
                                        @endif
                                    <p>{{ request('start') !=null ? date('d-M-Y', strtotime(request('start'))) :'--' }} To {{ request('end') !=null ? date('d-M-Y',strtotime(request('end'))) :'--' }}</p>
                                    </div>

                                    <table class="table table-striped display" id="myTable" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th class="date_column">Date</th>
                                                <th width="20px"></th>
                                                <th class="pr" style="min-width: 100px" >Particulars</th>
                                                <th style="max-width: 25px">Vch Type</th>
                                                <th style="max-width: 25px">Vch.No/</th>
                                                <th style="max-width: 25px" class="text-center">Debit</th>
                                                <th style="max-width: 25px" class="text-center">Credit</th>
                                                <th style="max-width: 25px" class="text-center">Balance</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                            @php
                                            $continue=0;
                                            @endphp
                                            @if ($journals != null)
                                                @forelse($journals as $journal_entry)
                                              
                                                    <tr>
                                                        <td class="date_column"><span>{{ $journal_entry->first()->journal->date->format('d-m-Y') }}</span></td>
                                                        <td>
                                                            @if($journal_entry->first()->type == 0)
                                                                TO
                                                            @endif

                                                            @if($journal_entry->first()->type == 1)
                                                                BY
                                                            @endif
                                                        </td>
                                                        <td class="text-left">
                                                            @if($journal_entry->count() > 2)
                                                                (as per details) <br>
                                                            @endif

                                                            @foreach($journal_entry as $ledger)
                                                                @if($ledger->type==0)
                                                                    @foreach($ledger->journal->journalEntries as $oppostiteEntry)
                                                                        @if($oppostiteEntry->type==1)
                                                                            {{ $oppostiteEntry->acchead->name }} <br>
                                                                            {{-- @if($oppostiteEntry->count() > 2)
                                                                            {{$oppostiteEntry}}
                                                                                {{ number_format($oppostiteEntry->amount,2) }} Dr.<br>
                                                                            @endif --}}
                                                                        @endif
                                                                    @endforeach
                                                                
                                                                @else
                                                                    @foreach($ledger->journal->journalEntries as $oppostiteEntry)
                                                                        @if($oppostiteEntry->type==0)
                                                                            {{ $oppostiteEntry->acchead->name }} <br>
                                                                            {{-- @if($oppostiteEntry->count() > 2)
                                                                            {{$oppostiteEntry}}
                                                                                {{ number_format($oppostiteEntry->amount,2) }} Dr.
                                                                            @endif --}}
                                                                        @endif
                                                                @endforeach
                                                                @endif
                                                                <br>
                                                            @endforeach
                                                        </td>
                                                        <td>{{$journal_entry->first()->note}}</td>
                                                        <td><a href="{{ route('journal.edit',$journal_entry->first()->journal->id) }}">
                                                        {{$journal_entry->first()->journal->journal_no}}</a></td>
                                                        <td align="right">
                                                            @if($journal_entry->first()->type==0)
                                                                {{ number_format($journal_entry->sum('amount'),2) }}
                                                                @php
                                                                    $continue+=$journal_entry->sum('amount')
                                                                @endphp
                                                            @endif
                                                        </td>

                                                        <td align="right">
                                                            @if($journal_entry->first()->type==1)
                                                                {{ number_format($journal_entry->sum('amount'),2) }}
                                                                @php
                                                                    $continue-=$journal_entry->sum('amount')
                                                                @endphp
                                                            @endif
                                                        </td>
                                                        <td align="right">
                                                               
                                                                @if($continue>0)
                                                                    <span>{{ number_format($continue,2) }}</span>
                                                                @else
                                                                    <span>({{ ltrim(number_format($continue,2),'-') }})</span>
                                                                @endif
                                                            </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            @endif
                                        </tbody>

                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td width="200">Balance Upto Date</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td align="right">
                                                        @if($continue>0)
                                                            <span>{{ number_format($continue,2) }}</span>
                                                        @else
                                                            <span>({{ ltrim(number_format($continue,2),'-') }})</span>
                                                        @endif
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="pull-right"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
@stop
@section('style')

@stop
@section('plugin')

@stop

@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").fadeOut(500, function(){
                    $(this).remove();
                });
            }, 1200);

        });

        //delete confirmation  message
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this ?');
            return !!x;
        }

        //search report date wise (function for date picker)
        $(function () {
            $('.datePicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        })
    </script>
@stop



@section('css')
    <style>
        .table tr td, .table tr th{
            border: none;
        }
        span.tab { margin-left: 40px; }
        td.underline{
            border-bottom: solid 2px;
        }
        table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
            border-top: 0px solid #ddd!important;
        }
        .date_column{
            text-align: right;
        }
        tr td {
            font-weight: bold;
        }
        .fw_normal {
            font-weight: normal;
        }
        .ledgerHeading {
            font-size: 17px!important;
            margin: -8px 0 23px 0;
            font-weight: bold;
        }
        .unitName {
            font-size: 21px;
            font-weight: bold;
        }
    </style>
@stop
{{--end by ahmed --}}