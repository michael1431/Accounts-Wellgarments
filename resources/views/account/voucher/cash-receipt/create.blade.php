@extends('layouts.fixed')
@section('title',strtoupper(Request::segment(2)).' voucher')
@section('content')
    
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{strtoupper(Request::segment(2))}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage {{strtoupper(Request::segment(2))}} Voucher</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class=" col-lg-12 row">
            <div class="col-lg-12">
                <div class="bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add {{strtoupper(Request::segment(2))}}</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body capitalize bg-dark" style="display: block;">
                            {{ Form::open(['route'=>'journal.store','method'=>'POST', 'class'=>'form-horizontal','onsubmit'=>'return confirm("Are You Sure About the Post?")']) }}
                            @include('account.voucher.cash-receipt.form')
                            <div class="form-group">
                                <div class="">
                                    {{ Form::submit('Submit', ['class'=>'btn btn-success btn-block']) }}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-8  table-responsive ledger-group text-capitalize">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-info">{{strtoupper(Request::segment(2))}} List</h5>
                        </div>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body" style="display: block;">
                        <div class="table-responsive">
                            @include('account.voucher.cash-receipt.lists')
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div> --}}
        </div>
    </section>
    <!-- /.content -->

@stop

@section('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@stop

@section('css')
    <style>
        .capitalize label,.capitalize th{
            text-transform: capitalize!important;
        }
        .table td, .table th {
            padding: 0.40rem;
            vertical-align: top;
            FONT-SIZE: 14PX;
            border-top: 1px solid #dee2e6;
            font-family: monospace;
            font-weight: normal;
        }
    </style>
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
@stop

@section('script')
    <!-- page script -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#journal_no').val("<?php echo $journal_no; ?>");
            window.setTimeout(function() {
                $(".alert").slideUp(1000, function(){
                    $(this).remove();
                });
            }, 1200);
        });
        i=0;
        function addNewRow(){
            i++;
            var htmlData=` <div id="removalL`+i+`" class="col-md-7 form-group{{ $errors->has('cr_ledger_id') ? ' has-error' : '' }}">
    {{ Form::label('cr_ledger_id[]','Account Names (Cr): ') }}
    {{-- including ledger's id as debit ledger group id--}}
    {!! Form::select('cr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Credit Accounts','required']) !!}
    @if($errors->has('cr_ledger_id[]'))
        <span class="help-block">
            <strong>{{ $errors->first('cr_ledger_id[]') }}</strong>
        </span>
    @endif
    </div>

    <div id="removalA`+i+`" class="col-md-5 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        {{ Form::label('', 'Amount ', ['class'=>'label-control']) }}
        <div class="input-group mb-3">
        {{ Form::number('cr_amount[]',old('cr_amount'),['class'=>'cr_amount form-control','onkeyup'=>'getSum()','placeholder'=>'','autofocus','required']) }}
        <div class="input-group-append" id="removalB`+i+`"><button type="button" class="btn btn-outline-danger" onclick="removeRow(`+i+`)"><i class="fa fa-minus"></i></button></div>
        </div>
        @if ($errors->has('cr_amount'))
            <span class="help-block text-center" id="success-alert">
                <strong>{{ $errors->first('cr_amount') }}</strong>
            </span>
        @endif
    </div>`;
    $('#AppendDebitRow').append(htmlData);
            $("select").select2();
        }
        function removeRow(rowNo){
            $('#removalL'+rowNo).remove();
            $('#removalA'+rowNo).remove();
            $('#removalB'+rowNo).remove();
            //$("select").select2();
        }
        function getSum(){
           
                var sum = 0;
                $('.cr_amount').each(function(){
                    sum += parseFloat(this.value);
                });
                console.log(sum);

                //define totalDebit as globally for retrieving from credit section
                window.totalDebit = sum;

                $('#dr_amount').val(sum);
         
        }
        function doc_keyUp(e){
            if(e.ctrlKey && e.keyCode ==119){
                addNewRow();
            }
        }
        document.addEventListener('keyup',doc_keyUp, false);
    </script>
@stop


