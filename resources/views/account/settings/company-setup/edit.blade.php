@extends('layouts.fixed')

@section('title','Account Principle')

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
                    <h1>Edit Company Name</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Company Name</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class=" col-lg-12 row">
            <div class="col-lg-4">
                <div class=" bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit Company Name</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            {!! Form::model($company,['route'=>['company.update',$company->id],'method'=>'POST', 'class'=>'form-horizontal']) !!}
                                @include('account.settings.company-setup.form')

                                <div class="form-group">
                                    <div class="">
                                        {{ Form::submit('Update Company Name  ', ['class'=>'btn btn-primary btn-block']) }}
                                    </div>
                                </div>
{{--                            {!! Form::close() !!}--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  table-responsive">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-info">Company List</h5>
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
                            @include('account.settings.company-setup.list')
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
    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
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
            window.setTimeout(function() {
                $(".alert").slideUp(1000, function(){
                    $(this).remove();
                });
            }, 1200);

        });
    </script>

@stop
