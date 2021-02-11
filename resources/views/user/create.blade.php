@extends('layouts.fixed')
@section('title','ADD USER')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes-->
        <div class="container-fluid">
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add User</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="card-body">
                        {{ Form::open(['action'=>'UserController@store','method'=>'post']) }}
                        @include('user.form')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- /.content -->
@stop



@section('script')
    {{--<!-- jvectormap  -->--}}
    {{--<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>--}}
    {{--<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>--}}
    {{--<!-- ChartJS -->--}}
    {{--<script src="{{ asset('bower_components/chart.js/Chart.js') }}"></script>--}}
    {{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
    {{--<script src="{{ asset('dist/js/pages/dashboard2.js') }}"></script>--}}


    <!-- Select2 -->
    <script src="{{ asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
    {{--<!-- InputMask -->--}}
    {{--<script src="http://localhost/adminlte/public/plugins/input-mask/jquery.inputmask.js"></script>--}}
    {{--<!-- date-range-picker -->--}}
    {{--<script src="http://localhost/adminlte/public/bower_components/moment/min/moment.min.js"></script>--}}
    {{--<script src="http://localhost/adminlte/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
    {{--<!-- bootstrap datepicker -->--}}
    {{--<script src="http://localhost/adminlte/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>--}}

    <script>
        $('.select2').select2();
    </script>

@stop