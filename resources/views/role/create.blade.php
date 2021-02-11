@extends('layouts.fixed')
@section('title','Create New Role')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          <span class="text text-primary">
                                 <h3 class="box-title">Add Roles</h3>
                          </span>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Roles</a></li>
                                <li class="breadcrumb-item active">Add Roles</li>
                            </ol>
                        </div>
                        <div class="col-md-6 ">
                           
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">
            <div class="row">
                {{--create/edit start --}}
                <div class="col-lg-12">
                    <div class=" bg-light">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Add Role</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <div class="row">
                                    {{--vaccine-transfer Start--}}
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        {{ Form::open(['route'=>'role.store','method'=>'post']) }}
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 {{$errors->has('name') ? 'has-error' : ''}}">
                                            <span style="display: block;height: 10px;width: 100%;background: #fff;"></span>
                                            {{ Form::label('name','Role Name:* ',['class'=>'control-label'])}}
                                            {{ Form::text('name',null,['class'=>'form-control','id'=>'name',"requried"])}}
                                            @if($errors->has('name'))
                                                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
                                            @endif
                                        </div>
                                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 {{$errors->has('permission') ? 'has-error' : ''}}">
                                            {{--<span style="display: block;height: 10px;width: 100%;background: #fff;"></span>--}}
												{{-- {{ Form::label('permission','Permission :* ',['class'=>'control-label'])}}--}}
                                           
                                            <label for="permission"><h4>Permissions</h4></label>
                                            <table id="protable" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Name</th>
                                                        <th>Permissions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse($permission_groups as $key=>$permissions)
                                                    {{--User Permission Start--}}
                                                        <tr>
                                                            <th><h5>{{$key}}</h5></th>
                                                            <th>
                                                                    <input id="{{strtolower($key)}}-select-all" onclick="checkAll('{{strtolower($key)}}')" type="checkbox">
                                                                    <label for="{{strtolower($key)}}-select-all"> Select all {{$key}}</label>
                                                            </th>
                                                            <th>
                                                                @forelse($permissions as $permission)
                                                                
                                                                    <div class="checkbox">
                                                                        <input  type="checkbox" class="{{strtolower($key)}}-select" name="asignpermission[]" value="{{$permission->id}}">
                                                                        <label for="demo-form-checkbox">{{$permission->label}}</label>
                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </th>
                                                        </tr>                                           
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>



                                        <div class="col-lg-12 col-sm-12 col-xs-12"><span style="display: block;height: 10px;width: 100%;background: #fff;"></span></div>
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <div class="col-lg-4 col-sm-4 col-xs-12">
                                                {{ Form::submit('SUBMIT',['class'=>'btn btn-success']) }}
                                            </div>
                                        </div>
                                        {{ Form::close() }}
                                    </div>
                                  
                                </div>
                               
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
    function checkAll(lebel_group){
        var consd=$("."+lebel_group+"-select").attr('checked');
        if(consd){
             $("."+lebel_group+"-select").attr('checked', false);
             }else{
                $("."+lebel_group+"-select").attr('checked', true);
             }
               
        }
        

    </script>
@stop