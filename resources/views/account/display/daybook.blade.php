@extends('layouts.fixed')
@section('title','Day Book')
@section('content')
<section class="content">
    <div class="col-md-12">
        <div class="card-body">
            <div class=" bg-light">
                    {{--   bg-dark--}}
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Day Book Report</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div> <!-- /.card-header -->

                        <div class="card-body" style="display: block;">
                            <div class="box-header with-border text-center">
                                <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                                <p>{{ str_before(app_info()->address,"|") }}</p>
                                <small>{{ str_after(app_info()->address,"|") }}</small>
                                <h3>Day Book</h3>
                                <p>{{ date('d-F-Y') }}</p>
                            </div>
                    <table class="table table-bordered table-sm">
                        <tbody>
                        <tr>
                            <th>Date</th>
                            <th>Jr NO.</th>
                            <th>Particulars</th>
                            <th>Vch Type</th>
                            {{-- <th>Vch. No/Excise Inv. No</th> --}}
                            <th style="width:10%">Transaction<br> Amount</th>
                            {{-- <th style="width:10%">Action</th> --}}
                        </tr>
                        @forelse($transactions as $key=>$transaction)
                        <tr data-toggle="collapse" id="row{{$key}}" data-target=".row{{$key}}">
                            <td class="text-center"><span>{{ date('d-M-Y',strtotime($transaction->date)) }}</span></td>
                            <td class="text-center"><span class="badge btn btn-sm badge-dark">{{ $transaction->journal_no }}</span></td>
                            <td class="text-center"><span>{{ $transaction->event }}</span></td>
                            <td class="text-center">
                                <span>{{ $transaction->journalEntries->first()->note }}</span>
                            </td>
                            {{-- <td><span>{{ $transaction->journal_no }}</span></td> --}}
                            <td class="text-right"><span>{{ $transaction->journalEntries->first()->amount }}</span></td>
                        </tr>
                                {{-- Child Row --}}
                                {{-- @foreach($transaction as $index => $transaction) --}}
                                            <tr style="padding: 5px" class="collapse row{{$key}}">
                                                {{-- <td class="text-center">{{$transaction->firstItem()+$index}}</td> --}}
                                                <td class="text-center">
                                                        {{ $transaction->date->format('d-m-Y') }}
                                                </td>

                                                <td class="text-center">
                                                    <span class="badge btn btn-sm badge-dark">
                                                       {{$transaction->journal_no}}
                                                    </span>
                                                </td>

                                                <td>
                                                    {{-- start debit --}}
                                                    <div>
                                                        @php
                                                            $debitName='';
                                                            $drAmount='';
                                                            $creditName='';
                                                            $crAmount='';
                                                        @endphp
                                                        @foreach($transaction->journalEntries as $transactionEntry)
                                                            @php
                                                                if($transactionEntry->type==0){ 
                                                                    $debitName.= $transactionEntry->acchead->name.'<i><strong>&nbsp;(Dr)</strong></i><br>';
                                                                    $drAmount.=number_format($transactionEntry->amount,2).'&nbsp;&nbsp;&nbsp;&nbsp;<br>';
                                                                    $crAmount.='<br>';
                                                            }
                                                                if($transactionEntry->type==1){
                                                                    $creditName.=  '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$transactionEntry->acchead->name.'<i><strong>&nbsp;&nbsp;(Cr)</strong></i><br>';
                                                                    $crAmount.=number_format($transactionEntry->amount,2).'<br>';
                                                                }
                                                            @endphp
                                                        @endforeach
                                                            {!! $debitName !!}
                                                            
                                                            {!! $creditName !!}
                                                    </div>
                                                </td>

                                                <td class="text-center">{{str_limit($transaction->event,20)}}</td>

                                                <td class="text-right">
                                                    {!! rtrim($drAmount,'<br>') !!}
                                                   {!! $crAmount !!}
                                                </td>

                                                {{-- <td class="text-right">
                                                    
                                                </td> --}}
                                                {{-- <td>
                                                    {{ Form::open(['route'=>['journal.destroy',$transaction->id],'method'=>'delete','onsubmit'=>'return confirmDelete()']) }}
                                                        <a href="{{ route('journal.edit',$transaction->id) }}" type="button" class="btn btn-info btn-sm">
                                                            <i class="fa fa-pencil-alt"></i>
                                                        </a>

                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fa fas fa-trash"></i>
                                                        </button>
                                                    {{ Form::close() }}
                                                </td> --}}
                                            </tr>
                                         {{-- @endforeach --}}
                              
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection