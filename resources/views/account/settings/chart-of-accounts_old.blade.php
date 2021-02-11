@extends('layouts.fixed')
@section('title','Chart of Account')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Chart of Accounts</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Chart of Accounts</li>
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
                            <h3 class="card-title"><i>Chart of Accounts</i></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            @php
                                $principles = \App\Account\Principle\Principle::all();
                            @endphp

                            <ul class="charOfAccount treeList">
                                @foreach($principles as $principle)
                                    <li>
                                        <strong>{{ $principle->name}}</strong> pri- 1{{-- //principle like asset, liabilities .....--}}
                                            @php
                                                //$groups_1st = \App\Account\LedgerGroup::query()->where('principle_id',$principle->id)->get();
                                                $groups_1st = $principle->ledgerGroups;
                                            @endphp
                                            <ul>
                                                @foreach($groups_1st as $group)
                                                    <li>
                                                        <strong>{{ $group->name }} (gr 1)</strong>

                                                            {{--1.1 Another Ledger Lists for first group --}}
                                                            @php
                                                                $ledger_group = \App\Account\LedgerGroup::query()->where('name',$group->name)->first();
                                                                $led_group_id = $ledger_group['id'];
                                                                $ledgerLists = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                            @endphp

                                                            @if($ledgerLists)
                                                                <ul>
                                                                    @foreach($ledgerLists as $ledgerList)
                                                                        <li>{{ $ledgerList->name }}  (led 1)</li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif

                                                        {{-- 2nd step Ledger Lists  --}}
                                                        <ul>
                                                            @php
                                                                $groups_2nd = \App\Account\LedgerGroup::query()->where('group_id',$group->id)->get();
                                                              @endphp
                                                            {{--//@dd($childGroups)--}}
                                                            @foreach($groups_2nd as $group_2nd)
                                                                <li><strong>{{ $group_2nd->name }}   --(gr 2)</strong>

                                                                    {{-- Ledger Lists for 2nd step  start --}}
                                                                    @php
                                                                        $led_group = \App\Account\LedgerGroup::query()->where('name',$group_2nd->name)->first();
                                                                        $led_group_id = $led_group['id'];
                                                                        $ledgerLists_2nd = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                    @endphp

                                                                    @if($ledgerLists_2nd)
                                                                        <ul>
                                                                            @foreach($ledgerLists_2nd as $ledger_2nd)
                                                                                <li>{{ $ledger_2nd->name }} <i><code>&nbsp;&nbsp;(ledger step 2) </code></i></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif

                                                                    <ul>
                                                                        @php
                                                                            $groups_3nd = \App\Account\LedgerGroup::query()->where('group_id',$group_2nd->id)->get();
                                                                        @endphp

                                                                        @foreach($groups_3nd as $group_3rd)
                                                                            <li><strong>{{ $group_3rd->name }}   --(gr 3)</strong>

                                                                            {{-- start 3rd Ledger list for 3rd group --}}
                                                                            @php
                                                                                $led_group_3rd = \App\Account\LedgerGroup::query()->where('name',$group_3rd->name)->first();
                                                                                $led_group_id = $led_group_3rd['id'];
                                                                                $ledgerLists_3rd = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                            @endphp

                                                                            @if($ledgerLists_3rd)
                                                                                <ul>
                                                                                    @foreach($ledgerLists_3rd as $ledgerList_3rd)
                                                                                        <li>{{ $ledgerList_3rd->name }} <i><code>&nbsp;&nbsp;(ledger step 3) </code></i></li>
                                                                                    @endforeach
                                                                                </ul>
                                                                            @endif
                                                                                {{-- end 3rd Ledger list for 3rd group --}}

                                                                                {{-- start 4th step group--}}
                                                                                <ul>
                                                                                    @php
                                                                                        $groups_4th = \App\Account\LedgerGroup::query()->where('group_id',$group_3rd->id)->get();
                                                                                    @endphp

                                                                                    @foreach($groups_4th as $group_4th)
                                                                                        <li>
                                                                                            <strong>{{ $group_4th->name }}   --(gr 4)</strong>

                                                                                            {{-- start 4th Ledger list for 4th group --}}
                                                                                            @php
                                                                                                $led_group_4th = \App\Account\LedgerGroup::query()->where('name',$group_4th->name)->first();
                                                                                                $led_group_id = $led_group_4th['id'];
                                                                                                $ledgerLists_4th = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                                            @endphp

                                                                                            @if($ledgerLists_4th)
                                                                                                <ul>
                                                                                                    @foreach($ledgerLists_4th as $ledgerList_4th)
                                                                                                        <li>{{ $ledgerList_4th->name }} <i><code>&nbsp;&nbsp;(ledger step 4) </code></i></li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            @endif
                                                                                            {{-- end 4th Ledger list for 4th group --}}

                                                                                            <ul>
                                                                                                @php
                                                                                                    $groups_5th = \App\Account\LedgerGroup::query()->where('group_id',$group_4th->id)->get();
                                                                                                @endphp

                                                                                                @foreach($groups_5th as $group_5th)
                                                                                                    <li><strong>{{ $group_5th->name }}   --(gr 5)</strong>

                                                                                                        {{-- start 5th Ledger list for 5th group --}}
                                                                                                        @php
                                                                                                            $led_group_5th = \App\Account\LedgerGroup::query()->where('name',$group_5th->name)->first();
                                                                                                            $led_group_id = $led_group_5th['id'];
                                                                                                            $ledgerLists_5th = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                                                        @endphp

                                                                                                        @if($ledgerLists_5th)
                                                                                                            <ul>
                                                                                                                @foreach($ledgerLists_5th as $ledgerList_5th)
                                                                                                                    <li>{{ $ledgerList_5th->name }} <i><code>&nbsp;&nbsp;(ledger step 5th) </code></i></li>
                                                                                                                @endforeach
                                                                                                            </ul>
                                                                                                        @endif
                                                                                                        {{-- end 5th Ledger list for 5th group --}}

                                                                                                        {{-- start 6th step group--}}
                                                                                                        <ul>
                                                                                                            @php
                                                                                                                $groups_6th = \App\Account\LedgerGroup::query()->where('group_id',$group_5th->id)->get();
                                                                                                            @endphp

                                                                                                            @foreach($groups_6th as $group_6th)
                                                                                                                <li><strong>{{ $group_6th->name }}   --(gr 6)</strong>

                                                                                                                    {{-- start 6th Ledger list for 6th group --}}
                                                                                                                    @php
                                                                                                                        $led_group_6th = \App\Account\LedgerGroup::query()->where('name',$group_6th->name)->first();
                                                                                                                        $led_group_id = $led_group_6th['id'];
                                                                                                                        $ledgerLists_6th = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                                                                    @endphp

                                                                                                                    @if($ledgerLists_6th)
                                                                                                                        <ul>
                                                                                                                            @foreach($ledgerLists_6th as $ledgerList_6th)
                                                                                                                                <li>{{ $ledgerList_6th->name }} <i><code>&nbsp;&nbsp;(ledger step 6th) </code></i></li>
                                                                                                                            @endforeach
                                                                                                                        </ul>
                                                                                                                    @endif
                                                                                                                    {{-- end 6th Ledger list for 6th group --}}



                                                                                                                    {{-- start 7th step group--}}
                                                                                                                    <ul>
                                                                                                                        @php
                                                                                                                            $groups_7th = \App\Account\LedgerGroup::query()->where('group_id',$group_6th->id)->get();
                                                                                                                        @endphp

                                                                                                                        @foreach($groups_7th as $group_7th)
                                                                                                                            <li><strong>{{ $group_7th->name }}   --(gr 7)</strong>

                                                                                                                                {{-- start 7th Ledger list for 7th group --}}
                                                                                                                                @php
                                                                                                                                    $led_group_7th = \App\Account\LedgerGroup::query()->where('name',$group_7th->name)->first();
                                                                                                                                    $led_group_id = $led_group_7th['id'];
                                                                                                                                    $ledgerLists_7th = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();
                                                                                                                                @endphp

                                                                                                                                @if($ledgerLists_7th)
                                                                                                                                    <ul>
                                                                                                                                        @foreach($ledgerLists_7th as $ledgerList_7th)
                                                                                                                                            <li>{{ $ledgerList_7th->name }} <i><code>&nbsp;&nbsp;(ledger step 7th) </code></i></li>
                                                                                                                                        @endforeach
                                                                                                                                    </ul>
                                                                                                                                @endif
                                                                                                                                {{-- end 7th Ledger list for 7th group --}}

                                                                                                                            </li>
                                                                                                                        @endforeach
                                                                                                                    </ul>


                                                                                                                </li>
                                                                                                            @endforeach

                                                                                                        </ul>
                                                                                                        {{-- start 6th step group--}}

                                                                                                    </li>
                                                                                                @endforeach
                                                                                            </ul>

                                                                                        </li>
                                                                                    @endforeach
                                                                                </ul>
                                                                                {{--end 4th step group--}}

                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                        </ul>
                                    </li>
                                @endforeach
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












{{--//full backup for sub principle --}}
{{--==============================================================================--}}
{{--@extends('layouts.fixed')--}}
{{--@section('title','Chart of Account')--}}
{{--@section('content')--}}
{{--    <!-- Content Header (Page header) -->--}}
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}

{{--            </div>--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}
{{--    <section class="content-header">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row mb-2">--}}
{{--                <div class="col-sm-6">--}}
{{--                    <h1>Chart of Accounts</h1>--}}
{{--                </div>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <ol class="breadcrumb float-sm-right">--}}
{{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                        <li class="breadcrumb-item active">Chart of Accounts</li>--}}
{{--                    </ol>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}

{{--    <!-- Main content -->--}}
{{--    <section class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="bg-light">--}}
{{--                    <div class="card card-info card-outline">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title"><i>Chart of Accounts</i></h3>--}}
{{--                            <div class="card-tools">--}}
{{--                                <button type="button" class="btn btn-tool" data-widget="collapse">--}}
{{--                                    <i class="fas fa-plus"></i>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div> <!-- /.card-header -->--}}

{{--                        <div class="card-body" style="display: block;">--}}
{{--                            @php--}}
{{--                                $principles = \App\Account\Principle\Principle::all();--}}
{{--                            @endphp--}}

{{--                            <ul class="charOfAccount treeList">--}}
{{--                                @foreach($principles as $principle)--}}
{{--                                    <li><strong>{{$principle->name}}</strong>--}}
{{--                                        <ul>--}}
{{--                                            @foreach($principle->sub_principles as $sub_principle)--}}
{{--                                                --}}{{--GROUPS NAME--}}
{{--                                                <li><strong>{{$sub_principle->name}}</strong>--}}

{{--                                                    --}}{{--1. LEDGER LISTS FORM ACCOUNT LEDGER MODEL FOR THIS GROUPS  --}}
{{--                                                    @php--}}
{{--                                                        $led_by_sub_pr = \App\Account\LedgerGroup::query()->where('name',$sub_principle->name)->first();--}}
{{--                                                        $led_by_sub_pr = $led_by_sub_pr['id'];--}}
{{--                                                        $ledgerLists = \App\Account\AccountLedger::query()->where('group_id',$led_by_sub_pr)->get();--}}
{{--                                                    @endphp--}}

{{--                                                    @if($ledgerLists)--}}
{{--                                                        <ul>--}}
{{--                                                            @foreach($ledgerLists as $ledgerList)--}}
{{--                                                                <li>{{ $ledgerList->name }}</li>--}}
{{--                                                            @endforeach--}}
{{--                                                        </ul>--}}
{{--                                                    @endif--}}
{{--                                                    --}}{{--1st step ledger lists end --}}

{{--                                                    @php--}}
{{--                                                        $groups = \App\Account\LedgerGroup::query()->where('sub_principle_id',$sub_principle->id)->get();--}}
{{--                                                    @endphp--}}
{{--                                                    <ul>--}}
{{--                                                        @foreach($groups as $group)--}}
{{--                                                            <li>--}}
{{--                                                                <strong>{{ $group->name }}</strong>--}}

{{--                                                                --}}{{-- 2.Another Ledger Lists for account ledger start --}}
{{--                                                                @php--}}
{{--                                                                    $led_group = \App\Account\LedgerGroup::query()->where('name',$group->name)->first();--}}
{{--                                                                    $led_group_id = $led_group['id'];--}}
{{--                                                                    $ledgerLists = \App\Account\AccountLedger::query()->where('group_id',$led_group_id)->get();--}}
{{--                                                                @endphp--}}

{{--                                                                @if($ledgerLists)--}}
{{--                                                                    <ul>--}}
{{--                                                                        @foreach($ledgerLists as $ledgerList)--}}
{{--                                                                            <li>{{ $ledgerList->name }}</li>--}}
{{--                                                                        @endforeach--}}
{{--                                                                    </ul>--}}
{{--                                                                @endif--}}
{{--                                                                --}}{{--2nd step ledger lists end --}}

{{--                                                                <ul>--}}
{{--                                                                    @php--}}
{{--                                                                        $childGroups = \App\Account\LedgerGroup::query()->where('group_id',$group->id)->get();--}}
{{--                                                                    @endphp--}}
{{--                                                                    --}}{{--//@dd($childGroups)--}}

{{--                                                                    @foreach($childGroups as $childGroup)--}}
{{--                                                                        <li><strong>{{ $childGroup->name }}</strong></li>--}}
{{--                                                                    @endforeach--}}
{{--                                                                </ul>--}}
{{--                                                            </li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}
{{--@stop--}}

{{--@section('style')--}}
{{--    <!-- DataTables -->--}}
{{--    --}}{{--    <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/../public/css/tree.css') }}">--}}
{{--@stop--}}

{{--<style>--}}
{{--    /*ul.charOfAccount li {*/--}}
{{--    /*    list-style-type: disclosure-closed;*/--}}
{{--    /*    color: red;*/--}}
{{--    /*    font-weight: bold;*/--}}
{{--    /*    background: #fff;*/--}}
{{--    /*    color: #000;*/--}}
{{--    /*    padding: 5px;*/--}}
{{--    /*}*/--}}
{{--    /*ul.charOfAccount li ul li{list-style-type: disclosure-closed;*/--}}
{{--    /*    color: orangered;*/--}}
{{--    /*}*/--}}
{{--    /*ul.charOfAccount li ul li ul li {*/--}}
{{--    /*    list-style-type: number !important;*/--}}
{{--    /*    color: green;*/--}}
{{--    /*    margin-bottom: 4px;*/--}}
{{--    /*    text-transform: capitalize;*/--}}
{{--    /*    font-weight: normal;*/--}}
{{--    /*    !*border-bottom: 1px solid #000;*!*/--}}
{{--    /*    width: 50%;*/--}}
{{--    /*}*/--}}


{{--    /*1st step */--}}
{{--    ul.charOfAccount li::selection {--}}
{{--        background: #ffb7b7; /* WebKit/Blink Browsers */--}}
{{--        color: #000;--}}
{{--    }--}}
{{--    ul.charOfAccount li::-moz-selection {--}}
{{--        background: #ffb7b7; /* Gecko Browsers */--}}
{{--        color: #000;--}}
{{--    }--}}
{{--    /*2nd step*/--}}
{{--    ul.charOfAccount li ul li::selection {--}}
{{--        background: red; /* WebKit/Blink Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--    ul.charOfAccount li ul li::-moz-selection {--}}
{{--        background: red; /* Gecko Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--    /*3rd step */--}}
{{--    ul.charOfAccount li ul li ul li::selection {--}}
{{--        background: #000; /* WebKit/Blink Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--    ul.charOfAccount li ul li ul li::-moz-selection {--}}
{{--        background: #000; /* Gecko Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}

{{--    /* 4th step */--}}
{{--    ul.charOfAccount li ul li ul li ul li::selection {--}}
{{--        background: green; /* WebKit/Blink Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--    ul.charOfAccount li ul li ul li ul li::-moz-selection {--}}
{{--        background: green; /* Gecko Browsers */--}}
{{--        color: #fff;--}}
{{--    }--}}
{{--</style>--}}
{{--@section('css')--}}
{{--@stop--}}

{{--@section('plugin')--}}

{{--@stop--}}

{{--==============================================================================--}}
{{--//end backup for sub principle --}}