@extends('layouts.fixed')
{{--@section('title','add city')--}}
@section('title','Journal Lists')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="m-0 text-dark">Journal Entry</h3>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Settings</a></li>
                    {{--<li class="breadcrumb-item active">City</li>--}}
                    <li class="breadcrumb-item active">Journal List</li>
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
                    {{Form::open(['url'=>route('journal.lists'), 'method'=>'get']) }}
                    <div class="form-row">
                        <div class="form-group col-md-6" style="margin: -2px 0 0 0;"></div>
                        {{-- <div class="form-group col-md-2" style="margin: -2px 0 0 0;">
                            {{Form::label('accounts_name', 'Accounts Name', ['class'=>''])}}
                            {!! Form::text('email', 'Email', ['class' => 'form-control']) !!}
                        </div> --}}

                        <div class="form-group col-md-2">
                            <label class="input-group-addon"></label>
                            <input type="text" name="start" id="start" style="margin: 5px 5px" class="datePicker form-control pull-right"  placeholder="click to select date" required>
                        </div>

                        <div class="form-group col-md-2">
                            <label class="input-group-addon"></label>
                            <input type="text" name="end" id="end" style="margin: 5px 5px" class="datePicker form-control pull-right"  placeholder="click to select date" required>
                        </div>

                        <div class="form-group col-md-2" style="padding-bottom: 10px; margin: 29px 0 0 0;">
                            <input type="submit" class="btn btn-info" value="search">
                        </div>

                        {{-- <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                            <button class="btn btn-success" onclick="window.print(); return false;">Print</button>
                            <button class="btn btn-primary" href="#add_show_case" data-toggle="tab">Pdf</button>
                        </div> --}}
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
                <a class="text-right btn btn-sm btn-success text-light" href="{{URL::to('accounts/journal/create')}}">Journal Entry</a>
            <br><br>

            <div class="row">
                <div class="col-lg-12">
                    <div class=" bg-light">
                        {{--   bg-dark--}}
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Journal List</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->

                                <div class="card-body" style="display: block;">
                                    <table class="table table-striped journal_lists table table-hover table-bordered display" id="myTable" style="width:100%">
                                     <thead>
                                        <tr>
                                            <th class="text-center">#SL</th>
                                            <th class="text-center" width="10%">Date</th>
                                            <th class="text-center">Journal No</th>
                                            <th>Ledger Name</th>
                                            <th class="text-center">Narration</th>
                                            <th class="text-right" width="10%">Debit Balance </th>
                                            <th class="text-right" width="10%">Credit Balance </th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                     <tbody>
                                         @foreach($journalLists as $index => $journal)
                                            <tr style="padding: 5px">
                                                <td class="text-center">{{$journalLists->firstItem()+$index}}</td>
                                                <td class="text-center">
                                                        {{ $journal->date->format('d-m-Y') }}
                                                </td>

                                                <td class="text-center">
                                                    <span class="badge btn btn-sm badge-dark">
                                                       {{$journal->journal_no}}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{-- start debit --}}
                                                    <div>
                                                        @php
                                                            $debitName='';
                                                            $drAmount='';
                                                            $creditName='';
                                                            $crAmount='';
                                                        @endphp
                                                        @foreach($journal->journalEntries as $journalEntry)
                                                            @php
                                                                if($journalEntry->type==0){ 
                                                                    $debitName.= $journalEntry->acchead->name.'<i><strong>&nbsp;(Dr)</strong></i><br>';
                                                                    $drAmount.=number_format($journalEntry->amount,2).'<br>';
                                                                    $crAmount.='<br>';
                                                            }
                                                                if($journalEntry->type==1){
                                                                    $creditName.=  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$journalEntry->acchead->name.'<i><strong>&nbsp;&nbsp;(Cr)</strong></i><br>';
                                                                    $crAmount.=number_format($journalEntry->amount,2).'<br>';
                                                                }
                                                            @endphp
                                                        @endforeach
                                                            {!! $debitName !!}
                                                            
                                                            {!! $creditName !!}
                                                    </div>
                                                </td>

                                                <td class="text-center">{{str_limit($journal->event,20)}}</td>

                                                <td class="text-right">
                                                    {!! $drAmount !!}
                                                </td>

                                                <td class="text-right">
                                                    {!! $crAmount !!}
                                                </td>
                                                <td>
                                                    {{ Form::open(['route'=>['journal.destroy',$journal->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                        <a href="{{ route('journal.edit',$journal->id) }}" type="button" class="btn btn-info btn-sm">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="{{ route('journal.show',$journal->id) }}" type="button" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fas fa-trash"></i>
                                                        </button>
                                                    {{ Form::close() }}
                                                </td>
                                            </tr>
                                         @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pull-right">
                            {{$journalLists->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
@stop

@section('style')
<!-- DataTables -->
{{--<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">--}}
@stop

@section('plugin')
<!-- DataTables -->
{{--<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>--}}
{{--<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>--}}
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


    $(document).on('blur','#debit_balance',function () {
        debit_balance =   $('#debit_balance').val();
        $('#credit_balance').val(debit_balance);
    });


    //search report date wise
    $(function () {
        $('.datePicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd"
        });
    })

</script>
@stop




