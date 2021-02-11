@extends('layouts.fixed')
{{--@section('title','add city')--}}
@section('title','Balance Sheet')
@section('content')
    <!-- Content Header (Page header) -->
    <br>
    <div class="text-center">
        <h2>Balance Sheet </h2>
        <h4>Well Group (Garments Division)</h4>
        {{ carbon\carbon::now() }}
    </div>
    <hr>


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">&nbsp;&nbsp; Balance Sheet</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Balance sheet list</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{--start searching manpowr report --}}
    <section class="content no-print">
        <div class="container-fluid">
            <div class="col-lg-12 col-sm-8 col-md-8 col-xs-12">
                @if($errors->any())
                    <div class="col-md-12 alert alert-danger emptyMsg">
                        <h6>{{$errors->first(1)}}</h6>
                    </div>
                @endif

                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        {{Form::open(['url'=>'#', 'method'=>'get']) }}
                        <div class="form-row">
                            <div class="form-group col-md-2" style="margin: -2px 0 0 0;">
                                {{Form::label('accounts_name', 'Accounts Name', ['class'=>''])}}
                                {!! Form::text('email', 'Email', ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group col-md-2">
                                <label class="input-group-addon"></label>
                                <input type="text" name="start" id="start" style="margin: 5px 5px" class="datePicker form-control pull-right"  placeholder="click to select date" required>
                            </div>

                            <div class="form-group col-md-2">
                                <label class="input-group-addon"></label>
                                <input type="text" name="end" id="end" style="margin: 5px 5px" class="datePicker form-control pull-right"  placeholder="click to select date" required>
                            </div>

                            <div class="form-group col-md-4" style="padding-bottom: 10px; margin: 29px 0 0 0;">
                                <input type="submit" class="btn btn-info" value="search">
                            </div>

                            <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                                <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                                <button class="btn btn-primary" href="#add_show_case" data-toggle="tab">Pdf</button>
                            </div>
                        </div>
                        {{  Form::close() }}
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>{{--end --}}
    </section>
    {{--end searching manpower report --}}



    <!-- Main content -->
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

                <div class="row">
                    <div class="col-lg-12">
                        <h3>Liabilities ...</h3>
                        <div class=" bg-light">
                            {{-- bg-dark--}}
                            <div class="card card-info card-outline">
                                <div class="card-header">
                                    <h3 class="card-title">Balance sheet List</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                <div class="card-body" style="display: block;">
                                    <table class="table table-striped journal_lists table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center" colspan="1">#SL</th>
                                                <th class="text-center" colspan="3">Liabilities </th>
                                                <th class="text-center" colspan="2 ">Accounts Name</th>
                                                <th class="text-center" colspan="6">Company Name</th>
                                                <th class="text-right" colspan="2">Debit Balance </th>
                                            </tr>
                                        </thead>

                                        <tbody>
{{--                                        @foreach($journalLists as $index => $journal)--}}
                                                <tr style="padding: 5px">
                                                    <td class="text-center">01</td>
                                                    <td class="text-center">-- 1</td>
                                                    <td class="text-center">-- 2</td>
                                                    <td class="text-center">-- 3</td>
                                                    <td class="text-center">Demo text 4</td>
                                                    <td class="text-center">Demo text 5</td>
                                                    <td colspan="3" class="text-center">Demo text 6</td>

{{--                                                <td class="text-center">Demo text 7</td>--}}
{{--                                                <td colspan="3" class="text-center">Demo text 8</td>--}}

{{--                                                    <td class="text-center">Demo text 9</td>--}}
{{--                                                    <td class="text-center">Demo text 10</td>--}}
                                                    <td colspan="2" class="text-center">Demo text 11</td>
{{--                                                    <td class="text-center">Demo text 12</td>--}}
                                                    <td colspan="2" class="text-center">Demo text 13</td>
{{--                                                    <td class="text-center">Demo text 14</td>--}}
                                                    <td class="text-center">Demo text 15</td>
                                                </tr>
{{--                                        @endforeach--}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="pull-right">
{{--                            {{$journalLists->links()}}--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->


    {{--    ========================================================--}}
{{--    <ol>--}}
{{--        @foreach($ledgerGroups as $ledgerGroup)--}}
{{--            <li>{{$ledgerGroup->name}} (<strong><span style="color:red">{{ $ledgerGroup->group_id ? $ledgerGroup->group_id : 'null'}}</span></strong>)</li>--}}
{{--        <!--<li>{{$ledgerGroup->group_id}}</li>-->--}}
{{--        @endforeach--}}
{{--    </ol>--}}
    {{-- ========================================================--}}









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


        //search report date wise
        $(function () {
            $('#entry_date').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        })


        //search report date wise
        $(function () {
            $('.datePicker').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        })

    </script>
@stop




