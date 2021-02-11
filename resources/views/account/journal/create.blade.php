@extends('layouts.fixed')
@section('title','Journal Entry')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Journal Entry</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Journal</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-lg-12">
            <div class="card-body">
                {{-- start showin gsuccess message --}}
                <div class="col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                {{-- end showin gsuccess message --}}

                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif

                <div class="row">
                    <div class="col-lg-12">
                        <div class=" bg-light">
                            {{-- bg-dark--}}
                            <div class="card bg-dark card-info card-outline">
                                <div class="card-header">
                                    {{--<h3 class="card-title">Add City</h3>--}}
                                    <h3 class="card-title">Add Journal</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                <div class="card-body" style="display: block;">
                                    {{ Form::open(['route'=>'journal.store','method'=>'POST', 'class'=>'form-horizontal','onsubmit'=>'return confirm("Are You Sure About the Post?")']) }}
                                        @include('account.journal.form',['buttonText'=>'save'])
                                </div>
                                <div class="card-footer" style="display: block;">
                                        {{-- <div class="col-lg-4 offset-lg-8 col-sm-4 col-md-4 col-xs-12"><br>
                                            <div class="m-left-15 from-group"> --}}
                                                {{-- <a class="btn-danger btn btn-sm" href="{{url()->previous()}}">Return back</a> --}}
                                                {{ Form::submit('Save Journal', ['class'=>'btn btn-success']) }}
                                            {{-- </div>
                                        </div> --}}

                                    </div>
                                    {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->




    {{--==========================================================================================--}}
    {{-- start modal for add company by Ahmed --}}
    {{--==========================================================================================--}}
    <!-- Button to Open the Modal -->
    {{--    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">--}}
    {{--        Open modal--}}
    {{--    </button>--}}

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add a new company</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                {{-- <form action="#">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                        <input type="submit" id="companySubmit" class="btn btn-success btn-sm"  data-dismiss="modal" value="Submit">
                    </div>
                </form> --}}
            </div>
        </div>
    </div>
    {{--==========================================================================================--}}
    {{--end modal for add company --}}
    {{--==========================================================================================--}}
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
        $(document).ready(function () {

           //To auto create journal no
            $('#journal_no').val("<?php echo $journal_no; ?>");

            window.setTimeout(function() {
                $(".alert").fadeOut(500, function(){
                    $(this).remove();
                });
            }, 1200);

        });

        //delete confirmation  message
        function confirmDelete(){
            var x = confirm('Are you sure you want to delete this ?');
            return !!x;
        }

        //search report date wise
        $(function () {
            $('#date').datepicker({
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        });


        //=====================================================
    //    jquery code for company store with modal
    //    =====================================================
        $(document).on('click','#companySubmit',function (e) {
           e.preventDefault();
            var name = $("#name").val();
            var description = $("#description").val();
            var csrf = "{{ csrf_token() }}";

            $.ajax({
                method:"post",
                url: '{{ url('settings/company-store') }}',
                data: {name:name,description:description,_token:csrf},
                type: "html",
                success: function(response) {
                    $("#name").val('');
                    $("#description").val('');
                    location.reload();
                },
                catch:function (error){
                    console.log(error)
                }
            });
        });
        //=====================================================
        //    End code for company store with modal
        //=====================================================


        {{--==========================================================================================--}}
        //     Append multiple debit or credit with jquery append function by Ahmed
        {{--==========================================================================================--}}


        //==============================================================================================================
        //*** 1. start multiple debit appended option by Ahmed
        //==============================================================================================================
        let i = 1;
        $(document).on('click','#addMoreDebit',function (e) {
            i++;
            e.preventDefault();
            var AppendDeb = '<div class="container row appendedDebitRow" id="row'+i+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-12"><div class="from-group {{ $errors->has('dr_ledger_id[]') ? 'has-error' : '' }} ">{{ Form::label('dr_ledger_id[]','Account Names (Dr): ') }}<br>{!! Form::select('dr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Debit Accounts','required']) !!}@if($errors->has('dr_ledger_id[]'))<span class="help-block"><strong>{{ $errors->first('dr_ledger_id[]') }}</strong></span>@endif</div></div><div class="col-lg-3 col-sm-3 col-md-3 col-xs-12"><div class="from-group" id="AppDebAmount"> {{ Form::label('dr_amount[]','Debit : ') }}<br><input type="text" name="dr_amount[]" data-id="'+i+'" class="dr_amount form-control" value="" id="dr_amount" placeholder="00" required /></div></div>{{-----start add more debit and remove button--------}}<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"><div class="from-group" id="AppDebAmount"> <br><button  class="btn btn-light btn-sm text-dark"  style="margin:6px;" data-toggle="tooltip" title=" more debit" id="addMoreDebit"><i class="fa fa-plus"></i></button><button style="margin: 6px" class="btn btn-danger btn-sm text-light"  id="removeDebitRow" style="margin:20px;" data-toggle="tooltip" title=" remove this" id=""> <i class="fas fa-times"></i></button></div></div></div>';

            $('#AppendDebitRow').append(AppendDeb);
            $("select").select2();
        });

        //===========================================================================================
        // ** getting total debit value for first row and push to first credit field
        //===========================================================================================
        function totalDevitAmount(){
            $(".dr_amount").keyup(function(){
                var sum = 0;
                $('.dr_amount').each(function(){
                    sum += parseFloat(this.value);
                });
                console.log(sum);

                //define totalDebit as globally for retrieving from credit section
                window.totalDebit = sum;

                $('#cr_amount').val(sum);
            });
        }
        totalDevitAmount();
        //===========================================================================================



        //===========================================================================================
        // ** getting total debit row's value(for all debit) and push to first credit field
        //===========================================================================================
        $(document).on('click','#addMoreDebit',function () {
            totalDevitAmount(); //this is essential can't delete

            //getting the total debits as a first credit field's value (work for add more)
            $(".dr_amount").keyup(function() {
                var abc = $("#cr_amount").first().val();
                console.log(abc);
            });
        });

        //==================================================================
        //to remove multiple debit appended item after click
        //==================================================================
        $(document).on('click','#removeDebitRow',function (e) {
            e.preventDefault();
            //console.log('clicked remove debit button......');
            $(this).parent().parent().parent().remove();
        });
       
    //    function focus_on_amount(type,row_no){
    //     $('#dr_amount'+row_no).focus()
    //    }


        // function readAppendedDebitAmount(){
        //     var arr = [];
        //     $("#dr_amount").each(function() {
        //         arr.push($(this).val());
        //     });
        //     console.log(arr);
        // }

        // $(document).on("keyup","#dr_amount",function(){
        //     readAppendedDebitAmount();
        // });


        //====================================================================================================================
        //2. start multiple credit appended option by Ahmed
        //====================================================================================================================
        let j = 0;
        $(document).on('click','#addMoreCredit',function (e) {
            j++;
            e.preventDefault();
            var creditRow = '<div class="container row appendedCreditRow creditJournal" id="row'+j+'"><div class="col-lg-7 col-sm-7 col-md-7 col-xs-12"><div class="from-group {{ $errors->has('cr_ledger_id') ? 'has-error' : '' }}" id="AppendCreAcc">{{ Form::label('cr_ledger_id','Account Names (Cr) : ') }}<br>{!! Form::select('cr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Credit Accounts','required']) !!}@if($errors->has('cr_ledger_group_id'))<span class="help-block"><strong>{{ $errors->first('cr_ledger_id') }}</strong></span>@endif<br></div></div><div class="col-lg-3 col-sm-3 col-md-3 col-xs-12" id="AppCreAmount"><div class="from-group">{{ Form::label('cr_amount','Credit : ') }}<br><input type="text" data-id="'+j+'" name="cr_amount[]" value="00" class="cr_amount form-control" id="cr_amount" placeholder="00" ,required="required" /></div></div>{{-----start add more credit and remove button--------}}<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"><div class="from-group" id="AppDebAmount"> <br>    <button class="btn btn-light btn-sm text-dark"  style="margin:6px;" data-toggle="tooltip" title=" more Credit" id="addMoreCredit"><i class="fa fa-plus"></i></button><button style="margin: 6px" class="btn btn-danger btn-sm text-light"  id="removeCreditRow" data-toggle="tooltip" title="remove this" id=""><i class="fas fa-times"></i></button></div></div></div>';

            var AppendCreditRow = $('#AppendCreditRow').append(creditRow);
            $("select").select2();
        });

        //for getting first credit field value as a total of all debit
        $(".dr_amount").keyup(function() {
           // var abc = $("#cr_amount").first().val();
        });


        //experiment
        $(document).on('keyup','#cr_amount',function () {
           // $("#cr_amount").data('id').val(500);
            console.log('total debit amount .......'+totalDebit);
        });

        //get total credit amount after clicking add more credit button
        //===========================================================================================
        // **
        //===========================================================================================
        $(document).on('click','#addMoreCredit',function () {

            function totalCreditAmount(){
                $(".cr_amount").keyup(function(){
                    var creditSum = 0;
                    $('.cr_amount').each(function(){
                        creditSum += parseFloat(this.value);
                    });
                    window.totalCredit = creditSum;
                    console.log('total credit amount ' +creditSum);
                   // $('.creditJournal').next().find('.cr_amount').val();
                });
            }
            totalCreditAmount();

            console.log('remaining credit');
           $('.creditJournal').next().find('.cr_amount').val(1200000);

            // $(".cr_amount").each(function(){
            //     $(".cr_amount").eq(1).val(111111);

        });

        $(document).on("keyup","#cr_amount",function(){
           // totalCreditAmount();
        });


        //====================================================
        //remove multiple credit one by one
        //====================================================
        $(document).on('click','#removeCreditRow',function (e) {
            e.preventDefault();
            var ab = $(this).parent().parent().parent().remove();
        });


        $(document).on('keyup','#cr_amount',function (e) {
            var a = $('#cr_amount').data('id').length;
            //alert(a);
            //alert($('div').data('info'));//1
        });
        function doc_keyUp(e){
            if(e.ctrlKey && e.keyCode ==119){
                $("#addMoreDebit").trigger('click');
            }
            if(e.ctrlKey && e.keyCode ==120){
                $("#addMoreCredit").trigger('click');
            }
        }
        document.addEventListener('keyup',doc_keyUp, false);
    </script>
@stop
