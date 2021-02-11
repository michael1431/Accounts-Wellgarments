@extends('layouts.fixed')
@section('title',strtoupper($transactions->journalEntries->first()->note).' voucher')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{strtoupper($transactions->journalEntries->first()->note).' Voucher'}} </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage {{strtoupper($transactions->journalEntries->first()->note).' Voucher'}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class=" col-lg-12 row">

            <div class="col-md-12  table-responsive ledger-group text-capitalize">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-info">{{strtoupper($transactions->journalEntries->first()->note).' Voucher'}} Report </h5>
                        </div>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="container-fluid">
                        <div class="pull-right">

                            <button type="button" class="btn btn-info btn-sm" onClick="printData()">Print this page</button>
                            <a href="{{URL::previous() }}">
                                <button type="button" class="btn btn-danger btn-sm">
                                    Back to Previous Page
                                </button>
                            </a>
                            <a href="{{url('generate/pdf')}}" class="btn btn-warning btn-sm" type="button">
                                generate pdf
                            </a>
                        </div>
                    </div>

                    

                    <div id="card_body" class="card-body" style="display: block;">
                        <div class="table-responsive">
                            <div class="card-body" style="display: block;">
                                <div class="text-center">
                                    <h4 class="text-secondary">{{ unit_name() ?? app_info()->company_name }}</h4>
                                    <h4 class="text-secondary">{{ str_before(app_info()->address,"|") }}</h4>
                                    <p class="text-secondary">{{ str_after(app_info()->address,"|") }}</p>
                                    <p class="text-secondary">{{ app_info()->email }}</p>
                                    <h4 class="text-secondary">{{strtoupper($transactions->journalEntries->first()->note).' Voucher'}}</h4>
                                </div>
                                <table class="table">
                                    <tr>
                                        <td width="33%">No :{{$transactions->journal_no}}</td>
                                        <td width="25%"></td>
                                        <td width="42%" class="text-right">Dated : {{$transactions->date}} </td>
                                    </tr>
                                </table>

                                <div class="table-responsive">
                                    <table class="table table-hover capitalize table-bordered" id="myTable">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th style="min-width:80%">Particulars</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <b>Account :</b>
                                                    <ul>
                                                        @forelse ($transactions->journalEntries as $jr)
                                                            @if($jr->type==0)
                                                            <li>{{ $jr->acchead->name }}</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                        
                                                    </ul>
                                                    <b>To :</b>
                                                        <ul style="list-style-type:none">
                                                            @forelse ($transactions->journalEntries as $jr)
                                                                @if($jr->type==1)
                                                                    <li>{{ $jr->acchead->name }}</li>
                                                                @endif
                                                            @empty
                                                                
                                                            @endforelse
                                                        </ul>
                                                    <b>On Account of :</b>
                                                    <ul style="list-style-type:none">
                                                        <li>{{$transactions->event}}</li>
                                                    </ul>
                                                </td>
                                                <td class="text-right">
                                                    <b>&nbsp;</b>
                                                    <ul style="list-style-type:none">
                                                        @php
                                                            $amount=0;
                                                        @endphp
                                                        @forelse ($transactions->journalEntries as $jr)
                                                            @if($jr->type==0)
                                                            @php
                                                                $amount+=$jr->amount;
                                                            @endphp
                                                                <li>{{ number_format($jr->amount,2) }}</li>
                                                            @else
                                                                <li>&nbsp;</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                        
                                                    </ul>
                                                </td>
                                                <td class="text-right">
                                                    <b>&nbsp;</b>
                                                    <ul style="list-style-type:none">
                                                        <li>&nbsp;</li>
                                                        <li>&nbsp;</li>
                                                        @php
                                                            $camount=0;
                                                        @endphp
                                                        @forelse ($transactions->journalEntries as $jr)
                                                            @if($jr->type==1)
                                                            @php
                                                                $camount+=$jr->amount;
                                                            @endphp
                                                                <li>{{ number_format($jr->amount,2) }}</li>
                                                            @else
                                                                <li>&nbsp;</li>
                                                            @endif
                                                        @empty
                                                            
                                                        @endforelse
                                                        
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"></td>
                                            </tr>
                                        </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td><b>Total Amount :</b></td>
                                                    <td class="text-right"><strong>{{ number_format($amount,2)}}</strong></td>
                                                    <td class="text-right"><strong>{{ number_format($camount,2)}}</strong></td>
                                                </tr>
                                            </tfoot>
                                    </table>
                                    <table class="table">
                                        
                                        <tr>
                                            
                                            <td width="50%" class="text-center">
                                                <br><br><br><span style="padding:0 30px; border-top:solid 2px black">  Receiver's Signature  </span>
                                            </td>
                                            <td width="50%" class="text-center">
                                                <br><br><br>
                                                <span style="padding:0 30px; border-top:solid 2px black">  Authorised Signature  </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
{{--    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">--}}
@stop

@section('css')
    <style>
         @media print {
            @page {
                    size: A5; /* DIN A4 standard, Europe */
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
        .capitalize label,.capitalize th{
            text-transform: capitalize!important;
        }
        .table td, .table th {
            padding: 0.40rem;
            vertical-align: top;
            /*font-size: 14PX;*/
            border-top: 1px solid #dee2e6;
            font-family: monospace;
            font-weight: normal;
        }
    </style>
@stop

@section('plugin')
    <!-- DataTables -->
{{--    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>--}}
@stop

@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function () {
            window.setTimeout(function() {
                $(".alert").slideUp(1000, function(){
                    $(this).remove();
                });
            }, 1200);
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
    </script>
@stop

