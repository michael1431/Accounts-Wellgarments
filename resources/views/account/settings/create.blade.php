@extends('layouts.fixed')
@section('title','Primary Settings')
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
                <h1>Primary Settings</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Primary Settings</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class=" col-lg-12 row">
        <div class="col-lg-10">
            <div class=" bg-light">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Primary Settings</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div> <!-- /.card-header -->

                    <div class="card-body" style="display: block;">
                        {!! Form::open(['route'=>'settings.primary_settings_store','method'=>'POST', 'class'=>'form-horizontal']) !!}

                        <div class="row">
                            <div class="col-md-12">
                        {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('', 'Company Name : ', ['class'=>'label-control']) }}
                            {{ Form::text('company_name',old('company_name'),['class'=>'form-control','placeholder'=>' ','autofocus','required']) }}

                            @if ($errors->has('company_name'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('company_name') }}</strong>
                            </span>
                            @endif
                        </div> --}}
                        </div>
                        <div class="col-md-6">
                        <div class="form-group{{ $errors->has('cash_group_id') ? ' has-error' : '' }}">
                            {{Form::label('cash_group_id', 'Select Cash Groups', ['class'=>'label-control'])}}
                           
                            <select name="cash_group_id" id="cash_group_id" class="form-control" required>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{settings('cash_group_id')==$group->id?'selected':''}}><strong> {{ $group->name }}</strong> </option>
                                    {{-- @forelse($group->childs as $group_child)
                                    @if($group_child->ledger==0)
                                        <option value="{{ $group_child->id }}" {{settings('cash_group_id')==$group_child->id?'selected':''}}>{{ $group_child->name }} (2)</option>
                                        @forelse($group_child->childs as $group_grand_child)
                                        @if($group_grand_child->ledger==0)
                                            <option value="{{ $group_grand_child->id }}" {{settings('cash_group_id')==$group_grand_child->id?'selected':''}}>{{ $group_grand_child->name }} (3)</option>
                                            @forelse($group_grand_child->childs as $group_grand_child1)
                                            @if($group_grand_child1->ledger==0)
                                                <option value="{{ $group_grand_child1->id }}" {{settings('cash_group_id')==$group_grand_child1->id?'selected':''}}>{{ $group_grand_child1->name }} (4)
                                                </option>
                                                @forelse($group_grand_child1->childs as $group_grand_child2)
                                                @if($group_grand_child2->ledger==0)
                                                    <option value="{{ $group_grand_child2->id }}" {{settings('cash_group_id')==$group_grand_child2->id?'selected':''}}>{{ $group_grand_child2->name }} (5)
                                                    </option>
                                                @endif
                                                @empty
                                                @endforelse
                                            @endif
                                            @empty
                                            @endforelse
                                        @endif
                                        @empty
                                        @endforelse
                                    @endif
                                    @empty
                                    @endforelse --}}
                                @endforeach
                            </select>
                            @if ($errors->has('cash_group_id'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('cash_group_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('bank_group_id') ? ' has-error' : '' }}">
                            {{Form::label('bank_group_id', 'Select Bank Groups', ['class'=>'label-control'])}}
                            {{-- {{ Form::select('group_id',$groups, null,['class'=>'form-control','placeholder'=>'select ledger group','required',]) }}
                            --}}
                            <select name="bank_group_id" id="bank_group_id" class="form-control" required>
                                @foreach ($groups as $group)
                                    <option value="{{ $group->id }}" {{settings('bank_group_id')==$group->id?'selected':''}}><strong> {{ $group->name }}</strong> </option>
                                    {{-- @forelse($group->childs as $group_child)
                                    @if($group_child->ledger==0)
                                        <option value="{{ $group_child->id }}" {{settings('bank_group_id')==$group_child->id?'selected':''}}>{{ $group_child->name }} (2)</option>
                                        @forelse($group_child->childs as $group_grand_child)
                                        @if($group_grand_child->ledger==0)
                                            <option value="{{ $group_grand_child->id }}" {{settings('bank_group_id')==$group_grand_child->id?'selected':''}}>{{ $group_grand_child->name }} (3)</option>
                                            @forelse($group_grand_child->childs as $group_grand_child1)
                                            @if($group_grand_child1->ledger==0)
                                                <option value="{{ $group_grand_child1->id }}" {{settings('bank_group_id')==$group_grand_child1->id?'selected':''}}>{{ $group_grand_child1->name }} (4)
                                                </option>
                                                @forelse($group_grand_child1->childs as $group_grand_child2)
                                                @if($group_grand_child2->ledger==0)
                                                    <option value="{{ $group_grand_child2->id }}" {{settings('bank_group_id')==$group_grand_child2->id ? 'selected' : ''}}>{{ $group_grand_child2->name }} (5)
                                                    </option>
                                                @endif
                                                @empty
                                                @endforelse
                                            @endif
                                            @empty
                                            @endforelse
                                        @endif
                                        @empty
                                        @endforelse
                                    @endif
                                    @empty
                                    @endforelse --}}
                                @endforeach
                            </select>
                            @if ($errors->has('bank_group_id'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('bank_group_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('cash_ledger_id') ? ' has-error' : '' }}">
                            {{Form::label('cash_ledger_id', 'Cash Ledger', ['class'=>'label-control'])}}
                            <select name="cash_ledger_id" id="cash_ledger_id" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('cash_ledger_id')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('cash_ledger_id'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('cash_ledger_id') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sales') ? ' has-error' : '' }}">
                            {{Form::label('sales', 'Sales Ledger', ['class'=>'label-control'])}}
                            <select name="sales" id="sales" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('sales')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('sales'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('sales') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sales_return') ? ' has-error' : '' }}">
                            {{Form::label('sales_return', 'Sales Return Ledger', ['class'=>'label-control'])}}
                            <select name="sales_return" id="sales_return" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('sales_return')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('sales_return'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('sales_return') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('purchase') ? ' has-error' : '' }}">
                            {{Form::label('purchase', 'Purchase Ledger', ['class'=>'label-control'])}}
                            <select name="purchase" id="purchase" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('purchase')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('purchase'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('purchase') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('purchase_return') ? ' has-error' : '' }}">
                            {{Form::label('purchase_return', 'Sales Return Ledger', ['class'=>'label-control'])}}
                            <select name="purchase_return" id="purchase_return" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('purchase_return')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('purchase_return'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('purchase_return') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('purchase_discount') ? ' has-error' : '' }}">
                            {{Form::label('purchase_discount', 'Purchase Discount Ledger', ['class'=>'label-control'])}}
                            <select name="purchase_discount" id="purchase_discount" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('purchase_discount')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('purchase_discount'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('purchase_discount') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group{{ $errors->has('sales_discount') ? ' has-error' : '' }}">
                            {{Form::label('sales_discount', 'Sales Discount Ledger', ['class'=>'label-control'])}}
                            <select name="sales_discount" id="sales_discount" class="form-control" required>
                                @foreach ($ledgers as $ledger)
                                    <option value="{{ $ledger->id }}" {{settings('sales_discount')==$ledger->id?'selected':''}}><strong> {{ $ledger->name }}</strong> </option>
                                @endforeach
                            </select>
                            @if ($errors->has('sales_discount'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('sales_discount') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                            {{Form::label('theme', 'Select Theme', ['class'=>'label-control'])}}
                            <select name="theme" id="theme" class="form-control" required>
                                    <option value="{{ 'success' }}" {{settings('theme')=='success' ? 'selected' : ''}}><strong>Green</strong> </option>
                                    <option value="{{ 'info' }}" {{settings('theme')=='info' ? 'selected' : ''}}><strong>Info</strong> </option>
                                    <option value="{{ 'primary' }}" {{settings('theme')=='primary' ? 'selected' : ''}}><strong>Blue</strong> </option>
                                    <option value="{{ 'warning' }}" {{settings('theme')=='warning' ? 'selected' : ''}}><strong>Yellow</strong> </option>
                                    <option value="{{ 'danger' }}" {{settings('theme')=='danger' ? 'selected' : ''}}><strong>Red</strong> </option>
                            </select>
                            @if ($errors->has('theme'))
                            <span class="help-block text-center" id="success-alert">
                                <strong>{{ $errors->first('theme') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-12">

                        {{-- <div class="form-group{{ $errors->has('ledger') ? ' has-error' : '' }}">
                            {{Form::label('ledger', 'Ledger', ['class'=>''])}}
                            <br>
                            <label class="radio-inline"><input value="1" type="radio" name="ledger" checked>&nbsp;&nbsp;
                                Ledger </label>&nbsp;&nbsp;
                            <label class="radio-inline"><input value="0" type="radio" name="ledger" checked>
                                Group</label>
                        </div> --}}

                        {{-- <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">

                            {{ Form::label('', 'Small Notes', ['class'=>'label-control']) }}
                            {{ Form::textarea('note',old('note'),['class'=>'form-control','placeholder'=>' ','rows'=>5,'cols'=>5]) }}

                            @if ($errors->has('note'))
                            <span class="help-block">
                                <strong>{{ $errors->first('note') }}</strong>
                            </span>
                            @endif
                        </div> --}}

                        <div class="form-group">
                            <div class="">
                                {{ Form::submit('Update Settings', ['class'=>'btn btn-success btn-block']) }}
                            </div>
                        </div>
                    </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                    {{-- row --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@stop

@section('style')
<!-- DataTables loaded form fixed file -->
@stop

@section('css')
<style>
    .capitalize label,
    .capitalize th {
        text-transform: capitalize !important;
    }

    .table td,
    .table th {
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
<!-- DataTables loaded form fixed file -->
@stop
