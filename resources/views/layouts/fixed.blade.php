<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-5.6.3-web/css/all.min.css') }}">

    <!-- Nano Scroller -->
    <link rel="stylesheet" href="{{ asset('plugins/nanoScroller/nanoscroller.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
    <!-- date picker -->
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

    @yield('plugin-css')

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?ver:2.0') }}">

    {{--Load css for data table by Ahmed--}}
    <link rel="stylesheet" href="{{ asset('/css/datatable/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/datatable/buttons.dataTables.min.css') }}">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/ahmed-style.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
    {{-- Sweet-alert --}}
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">

    <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/account-style.css') }}">

    {{--app.css by Ahmed --}}
    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}

    <style>
        @media print {
            .thead-dark {
                background-color: gray;
            }
            .row-cccccc {
                background-color: #cccccc;
            }
            .row-dddddd {
                background-color: #dddddd;
            }
        }


    </style>
    {{--css file for no print--}}
    <link rel="stylesheet" href="{{ asset('css/print.css') }}">

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <style>
        span.select2-selection.select2-selection--single{ padding-bottom: 29px; border-color: #cccccc;}
        input.select2-search__field{ border-color: #cccccc;
            -webkit-border-radius:5px;
            -moz-border-radius:5px;
            border-radius:5px;
        }

        span.select2-selection__arrow {  margin-top: 4px;  }
        a,h1,h2,h3,h4,h5,h6,span,p,strong,select,b,i,input,textarea,li,label,td,th,button,radio,checkbox,div{
            text-transform: uppercase;
        }
        .select2{
            width: 100%!important;
        }
        .loanTable th {
            font-size: 13px;
        }
        .loanTable td {
            font-size: 15px;
            text-align: left;
            font-weight: 400;
        }
    </style>
    @yield('style')
    @yield('css')

</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">
    <!-- Navbar-->
    <nav class="main-header navbar navbar-expand bg-{{settings('theme')}} navbar-light border-bottom">
        @include('includes.header')
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-{{settings('theme')}} elevation-4">
    @include('includes.left-sidebar')
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer" style="position:fixed;bottom:0;width:100%">
        @include('includes.footer')
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        @include('includes.right-aside')
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Nano Scroller -->
<script src="{{ asset('plugins/nanoScroller/jquery.nanoscroller.min.js') }}"></script>
<!-- AdminLTE App -->
{{--this is by Ahmed--}}
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js') }}"></script>

<!-- date-range-picker -->
<script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>

<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('plugins/select2/select2.min.js')}}"></script>

<script src="{{ asset('plugins/select2/select2.full.min.js') }}/"></script>

{{-- sweet alert --}}
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
{{-- notify message js--}}
<script src="{{ asset('js/notify.js') }}"></script>
{{--<script src="{{ asset('js/toastr.min.js') }}"></script>--}}

{{--jquery hilighter--}}
{{--<script src="{{ asset('js/jquery.highlight.js') }}"></script>--}}

<script src="{{ asset('js/hilitor.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>


{{--load script for data table by Ahmed --}}
{{--<script src="{{ asset('/js/datatable/jquery-3.3.1.js') }}"></script>--}}
<script src="{{ asset('/js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/js/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/js/datatable/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/js/datatable/jszip.min.js') }}"></script>
<script src="{{ asset('/js/datatable/pdfmake.min.js') }}"></script>
<script src="{{ asset('/js/datatable/vfs_fonts.js') }}"></script>
<script src="{{ asset('/js/datatable/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/js/datatable/buttons.print.min.js') }}"></script>

@yield('plugin')
@yield('script')


<script>

    /** CHECK EVERY ACTION DELETE CONFIRMATION BY SWEET ALERT **/
    function set_unit(unit_id){
            // alert(unit_id);
            var token = '{{csrf_token()}}';
            $.ajax({
                method:"post",
                url: '{{ url('settings/unit-setup') }}',
                data: {unit_id:unit_id,_token:token},
                // type: "html",
                success: function(response) {
                   location.reload();
                },
                catch:function (error){
                    console.log(error)
                }
            });
        }
    $(document).on('click', '.erase', function () {
        var id = $(this).attr('data-id');
        var url=$(this).attr('data-url');
        var token = '{{csrf_token()}}';
        var $tr = $(this).closest('tr');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this information!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: "No, cancel plz!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: url,
                        type: "post",
                        data: {id: id, _token: token},
                        dateType:'html',
                        success: function (response) {
                            swal("Deleted!", "Data has been Deleted.", "success"),
                                swal({
                                        title: "Deleted!",
                                        text: "Data has been Deleted.",
                                        type: "success"
                                    },
                                    function (isConfirm) {
                                        if (isConfirm) {
                                            $tr.find('td').fadeOut(1000, function () {
                                                $tr.remove();
                                            });
                                        }
                                    });
                        }
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
    });
</script>

{{-- active tooptip by Ahmed --}}
{{--//=======================================================}} --}}
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
{{-------------------------------------------}}


@if (session()->has('success'))
    <script type="text/javascript">
        $(function () {
            $.notify("{{session()->get("success")}}", {globalPosition: 'top center',className: 'success'});
        });
    </script>
@endif

@if (session()->has('message'))
    <script type="text/javascript">
        $(function () {
            $.notify("{{session()->get("message")}}", {globalPosition: 'bottom right',className: 'info'});
        });
    </script>
@endif

@if (session()->has('error'))
    <script type="text/javascript">
        $(function () {
            $.notify("{{session()->get("error")}}", {globalPosition: 'bottom right',className: 'danger'});
        });
    </script>
@endif

@if (session()->has('warning'))
    <script type="text/javascript">
        $(function () {
            $.notify("{{session()->get("warning")}}", {globalPosition: 'bottom right',className: 'warning'});
        });
    </script>
@endif

<script>
    $(document).ready(function () {
        $("select").select2();
//       var d = new Date();
//       var day = 0;
//       if (d.getDate().length<2){
//           day = 0+d.getDate();
//       }else{
//           day = d.getDate();
//       }
//
//       var custom_date = d.getFullYear()+"-"+d.getMonth()+"-"+day;
//       $(".join_date").val(custom_date);
        $('.date-picker').datepicker();
        $('.date').datepicker({
            'format':'yyyy-mm-dd'
        });

        function set_unit(unit_id){
            alert(unit_id);
            var token = '{{csrf_token()}}';
            $.ajax({
                method:"post",
                url: '{{ url('settings/unit-setup') }}',
                data: {unit_id:unit_id,_token:token},
                // type: "html",
                success: function(response) {
                    $("#name").val('');
                    $("#description").val('');
                    location.reload();
                },
                catch:function (error){
                    console.log(error)
                }
            });
        }

    });
   

    //activate data table used in fixed blade file for all.        
    $(document).ready(function() {
        $('#myTable').DataTable( {
            fixedHeader: {
                header: true,
                footer: true,
            },
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                {
                    extend: 'print',
                    text: 'Print File',
                    title: `<div class="box-header with-border text-center">
                                        <h2>{{ unit_name() ?? app_info()->company_name }}</h2>
                                        <h4>{{ str_before(app_info()->address,"|") }}</h4>
                                        <h5>{{ str_after(app_info()->address,"|") }}</h5>
                                        @if (!empty($ledger_name))
                                            <h3>{{\App\Account\AccountLedger::query()->where('id',$ledger_name)->first()->name }}</h3>
                                        @else
                                            <h3>Select a accounts name</h3>
                                        @endif
                                        <p><h5>{{ request('start') !=null ? date('d-M-Y', strtotime(request('start'))) :'--' }} To {{ request('end') !=null ? date('d-M-Y',strtotime(request('end'))) :'--' }}<h5></p>
                            </div>`,
                    customize: function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            // .prepend(
                            //     '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                            // );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    }
                }
            ],
        });

    });
</script>
</body>
</html>


