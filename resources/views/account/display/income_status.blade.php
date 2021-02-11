@extends('layouts.fixed')
@section('title','Income Statement')
    @section('css')
        <style>
            .table{
                /*border: solid black 1px;*/
            }
            .table tr td, .table tr th{
                border: none;
            }
            .head_table{
                background-color: black;
                color: white;
            }
            .table tr td a {
                color: inherit;
            }
            span.tab { margin-left: 40px; }
            span.tab-2 { margin-left: 80px; }
            .table tr td.underline{
                border-bottom: solid 2px;
            }
            .amount_column{
                width:150px;
            }
            .head_table tr td{
                border: solid black 1px;
            }
            @media print {
                .table tr td a {
                    text-decoration: none;
                }
                .page_break  { page-break-after: always; }
            }
        </style>
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    {{Form::open(['url'=>'reports/profit_loss', 'method'=>'get']) }}

                    <div class="form-row">

                        <div class="form-group col-md-2">
                            {{Form::label('accounts_name', 'From Date', ['class'=>''])}}
                            <input type="date" name="start" id="start" style="margin: -1px 2px" class="datePicker form-control pull-right"  placeholder="select start date" required>
                        </div>

                        <div class="form-group col-md-2">
                            {{Form::label('accounts_name', 'To Date', ['class'=>''])}}
                            <input type="date" name="end" id="end" style="margin: -1px 2px" class="datePicker form-control pull-right"  placeholder="select end date" required>
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('accounts_name', 'Openning Balance', ['class'=>''])}}
                           <br>
                            <label class="radio-inline"><input value="1" type="radio" name="openning" checked>Show  </label>&nbsp;&nbsp;
                            <label class="radio-inline"><input value="0" type="radio" name="openning">  Hide</label>
                        </div>

                        <div class="form-group col-md-3" style="padding-bottom: 10px; margin: 29px 0 0 0;">
                            <input type="submit" class="btn btn-info" value="search">
                        </div>

                        <div class="form-group  col-md-2" style="padding-bottom:5px; margin: 29px 0 0 0;" >
                            <button class="btn btn-success btn-sm" onclick="window.print(); return false;">Print</button>
                            <button class="btn btn-primary btn-sm" href="#add_show_case" data-toggle="tab">Pdf</button>
                        </div>
                    </div>
                    {{  Form::close() }}

                </div>
            </div>
            <br>
            <br>

            <div class="card" id='print_portion'>
                <div class="card-header with-border text-center">
                    <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                    <p>{{ str_before(app_info()->address,"|") }}</p>
                    <small>{{ str_after(app_info()->address,"|") }}</small>
                    <h3>Income Statement</h3>
                    <p>{{ request('start') && request('end') ? date('d-M-Y', strtotime(request('start'))) .' To '.date('d-M-Y', strtotime(request('end'))) : "At The End Of ".date('d-m-Y')}}</p>
                    <p style="cursor:pointer" class="text-right no-print" id="full_view"  >Full View</p>
                </div>
                {{-- <div class="card-body">
                    <table class="table table-sm table-bordered head_table">
                        <tr>
                            <td rowspan="2" class="text-center"><b>Particular</b></td>
                            @if(request('openning'))
                            <td rowspan="2" class="text-right">Openning Balance</td>
                            @endif
                            <td colspan="2" class="text-center">Closing Balance</td>
                        </tr>
                        <tr>
                            <td  class="text-center amount_column"><b>Notes</b></td>
                            <td  class="text-center amount_column"><b>Amount</b></td>
                            <td  class="text-center amount_column"><b>Amount</b></td>
                        </tr>
                    </table>
                    <table class="table table-sm">
                     
                        @php
                            $debitTotal=0;
                            $creditTotal=0;
                        @endphp
                        @forelse($accountHeadGroups as $key=>$accountHeads)
                            @php
                                $heads=strtolower(str_replace(' ','_',$key));
                            @endphp
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#{{$heads}}" aria-expanded="false" class="collapsed">
                                    <b style="padding:0 0 0 20px;">{{ $key }}</b>
                                </a>
                            </td>
                            @php
                                $headForAmount=0;
                                $subTotal=0;
                                $openningTotal=0;
                            @endphp
                            @forelse($accountHeads as $child=>$accountHead)
                           
                            @php
                                 if($headForAmount != $accountHead->ledger_id){
                                    $subTotal+=$ledgerWiseAmounts[$accountHead->ledger_id];
                                    $openningTotal+=array_key_exists($accountHead->ledger_id,$openingAmounts) ? $openingAmounts[$accountHead->ledger_id]:0;
                                 }
                                 $headForAmount=$accountHead->ledger_id;
                            @endphp
                              
                            @empty
                            @endforelse
                            @if (request('openning'))
                                <td class="text-right amount_column">
                                    <b>
                                       
                                        {{ ltrim(number_format($openningTotal,2),'-') }}{{ $openningTotal>0? '(DR)' : '(CR)' }}
                                       
                                    </b>
                                </td>
                            @endif
                            <td class="text-right amount_column">
                                <b>
                                    @if($subTotal>0)
                                    {{ number_format($subTotal,2) }}
                                    @else
                                    {{ '0.00' }}
                                     @endif
                                </b>
                            </td>
                            <td class="text-right amount_column">
                                <b>
                                    @if($subTotal<0)                                    
                                        {{ number_format(ltrim($subTotal,'-'),2) }}
                                    @else
                                        {{ '0.00' }}
                                     @endif
                                </b>
                            </td>
                        </tr>
                        <tr id="{{$heads}}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="4">
                                <table class="table table-sm">
                                    @php
                                        $head=0;
                                        $bamount=0;
                                        $openingAmountsdebitTotal=0;
                                        $openingAmountscreditTotal=0;
                                    @endphp
                                    @forelse($accountHeads as $child=>$accountHead)
                                        
                                        @if($head != $accountHead->ledger_id)
                                            <tr>
                                                <td><span class="tab">{{ $accountHead->acchead->name }}</span></td>
                                                    @if(request('openning'))
                                                        <td class="text-right">
                                                        
                                                            @if(array_key_exists($accountHead->ledger_id,$openingAmounts) && $openingAmounts[$accountHead->ledger_id]>0)
                                                                @php
                                                                    $openingAmountsdebitTotal+=$openingAmounts[$accountHead->ledger_id];
                                                                @endphp
                                                                {{ number_format($openingAmounts[$accountHead->ledger_id],2) }}
                                                            @elseif(array_key_exists($accountHead->ledger_id,$openingAmounts) && $openingAmounts[$accountHead->ledger_id]<0)
                                                                @php
                                                                    $openingAmountscreditTotal+=ltrim($openingAmounts[$accountHead->ledger_id],'-');
                                                                @endphp
                                                                {{ number_format(ltrim($openingAmounts[$accountHead->ledger_id],'-'),2) }}
                                                            @else
                                                                {{ '0.00' }}
                                                            @endif
                                                        
                                                        
                                                        </td>
                                                    @endif
                                                <td class="text-right amount_column">
                                                   
                                                        @if($ledgerWiseAmounts[$accountHead->ledger_id]>0)
                                                        @php
                                                            $debitTotal+=$ledgerWiseAmounts[$accountHead->ledger_id];
                                                        @endphp
                                                            {{ number_format($ledgerWiseAmounts[$accountHead->ledger_id],2) }}
                                                        @endif
                                                   
                                                </td>
                                                <td class="text-right amount_column">
                                                    @if($ledgerWiseAmounts[$accountHead->ledger_id]<0)
                                                        @php
                                                            $creditTotal+=ltrim($ledgerWiseAmounts[$accountHead->ledger_id],'-');
                                                        @endphp
                                                        {{ number_format(ltrim($ledgerWiseAmounts[$accountHead->ledger_id],'-'),2) }}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                        @php
                                            $head=$accountHead->ledger_id;
                                        @endphp
                                    @empty
                                    @endforelse
                                
                                </table>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                      
                        <tr>
                            <td class="text-center"><span><b>Grand Total:</b></span></td>
                            @if(request('openning'))
                                <td></td>
                            @endif
                            <td class="text-right underline"><b>{{ number_format($debitTotal,2) }}</b></td>
                            <td class="text-right underline"><b>{{ number_format($creditTotal,2) }}</b></td>
                        </tr>
                    </table>
                </div> --}}
                <!-- /.box-body -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr class="table-success">
                          
                            <th class="text-center">Account Title</th>
                            <th class="text-center">Notes</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th><u>Sales Revenue:</u></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['sales_revenue']['account_head']}}</td>
                            <th></th>
                            <th class="text-right">{{$sale=$returndata['sales_revenue']['amount']}}</th>
                            <th></th>
                          </tr>
                          <tr>
                            <th>&nbsp;&nbsp;&nbsp;&nbspLess:Sales Return & allowances:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['sales_return']['account_head']}}</td>
                            <td class="text-right">{{$returndata['sales_return']['amount']}}</td>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['sales_discount']['account_head']}}:</td>
                            <td class="text-right" style="border-bottom: black 2px solid;">{{$returndata['sales_discount']['amount']}}</td>
                            <td class="text-right" style="border-bottom: black 2px solid;">{{$saleAllowence=($returndata['sales_discount']['amount']+$returndata['sales_return']['amount'])}}</td>
                            <th></th>
                          </tr>
                          <tr>
                            <th class="text-right">Net Sales</th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{$netSale=$sale-$saleAllowence}}</th>
                          </tr>
                          <tr>
                            <th><u>Less: Cost of Goods Sold(COGS)</u></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;Beginning Inventory</td>
                            <th></th>
                            <td class="text-right">{{$bInventory=0}}</td>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['purchase']['account_head']}}</td>
                            <th class="text-right">{{$purchase=$returndata['purchase']['amount']}}</th>
                            <td></td>
                            <th></th>
                          </tr>
                          <tr>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;Less:Purchase Return & allowances:</th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['purchase_return']['account_head']}}:</td>
                            <td class="text-right">({{$returndata['purchase_return']['amount']}})</td>
                            <th></th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$returndata['purchase_discount']['account_head']}} :</td>
                            <td class="text-right" style="border-bottom: black 2px solid;">({{$returndata['purchase_discount']['amount']}})</td>
                            <td></td>
                            <th></th>
                          </tr>
                          <tr>
                            <th class="text-right">Net Purchases</th>
                            <th></th>
                            
                            <th class="text-right">{{$netPurchase=$purchase-($returndata['purchase_return']['amount']+$returndata['purchase_discount']['amount'])}}</th>
                            <th></th>
                          </tr>
                          <tr>
                            <td>&nbsp;&nbsp;&nbsp;&nbsp;Ending Inventory</td>
                            <th></th>
                            <td class="text-right" style="border-bottom: black 2px solid;">({{$eInventory=$returndata['endingInventory']}})</td>
                            <th></th>
                          </tr>
                          <tr>
                            <td>Total Cost of Goods Sold</td>
                            <th></th>
                            <td></td>
                            <td class="text-right" style="border-bottom: black 2px solid;">({{$cogs=($bInventory+$netPurchase-$eInventory)}})</td>
                           
                          </tr>
                          <tr class="table-info">
                            <th><u>Gross Income:</u></th>
                            <th></th>
                            <th></th>
                            <th class="text-right">@php
                                $grossProfit=$netSale-$cogs;
                                @endphp
                                {{number_format($grossProfit,2)}}</th>
                          </tr>
                          {{-- Operating Expenses --}}
                          <tr>
                            <th><u>Less:Operating Expenses:</u></th>
                            <th></th>
                            <th></th>
                            <th></th>
                          </tr>
                          @php  $sumAmount=0; @endphp
                          @forelse ($operatingExp as $opEx)
                          @if($opEx['amount']>0)
                          <tr>
                          <td>&nbsp;&nbsp;&nbsp;&nbsp;{{$opEx['account_head']}}</td>
                            <td></td>
                            @php  $sumAmount+=$opEx['amount']; @endphp
                          <td class="text-right">{{$opEx['amount']}}</td>
                            <td></td>
                          </tr>
                          @endif 
                          @empty
                              
                          @endforelse
                          <tr>
                            <td>Total Operating Expenses</td>
                            <th></th>
                            <td style="border-top: black 2px solid;"></td>
                            <td class="text-right" style="border-bottom: black 2px solid;">({{$sumAmount}})</td>
                          
                          </tr>
                          <tr class="table-info">
                            <th><u>Income Before Tax:</u></th>
                            <th></th>
                            <th></th>
                            <th class="text-right">{{number_format(($grossProfit-$sumAmount),2)}}</th>
                          </tr>
                        </tbody>
                        
                      <tfoot>
                             
                            </tfoot>
                      </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        {{--<li><a href="#">«</a></li>--}}
                    </ul>
                </div>
            </div>
            <!-- /.box -->

        </div>
    </div>
    </div>
@endsection
@section('script')
    <script>
        $('#full_view').click(function(e){
           if(e.currentTarget.innerHTML == "Full View"){
               $('.panel-collapse').collapse('show');
               e.currentTarget.innerHTML = "Short View";
           }else{
               $('.panel-collapse').collapse('hide');
               e.currentTarget.innerHTML = "Full View";
           }
        });
    </script>
@endsection
@section('css')
    {{-- <style>
        .table tr td, .table tr th{
            border: none;
        }
        span.tab { margin-left: 40px; }
        td.underline{
            border-bottom: solid 2px;
        }
        table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
            border-top: 0px solid #ddd!important;
        }
        .date_column{
            text-align: right;
        }
        tr td {
            font-weight: bold;
        }
        .fw_normal {
            font-weight: normal;
        }
        .ledgerHeading {
            font-size: 17px!important;
            margin: -8px 0 23px 0;
            font-weight: bold;
        }
        .unitName {
            font-size: 21px;
            font-weight: bold;
        }
    </style> --}}
@stop
