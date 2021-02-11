<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {{Form::label('details', 'Company  Name', ['class'=>'label-control'])}}
    {{ Form::text('name',old('name'),['class'=>'form-control','placeholder'=>'','autofocus','required']) }}

    @if ($errors->has('name'))
        <span class="help-block text-center" id="success-alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">

    {{Form::label('', 'Short description ', ['class'=>'label-control'])}}
    {{ Form::textarea('description',old('description'),['class'=>'form-control','placeholder'=>'shortly Brief about Company','rows'=>5,'cols'=>5]) }}

    @if ($errors->has('description'))
        <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
    </span>
@endif
</div>