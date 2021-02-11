@extends('layouts.fixed')
@section('title',strtoupper(Request::segment(2)).' voucher')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2"></div>
        </div><!-- /.container-fluid -->
    </section>
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
    <section class="content">
        <div class=" col-lg-12 row">
            <div class="col-md-12  table-responsive ledger-group text-capitalize">
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
                            <table class="table table-hover capitalize table-bordered" id="myTable">
                                <thead>
                                <tr>
                                    <th>#SL</th>
                                    <th>Ledger Name</th>
                                    <th>Group Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($cashReceipts as $key=>$cp)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $cp->date }}</td>
                                        <td>{{$cp->journal_no}}</td>
                                        <td>{{$cp->event}}</td>
                                        <td>
                                            <a href="{{route('cash_receipt_voucher.report',$cp->id)}}">
                                                <button type="button" class="btn btn-sm btn-outline-success" data-url="#" data-id="#">
                                                    Generate Voucher <i class="fas fa-folder-plus"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </section>
    
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
