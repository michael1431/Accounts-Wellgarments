@extends('layouts.fixed')
@section('title','Smarty Cab')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div>
            <ol class="breadcrumb">
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Home /
                    </a>
                </li>
                <li class="active"> &nbsp; Edit User</li>
            </ol>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes-->
        <div class="row">
            <div class="col-lg-5">
                <h3 class="card-title"> Edit User</h3>
                <hr>
                <div class=" bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Personal Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            {{ Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'patch']) }}
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

                                <div class="form-group row {{ $errors->has('roles') ? 'has-error' : '' }}">
                                    <label for="cpassword" class="col-md-2 control-label">Roles <span class="text-danger">*</span></label>
                                    <div class="col-md-8">
                                        {{ Form::select('roles[]',$roles,null,['class'=>'form-control select2','multiple']) }}
                                        @if($errors->has('roles'))<span class="help-block">{{ $errors->first('roles') }}</span>@endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-8 offset-2">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <input type="reset" value="Reset" class="btn btn-warning">
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <h3 class="card-title box-title"> Edit Password</h3><hr>
                <div class=" bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Password Information</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            {{ Form::model($user,['action'=>['UserController@update',$user->id],'method'=>'patch']) }}
                                <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
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

                                <div class="form-group row">
                                    <div class="col-md-8 offset-2">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                        <input type="reset" value="Reset" class="btn btn-warning">
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop



@section('script')
    <!-- jvectormap  -->
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>


    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- InputMask -->
    <script src="http://localhost/adminlte/public/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- date-range-picker -->
    <script src="http://localhost/adminlte/public/bower_components/moment/min/moment.min.js"></script>
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('.select2').select2();
    </script>

@stop