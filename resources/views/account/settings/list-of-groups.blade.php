@extends('layouts.fixed')
@section('title','Lists of Groups')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <button class="pull-left btn btn-info btn-sm" onClick="window.print()">Print</button>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{--                    <h1>Lists of Groups</h1>--}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Lists of Groups</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="bg-light">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><i>Lists of Groups</i></h3>


                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            <ul class="charOfAccount treeList">
                                @forelse($principles as $principle)
                                <li>
                                    <strong>{{ $principle->name}}</strong> (pri- 1)

                                    <ul>
                                        @forelse($principle->childs as $group)
                                            <li>
                                                <span class="{{$group->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $group->name }} {{ $group->ledger==0 ? '(GR 1)':'(LEDGER)'}} </span>
                                                <ul>
                                                
                                                    @forelse($group->childs as $ledgerList)
                                                    @if($ledgerList->ledger==0)
                                                    <li>
                                                        <span class="{{$ledgerList->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList->name }} </span> {{ $ledgerList->ledger==0 ? '(GR 2)':'(LEDGER)'}}
                                                        <ul>
                                                            @forelse($ledgerList->childs as $ledgerList2)
                                                            @if($ledgerList2->ledger==0)
                                                            <li><span class="{{$ledgerList2->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList2->name }} {{ $ledgerList2->ledger==0 ? '(GR 3)':'(LEDGER)'}}</span></li>
                                                            @endif
                                                            @empty
                                                            @endforelse
                                                        </ul>
                                                    </li>
                                                    @endif
                                                        @empty
                                                        @endforelse
                                                   
                                                </ul>
                                            </li>
                                    @empty
                                    @endforelse
                                    </ul>
                                </li>
                            @empty
                            @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
@stop

@section('style')
    <!-- DataTables -->
    {{--    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/../public/css/tree.css') }}">
@stop

{{--<div class="page_break"></div>--}}

<style>
      .page_break {
          page-break-after: always;
      }

    /*1st step */
    ul.charOfAccount li::selection {
        background: #ffb7b7; /* WebKit/Blink Browsers */
        color: #000;
    }
    ul.charOfAccount li::-moz-selection {
        background: #ffb7b7; /* Gecko Browsers */
        color: #000;
    }
    /*2nd step*/
    ul.charOfAccount li ul li::selection {
        background: red; /* WebKit/Blink Browsers */
        color: #fff;
    }
    ul.charOfAccount li ul li::-moz-selection {
        background: red; /* Gecko Browsers */
        color: #fff;
    }
    /*3rd step */
    ul.charOfAccount li ul li ul li::selection {
        background: #000; /* WebKit/Blink Browsers */
        color: #fff;
    }
    ul.charOfAccount li ul li ul li::-moz-selection {
        background: #000; /* Gecko Browsers */
        color: #fff;
    }

    /* 4th step */
    ul.charOfAccount li ul li ul li ul li::selection {
        background: green; /* WebKit/Blink Browsers */
        color: #fff;
    }
    ul.charOfAccount li ul li ul li ul li::-moz-selection {
        background: green; /* Gecko Browsers */
        color: #fff;
    }
</style>
@section('css')
@stop

@section('plugin')
@stop