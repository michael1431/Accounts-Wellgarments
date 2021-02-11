@extends('layouts.fixed')
{{--@section('title','add city')--}}
@section('title','Edit Journal')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Journal Edit</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Journal Edit</li>
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
                <div class="col-md-4">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
                {{-- end showin gsuccess message --}}

                <div class="row">
                    <div class="col-lg-12">
                        <div class=" bg-light">
                            {{--                            bg-dark--}}
                            <div class="card bg-dark card-info card-outline">
                                <div class="card-header">
                                    {{--<h3 class="card-title">Add City</h3>--}}
                                    <h3 class="card-title">Edit Journal</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-widget="collapse">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div> <!-- /.card-header -->

                                @php
                                  ///  $totalEntry = \App\Account\JournalEntrie::query()->where('ac_journal_id',$journal->id)->get();

                                //   $totalDebitEntry = \App\Account\JournalEntrie::query()
                                //   ->where('ac_journal_id',$journal->id)
                                //   ->where('type',0)
                                //   ->get();

                                //   $totalCreditEntry = \App\Account\JournalEntrie::query()
                                //   ->where('ac_journal_id',$journal->id)
                                //   ->where('type',1)
                                //   ->get();

                                  //@dd($totalDebitEntry->count());
                                 // @dd($totalCreditEntry->count());
                                @endphp
{{--                                // @dd($totalEntry)--}}

                                <div class="card-body" style="display: block;">
                                    {!! Form::model($journal,['route'=>['journal.update',$journal->id],'method'=>'POST','class'=>'form-horizontal']) !!}
                                    {{-- @include('account.journal.form',['buttonText'=>'save'])--}}
                 {{-- ==============================================================================================================
                    {{-- start edit code for edit jounal --}}
                 {{--===============================================================================================================--}}
                                    <div class="row">
                                        <div class="col-lg-2 col-sm-2 col-md-4 col-xs-12">
                                            <div class="from-group {{ $errors->has('date') ? 'has-error' : '' }} ">
                                                {{ Form::label('date','Date : ') }} <br>

                                                {{-- {{ $journal->date->format('d-m-Y') }} --}}

                                                {{Form::text('date',$journal->date->format('d-m-Y'),['id'=>'date','class'=>'form-control','readonly']) }}
                                                {{-- {{Form::text('date',date('Y-m-d'),['id'=>'date','class'=>'form-control']) }} --}}

                                                @if($errors->has('date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        @php
                                            //$companies = \App\Account\AccountCompany::query()->pluck('name','id');
                                        @endphp

                                        <div class="col-lg-4 col-sm-2 col-md-4 col-xs-12">
                                            {{ Form::label('company_id','Select a company : ') }}
                                            <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#myModal">
                                                add new company
                                            </button>
                                            <br>

                                            <div class="from-group {{ $errors->has('company_id') ? 'has-error' : '' }} ">
                                                {!! Form::select('company_id', $companies , null , ['class' => 'form-control','placeholder'=>'Select company']) !!}
                                                @if($errors->has('company_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('company_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-lg-12"></div>

                                        <div class="col-lg-6 col-sm-12 col-md-4 col-xs-12">
                                            <div class="from-group"> <br>
                                                {{ Form::label('journal_no','Journal No : ') }}
                                                {!! Form::text('journal_no',null,['class'=>'form-control','readonly'=>'readonly', 'rows' => 1, 'cols' => 40]) !!}
                                            </div>
                                        </div>

                                        <div class="col-lg-12"></div>

                                        <div class="col-lg-12 row" id="AppendDebitRow">
                                            @foreach($journal->journalEntries as $singleDebitEntry)
                                            @if($singleDebitEntry->type==0)
                                                <div class="col-lg-12 row">
                                                    <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                                                        <div class="from-group {{ $errors->has('dr_ledger_id[]') ? 'has-error' : '' }} ">
                                                            <br>
                                                            {{ Form::label('dr_ledger_id[]','Account Names (Dr): ') }}
                                                            {{-- including ledger's id as debit ledger group id--}}
                                                            {!! Form::select('dr_ledger_id[]', $repository->ledgerLists(),$singleDebitEntry->ledger_id,['class' => 'form-control','placeholder'=>'select Debit Accounts','required']) !!}
                                                            @if($errors->has('dr_ledger_id[]'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('dr_ledger_id[]') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                        <div class="from-group" id="AppDebAmount"> <br>
                                                            {{ Form::label('dr_amount[]','Debit : ') }}
                                                            {{ Form::text('dr_amount[]',$singleDebitEntry->amount,old('dr_amount[]'),['class'=>'dr_amount form-control','id'=>'dr_amount','placeholder'=>'00','required']) }}
                                                        </div>
                                                    </div>


                                                    {{----------add more debit button-------------}}
                                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                        <div class="from-group" id="AppDebAmount"> <br><br>
                                                            <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more debit" id="addMoreDebit">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @endforeach
                                        </div>{{--end debit row--}}


                                        {{--=============================================--}}

                                        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12"></div>

                                        {{--stary credit row --}}
                                        <div class="col-lg-12 row" id="AppendCreditRow">

                                            @foreach($journal->journalEntries as $singleCreditEntry)
                                            @if($singleCreditEntry->type==1)
                                                <div class="col-lg-12 row creditJournal">
                                                    <div class="col-lg-4 col-sm-3 col-md-3 col-xs-12">
                                                        <div class="from-group {{ $errors->has('cr_ledger_id') ? 'has-error' : '' }}"><br>
                                                            {{ Form::label('cr_ledger_id','Account Names (Cr) : ') }}
                                                            {{-- including ledger's id as credit ledger group id--}}
                                                            {!! Form::select('cr_ledger_id[]', $repository->ledgerLists() ,$singleCreditEntry->ledger_id , ['class' => 'form-control','placeholder'=>'select Credit Accounts','required']) !!}

                                                            @if($errors->has('cr_ledger_id'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('cr_ledger_id') }}</strong>
                                                                </span>
                                                            @endif
                                                            <br>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12" id="AppCreAmount">
                                                        <div class="from-group"><br>
                                                            {{ Form::label('cr_amount','Credit : ') }}
                                                            {{ Form::text('cr_amount[]',$singleCreditEntry->amount,old('cr_amount[]'),['class'=>'form-control cr_amount','placeholder'=>'00','id'=>'cr_amount','required']) }}
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                        <div class="from-group" id="AppDebAmount"> <br><br>
                                                            <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more Credit" id="addMoreCredit">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                            @endforeach
                                        </div>
                                        {{----------end credit row------------}}


                                        <div class="col-lg-12"></div>

                                        <div class="col-lg-6 col-sm-2 col-md-2 col-xs-12">
                                            <div class="from-group"><br>
                                                {{ Form::label('event','Event Or Transaction : ') }}
                                                {!! Form::textarea('event',null,['class'=>'form-control', 'rows' => 1, 'cols' => 10]) !!}
                                            </div>
                                        </div>

                                        <div class="col-lg-12"></div>

                                        {{--    <div class="col-lg-2 offset-lg-5 col-sm-4 col-md-4 col-xs-12"><br>--}}
                                        {{--        <div class="m-left-15 from-group">--}}
                                        {{--            <button class="btn btn-info">Create</button>--}}
                                        {{--        </div>--}}
                                        {{--    </div>--}}
                                    </div>

                   {{-- ==============================================================================================================
                          {{-- End edit code for edit jounal --}}
                   {{--===============================================================================================================--}}

                                    <div class="col-lg-2 offset-lg-4 col-sm-4 col-md-4 col-xs-12"><br>
                                        <div class="m-left-15 from-group">
                                            {{ Form::submit('Update Journal', ['class'=>'btn btn-success btn-block']) }}
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
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
    <link rel="stylesheet" href="{{asset('plugins/datepicker/datepicker3.css')}}" />
@stop

@section('plugin')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{asset('plugins/datepicker/bootstrap-datepicker.js')}}"></script>
@stop

@section('script')
    <!-- page script -->
    <script type="text/javascript">

        //search report date wise
        $(function () {
            $('#date').datepicker({
                autoclose: true,
                format: "dd-mm-yyyy",
            });
        })


        $(document).on('blur','#dr_amount',function () {
            dr_amount =   $('#dr_amount').val();
            $('#cr_amount').val(dr_amount);
        });


        $(document).ready(function () {

            //To auto create journal no

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
            var AppendDeb = '<div class="container row appendedDebitRow" id="row'+i+'"><div class="col-lg-5 col-sm-3 col-md-3 col-xs-12"><div class="from-group {{ $errors->has('dr_ledger_id[]') ? 'has-error' : '' }} "><br>{{ Form::label('dr_ledger_id[]','Account Names (Dr): ') }}{!! Form::select('dr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Debit Accounts','required']) !!}@if($errors->has('dr_ledger_id[]'))<span class="help-block"><strong>{{ $errors->first('dr_ledger_id[]') }}</strong></span>@endif</div></div><div class="col-lg-3 col-sm-2 col-md-2 col-xs-12"><div class="from-group" id="AppDebAmount"> <br>{{ Form::label('dr_amount[]','Debit : ') }}<input type="text" name="dr_amount[]" data-id="'+i+'" class="dr_amount form-control" value="00" id="dr_amount" placeholder="00" required /></div></div>{{-----start add more debit and remove button--------}}<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"><div class="from-group" id="AppDebAmount"> <br><br><button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more debit" id="addMoreDebit"><i class="fa fa-plus"></i></button><button style="margin: 11px 0" class="btn btn-danger btn-sm text-light"  id="removeDebitRow" style="margin:20px;" data-toggle="tooltip" title=" remove this" id=""> <i class="fas fa-times"></i></button></div></div></div>';

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
            var creditRow = '<div class="container row appendedCreditRow creditJournal" id="row'+j+'"><div class="col-lg-5 col-sm-3 col-md-3 col-xs-12"><div class="from-group {{ $errors->has('cr_ledger_id') ? 'has-error' : '' }}" id="AppendCreAcc"><br>{{ Form::label('cr_ledger_id','Account Names (Cr) : ') }}{!! Form::select('cr_ledger_id[]', $repository->ledgerLists() , null , ['class' => 'form-control','placeholder'=>'select Credit Accounts','required']) !!}@if($errors->has('cr_ledger_group_id'))<span class="help-block"><strong>{{ $errors->first('cr_ledger_id') }}</strong></span>@endif<br></div></div><div class="col-lg-3 col-sm-2 col-md-2 col-xs-12" id="AppCreAmount"><div class="from-group"><br>{{ Form::label('cr_amount','Credit : ') }}<input type="text" data-id="'+j+'" name="cr_amount[]" value="00" class="cr_amount form-control" id="cr_amount" placeholder="00" ,required="required" /></div></div>{{-----start add more credit and remove button--------}}<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12"><div class="from-group" id="AppDebAmount"> <br><br>    <button style="margin: 11px 0" class="btn btn-light btn-sm text-dark"  style="margin:20px;" data-toggle="tooltip" title=" more Credit" id="addMoreCredit"><i class="fa fa-plus"></i></button><button style="margin: 11px 0" class="btn btn-danger btn-sm text-light"  id="removeCreditRow" style="margin:20px;" data-toggle="tooltip" title="remove this" id=""><i class="fas fa-times"></i></button></div></div></div>';

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
    </script>
@stop
