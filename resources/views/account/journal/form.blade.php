{{--=====================================================--}}
    {{--This is by Ahmed --}}
{{--=====================================================--}}
<div class="row">
    <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
        <div class="from-group {{ $errors->has('date') ? 'has-error' : '' }} ">
            {{ Form::label('date','Date : ') }} <br>
            {{Form::text('date',$date??date('Y-m-d'),['id'=>'date','class'=>'form-control']) }}
            <input type="hidden" name="voucher_type" value="journal">
            @if($errors->has('date'))
            <span class="help-block">
                <strong>{{ $errors->first('date') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
        <div class="from-group">
            {{ Form::label('journal_no','Journal No : ') }}<br>
            {!! Form::text('journal_no',null,['class'=>'form-control','readonly'=>'readonly', 'rows' => 1, 'cols' =>
            40]) !!}
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12"></div>

<div class="row" id="AppendDebitRow">

    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
        <div class="from-group {{ $errors->has('dr_ledger_id[]') ? 'has-error' : '' }} ">
            {{ Form::label('dr_ledger_id[]','Account Names (Dr): ') }}
            {{-- including ledger's id as debit ledger group id--}}
            {!! Form::select('dr_ledger_id[]', $repository->ledgerLists() , null , ['class' =>
            'form-control','placeholder'=>'select Debit Accounts','required']) !!}
            @if($errors->has('dr_ledger_id[]'))
            <span class="help-block">
                <strong>{{ $errors->first('dr_ledger_id[]') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <div class="from-group" id="AppDebAmount">
            {{ Form::label('dr_amount[]','Debit : ') }} <br>
            {{ Form::text('dr_amount[]',old('dr_amount[]'),['class'=>'dr_amount form-control','id'=>'dr_amount','placeholder'=>'00','required']) }}
        </div>
    </div>

    {{----------add more debit button-------------}}
    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
        <div class="from-group" id="AppDebAmount">
            <br>
            <button class="btn btn-light btn-sm text-dark" style="margin:6px;" data-toggle="tooltip" title=" more debit"
                id="addMoreDebit">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>
{{--end debit row--}}
{{--    =============================================--}}

<hr>
{{--stary credit row --}}
<div class="row" id="AppendCreditRow">
    {{-- <div class="col-lg-12 row creditJournal"> --}}
    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
        <div class="from-group {{ $errors->has('cr_ledger_id') ? 'has-error' : '' }}">
            {{ Form::label('cr_ledger_id','Account Names (Cr) : ') }}<br>
            {{-- including ledger's id as credit ledger group id--}}
            {!! Form::select('cr_ledger_id[]', $repository->ledgerLists() , null , ['class' =>
            'form-control','placeholder'=>'select Credit Accounts','required']) !!}

            @if($errors->has('cr_ledger_id'))
            <span class="help-block">
                <strong>{{ $errors->first('cr_ledger_id') }}</strong>
            </span>
            @endif
            <br>
        </div>
    </div>

    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" id="AppCreAmount">
        <div class="from-group">
            {{ Form::label('cr_amount','Credit : ') }}<br>
            {{ Form::text('cr_amount[]',old('cr_amount[]'),['class'=>'form-control cr_amount','placeholder'=>'00','id'=>'cr_amount','required']) }}
        </div>
    </div>

    <div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
        <div class="from-group" id="AppDebAmount"><br>
            <button class="btn btn-light btn-sm text-dark" style="margin:6px;" data-toggle="tooltip"
                title=" more Credit" id="addMoreCredit">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
    {{-- </div> --}}
</div>

{{----------end credit row------------}}

<hr>
<div class="row">
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="from-group"><br>
            {{ Form::label('event','Event Or Transaction : ') }}
            {!! Form::textarea('event',null,['class'=>'form-control', 'rows' => 5, 'cols' => 100]) !!}
        </div>
    </div>
</div>

