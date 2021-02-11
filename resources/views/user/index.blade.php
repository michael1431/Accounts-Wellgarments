@extends('layouts.fixed')
@section('title','Users')
@section('content')
    <!-- Main content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          <span class="text text-primary">
                                 <h3 class="box-title">Manage Users</h3>
                          </span>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Users</li>
                            </ol>
                        </div>
                        <div class="col-md-6 ">
                            <a href="{{ action('UserController@create') }}">
                                <button class="btn btn-info" type="button">Add User</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
               
                <div class="row">
                    <div class="col-md-12">
                        {{--list  start --}}
                        <div class="col-md-10">
                            <div class="card card-warning card-outline">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h5 class="text-info">User List </h5>
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
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="sorting_asc">SL</th>
                                                    <th class="sorting_asc">Name</th>
                                                    <th class="sorting_asc">Email</th>
                                                    <th class="sorting_asc" width="25%">Role</th>
                                                    <th class="sorting_asc">Member Since</th>
                                                    <th class="sorting_asc">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php $i = 1; @endphp
                                                @foreach($users as $key=>$user)
                                                    <tr role="row" class="odd">
                                                        <td>{{ $key+$users->firstItem() }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>
                                                            @foreach($user->roles as $role)
                                                                <span class="badge badge-dark">{{ $role->name }}</span>
                                                            @endforeach
                                                        </td>
                                                        {{-- <td>{{ $user->created_at->diffForHumans() }}</td> --}}
                                                        <td>
                                                            {{ Form::open(['action'=>['UserController@destroy',$user->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                            <a class="btn btn-sm" href="{{ action('UserController@edit',$user->id) }}">
                                                                <i class="fa text-success fa-pencil-alt"></i>
                                                            </a> &nbsp;  &nbsp;

                                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fas fa-trash"></i></button>
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        {{--list end--}}

                        <div class="row"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-sm-4">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                {{ $users->links() }}
            </div>
        </div>
        <div class="col-sm-8">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }}
            </div>
        </div>
    </div>

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
    <script src="http://localhost/adminlte/public/bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="http://localhost/adminlte/public/plugins/input-mask/jquery.inputmask.js"></script>
    <!-- date-range-picker -->
    <script src="http://localhost/adminlte/public/bower_components/moment/min/moment.min.js"></script>
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="http://localhost/adminlte/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>



    <!-- Page script -->
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this user?');
            return !!x;
        }
    </script>
    <script>
        $(function () {
            $('.datepicker').datepicker({
                autoclose: true
            });
        })
    </script>

@stop