
<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="firstName" class="col-md-2 control-label">Name <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::text('name',null,['class'=>'form-control']) }}
        @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
    </div>
</div>

<div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-md-2 control-label">Email<span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::text('email',null,['class'=>'form-control']) }}
        @if($errors->has('email'))<span class="help-block">{{ $errors->first('email') }}</span>@endif
    </div>
</div>

<div class="form-group row row {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="password" class="col-md-2 control-label">Password <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::password('password',['class'=>'form-control']) }}
        @if($errors->has('password'))<span class="help-block">{{ $errors->first('password') }}</span>@endif
    </div>
</div>

<div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
    <label for="cpassword" class="col-md-2 control-label">Confirm Password <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::password('password_confirmation',['class'=>'form-control']) }}
    </div>
</div>

<div class="form-group row {{ $errors->has('roles') ? 'has-error' : '' }}">
    <label for="cpassword" class="col-md-2 control-label">Roles <span class="text-danger">*</span></label>
    <div class="col-md-8">
        {{ Form::select('roles[]',$roles,null,['class'=>'form-control select2','multiple']) }}
        @if($errors->has('roles'))<span class="help-block">{{ $errors->first('roles') }}</span>@endif
    </div>
</div>

<hr>

<div class="form-group text-center">
    <a href="{{ URL::previous() }}">
        <button  class="btn btn-danger">Back</button>
    </a>
    <button type="submit" class="btn btn-success">Submit</button>
    <input type="reset" value="Reset" class="btn btn-warning">
</div>