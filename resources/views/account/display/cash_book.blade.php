@extends('layouts.fixed')
@section('title','Cash Book')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Cash Book</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Report</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Cash Book Report</li>
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

                        {{Form::open(['url'=>'display/cash_book', 'method'=>'get']) }}

                        <div class="form-row">

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
                                <button class="btn btn-success btn-sm" onclick="printData(); return false;">Print</button>
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
                                    <h3 class="card-title">Cash Book Report</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                <div id="card_body" class="card-body" style="display: block;">
                                    <div class="box-header with-border text-center">
                                        <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                                        <p>{{ str_before(app_info()->address,"|") }}<br>
                                        <small>{{ str_after(app_info()->address,"|") }}</small></p>
                                            <h3>Cash Book</h3>
                                        @if(request('start') && request('end'))
                                        <p>{{ request('start') !=null ? date('d-M-Y', strtotime(request('start'))) :'--' }} To {{ request('end') !=null ? date('d-M-Y',strtotime(request('end'))) :'--' }}</p>
                                        @else
                                        <p>{{ date('d-M-Y') }}</p><br>
                                        @endif
                                    </div>
                                    <div class="box-body with-border">
                                    <table class="table display" style="width:100%">
                                        <thead class="head_table">
                                            <tr>
                                                <th class="date_column">Date</th>
                                                <th width="10px"></th>
                                                <th class="pr" style="min-width: 40%" >Particulars</th>
                                                <th style="max-width: 4%">Vch Type<br>Vch.No</th>
                                                {{-- <th style="max-width: 5%">Vch.No/</th> --}}
                                                <th style="max-width: 12%; min-width: 10%" class="text-center">Debit</th>
                                                <th style="max-width: 12%; min-width: 10%" class="text-center">Credit</th>
                                                <th style="max-width: 12%;" class="text-center">Balance</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                           
                                            @php
                                            $continue=0;
                                            @endphp
                                            @if ($journals != null)
                                                @forelse($journals as $journal_entry)
                                              
                                                    <tr>
                                                        <td class="date_column">
                                                            <span>{{ $journal_entry->first()->journal->date->format('d-m-Y') }}</span>
                                                        </td>
                                                        <td>
                                                            @if($journal_entry->first()->type == 0)
                                                                TO
                                                            @endif

                                                            @if($journal_entry->first()->type == 1)
                                                                BY
                                                            @endif
                                                        </td>
                                                        <td class="text-left">
                                                            @if($journal_entry->count() > 1)
                                                                (as per details) <br>
                                                            @endif

                                                            @foreach($journal_entry as $ledger)
                                                                @if($ledger->type==0)
                                                                    @foreach($ledger->journal->journalEntries as $oppostiteEntry)
                                                                        @if($oppostiteEntry->type==1)
                                                                            {{ $oppostiteEntry->acchead->name }} <br>
                                                                        @endif
                                                                    @endforeach
                                                                
                                                                @else
                                                                    @foreach($ledger->journal->journalEntries as $oppostiteEntry)
                                                                        @if($oppostiteEntry->type==0)
                                                                            {{ $oppostiteEntry->acchead->name }} <br>
                                                                        @endif
                                                                     @endforeach
                                                                @endif
                                                            @endforeach
                                                            <small>{{ $journal_entry->first()->journal->event }}</small>
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-default">{{$journal_entry->first()->note}}</span><br>
                                                            {{ $journal_entry->first()->journal->journal_no }}
                                                        </td>
                                                        {{-- <td>{{ $journal_entry->first()->journal->journal_no }}</td> --}}
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
        $(document).ready(function(){
                $('#datepicker').datepicker({
                    format: 'yyyy-mm-dd'
                });
            });

            
            function printData(){
                // $('#btn_print').hide();              
                // $('#card_body').hide();              
                var contentPrint=document.getElementById('card_body').innerHTML;
                var contentOrg=document.body.innerHTML;
                document.body.innerHTML=contentPrint;
                window.print();
                document.body.innerHTML=contentOrg;
                // $('#btn_print').show();
                // $('#card_body').show();
		}
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
         @media print {
            @page {
                    size: A4; /* DIN A4 standard, Europe */
                    margin:1cm;
                    }
			html, body {
				width: 100% /*210mm*/;
				/* height: 297mm; */
				height: 282mm;
				/*font-size: 110%;*/
				background: #FFF;
				overflow:visible;
			}
			body {
				padding-top:15mm 5mm 0;
			}
         }
         .head_table{
                background-color: black;
                color: white;
            }
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
            width: 10%;
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