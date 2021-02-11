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
                            <p style="cursor:pointer" class="text-right no-print" id="full_view">Full View</p>
                            @php
                                //$principles = \App\Account\Principle\Principle::all();
                            @endphp
                            {!! $accountHeads !!}
{{-- 
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
                                                    <li>
                                                        <span class="{{$ledgerList->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList->name }} </span> {{ $ledgerList->ledger==0 ? '(GR 2)':'(LEDGER)'}}
                                                        <ul>
                                                            @forelse($ledgerList->childs as $ledgerList2)
                                                            <li><span class="{{$ledgerList2->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList2->name }} {{ $ledgerList2->ledger==0 ? '(GR 3)':'(LEDGER)'}}</span>
                                                                <ul>
                                                                    @forelse($ledgerList2->childs as $ledgerList3)
                                                                    <li>
                                                                        <span class="{{$ledgerList3->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList3->name }} {{ $ledgerList3->ledger==0 ? '(GR 4)':'(LEDGER)'}}</span>
                                                                        <ul>
                                                                            @forelse($ledgerList3->childs as $ledgerList4)
                                                                            <li>
                                                                                <span class="{{$ledgerList4->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList4->name }} {{ $ledgerList4->ledger==0 ? '(GR 5)':'(LEDGER)'}}</span>
                                                                                <ul>
                                                                                    @forelse($ledgerList4->childs as $ledgerList5)
                                                                                    <li>
                                                                                        <span class="{{$ledgerList5->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList5->name }} {{ $ledgerList5->ledger==0 ? '(GR 6)':'(LEDGER)'}}</span>
                                                                                        <ul>
                                                                                            @forelse($ledgerList5->childs as $ledgerList6)
                                                                                            <li>
                                                                                                <span class="{{$ledgerList6->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList6->name }} {{ $ledgerList6->ledger==0 ? '(GR 6)':'(LEDGER)'}}</span>
                                                                                                <ul>
                                                                                                    @forelse($ledgerList6->childs as $ledgerList7)
                                                                                                    <li>
                                                                                                        <span class="{{$ledgerList7->ledger==0?'font-weight-bold':'font-weight-normal'}}">{{ $ledgerList7->name }} {{ $ledgerList7->ledger==0 ? '(GR 6)':'(LEDGER)'}}</span>
                                                                                                        
                                                                                                    </li>
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
                                                                                
                                                                            </li>
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
                                                    </li>

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
                            </ul> --}}
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
{{-- 
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
</style> --}}
@section('css')
<style>
    ul, #myUL {
  list-style-type: none;
}

#myUL {
  margin: 0;
  padding: 0;
}

.caret {
  cursor: pointer;
  -webkit-user-select: none; /* Safari 3.1+ */
  -moz-user-select: none; /* Firefox 2+ */
  -ms-user-select: none; /* IE 10+ */
  user-select: none;
}

.caret::before {
  content: "\25B6";
  color: black;
  display: inline-block;
  margin-right: 6px;
}

.caret-down::before {
  -ms-transform: rotate(90deg); /* IE 9 */
  -webkit-transform: rotate(90deg); /* Safari */'
  transform: rotate(90deg);  
}

.nested {
  display: none;
}

.active {
  display: block;
}

</style>
@stop

@section('plugin')
@stop
@section('script')
    <!-- page script -->
    <script type="text/javascript">
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
        $('#full_view').click(function(e){
           if(e.currentTarget.innerHTML == "Full View"){
               $('.nested').css('display','block');
               e.currentTarget.innerHTML = "Short View";
           }else{
            $('.nested').css('display','none');
               e.currentTarget.innerHTML = "Full View";
           }
        });
    </script>

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
{{--                                    <li><span>{{$principle->name}}</strong>--}}
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