@extends('layouts.fixed')
@section('title','Account Group')
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
                    <h1>Ledger Group</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Ledger Group</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class=" col-lg-12 row">
            <div class="col-lg-4">
                <div class="bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Add Ledger Group</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body capitalize" style="display: block;">
                            {!! Form::model($group = new \App\Account\LedgerGroup(),['route'=>'ledgerGroup.store','method'=>'POST', 'class'=>'form-horizontal']) !!}
                             @include('account.ledger-group.form')
                            <div class="form-group">
                                <div class="">
                                    {{ Form::submit('Save Ledger Group', ['class'=>'btn btn-success btn-block']) }}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  table-responsive ledger-group text-capitalize">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-info">Ledger Group's List</h5>
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
                            @include('account.ledger-group.lists')
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



    //  ledger_group
    //===========================================
        $(document).ready(function () {
            $(document).on('change','#group_id',function () {
                $("#subPrincipleName").style({'color':'red'});
            });
        });





    </script>
@stop


