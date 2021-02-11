
<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="firstName" class="col-md-2 control-label">Name: <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::text('name',null,['class'=>'form-control']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>

<div class="form-group row {{ $errors->has('roles') ? 'has-error' : '' }}">
    <label for="cpassword" class="col-md-2 control-label">Permission: <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::select('permissions[]',$permissions,null,['class'=>'form-control select2','multiple']) }}
        @if($errors->has('permissions'))<span class="help-block">{{ $errors->first('permissions') }}</span>@endif
    </div>
</div>

<div class="form-group row">
    <div class="col-md-5 offset-2">
        <a href="{{ URL::previous() }}"><button  class="btn btn-danger">Back</button></a>
        <button type="submit" class="btn btn-success">Submit</button>
        <input type="reset" value="Reset" class="btn btn-warning">
    </div>
</div>