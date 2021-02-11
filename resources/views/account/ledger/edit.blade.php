@extends('layouts.fixed')

@section('title','Modify Account Ledger')

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
                    <h1>Account Ledger</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Manage Account Ledger</li>
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
                            <h3 class="card-title">Edit Account Ledger</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            {!! Form::model($ledger,['route'=>['ledger.update',$ledger->id],'method'=>'POST', 'class'=>'form-horizontal']) !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{ Form::label('', 'Ledger Name : ', ['class'=>'label-control']) }}
                                {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>' ','autofocus','required']) }}
                            
                                @if ($errors->has('name'))
                                    <span class="help-block text-center" id="success-alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            {{--@dd($groups)--}} 
                            <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                                {{Form::label('group_id', 'Select Groups', ['class'=>'label-control'])}}
                                {{-- {{ Form::select('group_id',$groups, null,['class'=>'form-control','placeholder'=>'select ledger group','required',]) }} --}}
                                <select name="group_id" id="group_id" class="form-control" required>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}" {{ ($ledger->group_id==$group->id) ? 'selected' :''}}><strong> {{ $group->name }}</strong> </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('group_id'))
                                    <span class="help-block text-center" id="success-alert">
                                        <strong>{{ $errors->first('group_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('ledger') ? ' has-error' : '' }}">
                                {{Form::label('ledger', 'Ledger', ['class'=>''])}}
                               <br>
                                <label class="radio-inline"><input value="1" type="radio" name="ledger" {{ ($ledger->ledger==1) ? 'checked' :''}}>&nbsp;&nbsp; Ledger  </label>&nbsp;&nbsp;
                                <label class="radio-inline"><input value="0" type="radio" name="ledger" {{ ($ledger->ledger==0) ? 'checked' :''}}>  Group</label>
                            </div>
                            
                            <div class="form-group{{ $errors->has('is_bank') ? ' has-error' : '' }}">
                                {{Form::label('is_bank', 'Bank Ledger', ['class'=>''])}}
                               <br>
                                <label class="radio-inline"><input value="1" type="radio" name="is_bank" {{ ($ledger->is_bank==1) ? 'checked' :''}}>&nbsp;&nbsp; Yes  </label>&nbsp;&nbsp;
                                <label class="radio-inline"><input value="0" type="radio" name="is_bank" {{ ($ledger->ledger==0) ? 'checked' :''}}>  No</label>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    {{ Form::submit('Update Ledger  ', ['class'=>'btn btn-success btn-block']) }}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8  table-responsive">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <div class="card-title">
                            <h5 class="text-info">Ledger's List</h5>
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
                            @include('account.ledger.lists')
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
