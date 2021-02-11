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
                {{-- <p style="cursor:pointer" class="text-right no-print" id="full_view"  >Full View</p> --}}
                <!-- /.box-header -->
                <div class="card-body">
                    <table class="table table-sm table-bordered head_table">
                        <tr>
                            <td rowspan="2" class="text-center"><b>Particular</b></td>
                            @if(request('openning'))
                            <td rowspan="2" class="text-right">Openning Balance</td>
                            @endif
                            <td colspan="2" class="text-center">Closing Balance</td>
                        </tr>
                        <tr>
                            <td  class="text-center amount_column"><b>Debit</b></td>
                            <td  class="text-center amount_column"><b>Credit</b></td>
                        </tr>
                    </table>
                    <table class="table table-sm">
                        {{--Loans Starts--}}
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
                                    {{-- <tr>
                                        <td><span class="tab">Secured Loans</span></td>
                                        <td class="text-right">3,19,795.96</td>
                                        <td class="text-right">7,20,47,302.78</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Director Loan</span></td>
                                        <td class="text-right">12,03,808.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Loan From Others</span></td>
                                        <td class="underline"><span></span></td>
                                        <td class="text-right underline">50,000.00</td>
                                    </tr> --}}
                                </table>
                            </td>
                        </tr>
                        @empty
                        @endforelse
                        {{--Loans ends--}}

                        {{-- Current liabilities Starts
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#current_liabilities" aria-expanded="false" class="collapsed">
                                    <b>Current Liabilities</b>
                                </a>
                            </td>
                            <td class="text-right"><b>29,02,47,005.00</b></td>
                            <td class="text-right"><b>5,65,27,089.70</b></td>
                        </tr>
                        <tr  id="current_liabilities" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Sundry Creditors</span></td>
                                        <td class="text-right amount_column">29,02,39,540.00</td>
                                        <td class="text-right amount_column">5,65,27,089.70</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Liabilities for Expenses</span></td>
                                        <td class="text-right underline">7,465.00</td>
                                        <td class="underline text-right">20,13,699.00</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                      

                      
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#fixed_asset" aria-expanded="false" class="collapsed">
                                    <b>Fixed Assets</b>
                                </a>
                            </td>
                            <td class="text-right"><b>34,71,47,442.70</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr  id="fixed_asset" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Fixed Asset at Cost</span></td>
                                        <td  class="text-right amount_column underline">34,71,47,442.70</td>
                                        <td class="amount_column underline"><span></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                      
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#current_asset1" aria-expanded="false" class="collapsed">
                                    <b>Current Assets</b>
                                </a>
                            </td>
                            <td class="text-right"><b>22,92,392.39</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr  id="current_asset1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Opening Stock</span></td>
                                        <td class="text-right amount_column">0000</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Deposits (Asset)</span></td>
                                        <td class="text-right amount_column">11,43,634.96</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Cash-in-hand</span></td>
                                        <td class="text-right">2,28,559.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Bank Accounts</span></td>
                                        <td class="text-right">2,10,873.43</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Advances, Deposits & Prepayments</td>
                                        <td class="text-right">3,53,115.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Loan to Others</span></td>
                                        <td class="text-right underline">3,56,210.00</td>
                                        <td class="text-right underline"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#branch_division" aria-expanded="false" class="collapsed">
                                    <b>Branch / Divisions</b>
                                </a>
                            <td class="text-right"><b>78,84,58,148.63</b></td>
                            <td class="text-right"><b>29,55,09,180.89</b></td>
                        </tr>
                        <tr  id="branch_division" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Intercompany & Associates</span></td>
                                        <td class="text-right amount_column underline">78,84,58,148.63</td>
                                        <td class="text-right amount_column underline">29,55,09,180.89</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                      
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#income1" aria-expanded="false" class="collapsed">
                                    <b>Income</b>
                                </a>
                            </td>

                            <td><span></span></td>
                            <td class="text-right"><b>23,78,41,993.31</b></td>
                        </tr>
                        <tr  id="income1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Other Income</span></td>
                                        <td  class="amount_column"></td>
                                        <td class="text-right amount_column">35,24,580.00</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Export (CM)</span></td>
                                        <td class="underline"><span></span></td>
                                        <td class="text-right underline">23,43,17,413.31</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                   
                    <div class="page_break"></div>
                   
                    <table class="table table-sm">
                        <tr>
                            <td>

                                <a data-toggle="collapse" data-parent="#accordion" href="#purchase_accounts1" aria-expanded="false" class="collapsed">
                                    <b>Purchase Accounts</b>
                                </a>
                            </td>
                            <td class="text-right"><b>6,69,42,231.70</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr  id="purchase_accounts1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Accessories Accounts</span></td>
                                        <td class="text-right amount_column">52,03,903.00</td>
                                        <td  class="amount_column"></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Accessories Purchase-Intercompany</span></td>
                                        <td class="text-right">66,42,462.00</td>
                                        <td class=""><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Chemical Purchase</span></td>
                                        <td class="text-right">43,520.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Electrical Goods Purchase</span></td>
                                        <td class="text-right ">7,40,216.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Fabrics Purchase Intercompany</span></td>
                                        <td class="text-right ">31,90,808.70</td>
                                        <td class=""><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Machine Oil Purchase</span></td>
                                        <td class="text-right ">3,35,820.00</td>
                                        <td class=""><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Maintenance Materials Purchase</span></td>
                                        <td class="text-right ">5,59,056.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Needle Purchase</span></td>
                                        <td class="text-right ">10,94,593.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Printing and Stationary Purchase</span></td>
                                        <td class="text-right ">25,44,561.00</td>
                                        <td class=""><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Spare Parts Purchase</span></td>
                                        <td class="text-right ">52,32,053.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Sticker Purchase</span></td>
                                        <td class="text-right ">10,40,257.00</td>
                                        <td class=""><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Thread Purchase-Intercompany</span></td>
                                        <td class="text-right underline">4,03,14,982.00</td>
                                        <td class="text-right underline "><span></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#profit_loss" aria-expanded="false" class="collapsed">
                                    <b>Direct Income</b>
                                </a>
                            </td>

                            <td><span></span></td>
                            <td class="text-right"><b>2,04,45,232.00</b></td>
                        </tr>
                        <tr  id="profit_loss" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Export B2B L/C</span></td>
                                        <td class="amount_column underline"></td>
                                        <td class="text-right underline amount_column">2,04,45,232.00</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                      
                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#direct_expense1" aria-expanded="false" class="collapsed">
                                    <b>Direct Expenses</b>
                                </a>
                            </td>

                            <td><span></span></td>
                            <td class="text-right"><b>22,50,21,166.60</b></td>
                        </tr>
                        <tr  id="direct_expense1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Entertainment Expenses</span></td>
                                        <td class="text-right amount_column">14,89,368.00</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Food Expenses</span></td>
                                        <td class="text-right amount_column">14,05,232.00</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Other Factory Expenses</span></td>
                                        <td class="text-right amount_column">1,31,45,369.60</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Repair and Maintenance</span></td>
                                        <td class="text-right amount_column">19,32,366.00</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Salaries & Wages</span></td>
                                        <td class="text-right amount_column">16,14,27,991.00</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Sub-contact Expenses</span></td>
                                        <td class="text-right amount_column">3,90,29,740.00</td>
                                        <td class="amount_column"><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Transport Expenses</span></td>
                                        <td class="text-right amount_column underline">65,91,100.00</td>
                                        <td class="amount_column underline"><span></span></td>
                                    </tr>

                                </table>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <a data-toggle="collapse" data-parent="#accordion" href="#indirect_expenses1" aria-expanded="false" class="collapsed">
                                    <b>Indirect Expenses</b>
                                </a>
                            </td>
                            <td class="text-right amount_column"><b>5,63,62,206.21</b></td>
                            <td class="text-right amount_column"><b>164,090.00</b></td>
                        </tr>
                        <tr  id="indirect_expenses1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <td colspan="3">
                                <table class="table table-sm">
                                    <tr>
                                        <td><span class="tab">Administrative Expenses</span></td>
                                        <td class="text-right amount_column">1,06,44,326.00</td>
                                        <td class="text-right amount_column">1,64,090.00</td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Family Expenses</span></td>
                                        <td class="text-right">37,44,524.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Financial Expenses</span></td>
                                        <td class="text-right">2,45,27,199.21</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Marketing Expenses</span></td>
                                        <td class="text-right">85,12,170.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Selling Expenses</span></td>
                                        <td class="text-right">88,12,681.00</td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Revenue Stamp Expenses</span></td>
                                        <td class="text-right underline">1,21,306.00</td>
                                        <td class="text-right underline"><span></span></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                       
                        <tr>
                            <td>Diff. in Opening Balance</td>
                            <td class="underline"><span></span></td>
                            <td class="text-right underline"><b>1,00,75,21,561.38</b></td>
                        </tr> --}}
                        {{--Diff. in Opening Balance--}}
                        <tr>
                            <td class="text-center"><span><b>Grand Total:</b></span></td>
                            @if(request('openning'))
                                <td></td>
                            @endif
                            <td class="text-right underline"><b>{{ number_format($debitTotal,2) }}</b></td>
                            <td class="text-right underline"><b>{{ number_format($creditTotal,2) }}</b></td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
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
