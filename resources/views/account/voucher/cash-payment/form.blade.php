<div class="row">

<div class="col-md-3 from-group"> 
    {{ Form::label('journal_no','Journal No : ') }}
    {!! Form::text('journal_no',null,['class'=>'form-control','readonly'=>'readonly', 'rows' => 1, 'cols' => 40]) !!}
</div>
<div class="col-md-3">
    <div class="from-group {{ $errors->has('date') ? 'has-error' : '' }} ">
        {{ Form::label('date','Date : ') }} <br>
        {{Form::text('date',$date,['id'=>'date','class'=>'form-control']) }}
            <input type="hidden" name="voucher_type" value="{{Request::segment(2)}}">
        @if($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="col-md-3 form-group{{ $errors->has('cr_ledger_id') ? ' has-error' : '' }}">
    {{ Form::label('cr_ledger_id[]','Account Names (Cr): ') }}
    {{-- including ledger's id as debit ledger group id--}}
    {!! Form::select('cr_ledger_id[]', $cashLedgerHead , null , ['class' => 'form-control','required']) !!}
    
    @if($errors->has('cr_ledger_id[]'))
        <span class="help-block">
            <strong>{{ $errors->first('cr_ledger_id[]') }}</strong>
        </span>
    @endif
</div>
<div class="col-md-3 form-group{{ $errors->has('cr_amount') ? ' has-error' : '' }}">
    {{ Form::label('', 'Amount ', ['class'=>'label-control']) }} 
    {{ Form::number('cr_amount[]',old('cr_amount'),['id'=>'cr_amount','class'=>'form-control','placeholder'=>'','readonly'=>true,'required']) }}
    @if ($errors->has('dr_amount'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('dr_amount') }}</strong>
        </span>
    @endif
</div>

</div>
{{-- <div class="row"> --}}

{{-- </div> --}}
<div class="row" id="AppendDebitRow">
    <div class="col-md-7 form-group{{ $errors->has('dr_ledger_id') ? ' has-error' : '' }}">
    {{ Form::label('dr_ledger_id[]','Account Names (Dr): ') }}
    {{-- including ledger's id as debit ledger group id--}}
    {!! Form::select('dr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Debit Accounts','required']) !!}
    @if($errors->has('dr_ledger_id[]'))
        <span class="help-block">
            <strong>{{ $errors->first('dr_ledger_id[]') }}</strong>
        </span>
    @endif
    </div>

    <div class="col-md-5 form-group{{ $errors->has('dr_amount') ? ' has-error' : '' }}">
        {{ Form::label('', 'Amount ', ['class'=>'label-control']) }}
        <div class="input-group mb-3">
        {{ Form::number('dr_amount[]',old('name'),['class'=>'dr_amount form-control','onkeyup'=>'getSum()','placeholder'=>'','autofocus','required']) }}
        <div class="input-group-append">
            <button type="button" class="btn btn-outline-info" onclick="addNewRow()"><i class="fa fa-plus"></i></button>
        </div>
        </div>
        @if ($errors->has('dr_amount'))
            <span class="help-block text-center" id="success-alert">
                <strong>{{ $errors->first('dr_amount') }}</strong>
            </span>
        @endif
    </div>
    
</div>



<div class="form-group{{ $errors->has('event') ? ' has-error' : '' }}">

    {{Form::label('', 'Event Note ', ['class'=>'label-control'])}}
    {{ Form::textarea('event',old('event'),['class'=>'form-control','placeholder'=>'','rows'=>3,'cols'=>3]) }}

    @if ($errors->has('event'))
        <span class="help-block">
            <strong>{{ $errors->first('event') }}</strong>
        </span>
    @endif
</div>