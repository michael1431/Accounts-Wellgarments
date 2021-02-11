@extends('layouts.fixed')
@section('title','Day Book')
    @section('css')
    <style>
        .table tr td, .table tr th{
            border: none;
        }
        span.tab { margin-left: 40px; }
        span.tab-2 { margin-left: 80px; }
        td.underline{
            border-bottom: solid 2px;
        }
    </style>
    @endsection
@section('content')
<section class="content">
    <div class="col-md-12">
        <div class="card-body">
            <div class=" bg-light">
                    {{--   bg-dark--}}
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Income Statement</h3>
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
                                <h3>Receipts & Payments</h3>
                                <p>{{ date('d-F-Y') }}</p>
                            </div>
                    <table class="table table-sm">
                        <tr>
                            <td colspan="3"> <p>Trading Account:</p></td>
                        </tr>
                        <tr>
                            <td>Particulars</td>
                            <td width="50"><b>Amount</b></td>
                            <td width="50"><b>Amount</b></td>
                        </tr>
                        {{--Income Starts--}}
                        <tr>
                            <td><b>Income</b></td>
                            <td><span></span></td>
                            <td class="text-right"><b>67467687</b></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Other Income</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td ><span class="tab">Export(CM)</span></td>
                            <td class="text-right underline"><b>654664854</b></td>
                            <td><span></span></td>
                        </tr>
                        {{--Income ends--}}
                        {{--Direct Incomes Starts--}}
                        <tr>
                            <td><b>Direct Incomes</b></td>
                            <td><span></span></td>
                            <td class="text-right"><b>67467687</b></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Export B2B L/C</span></td>
                            <td class="text-right underline"><b>68768768</b></td>
                            <td class="underline"><span></span></td>
                        </tr>
                        {{--Direct Income ends--}}
                        {{--Total Income --}}
                            <tr>
                                <td></td>
                                <td></td>
                                <td>686846</td>
                            </tr>
                        {{--Total Income--}}
                        {{--Cost of Goods  Starts--}}
                        <tr><td colspan="3">Cost Of Sales:</td></tr>
                        <tr>
                            <td><b>Opening Stock</b></td>
                            <td><span></span></td>
                            <td class="text-right"><b>67467687</b></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Add: Purchase Accounts</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Less: Closing Stock</span></td>
                            <td class="text-right last"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        {{--Cost of Goods ends--}}
                        {{--Direct Expenses starts--}}
                        <tr>
                            <td><b><span  class="tab">Direct Expenses</span></b></td>
                            <td><span></span></td>
                            <td class="text-right"><b>67467687</b></td>
                        </tr>
                        <tr>
                            <td><span class="tab-2">Entertainment Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab-2">Food Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab-2">Repair and Maintenance</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab-2">Salaries & Wages</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab-2">Transport Expenses</span></td>
                            <td class="text-right underline"><b>68768768</b></td>
                            <td class="underline"><span></span></td>
                        </tr>
                        {{--Direct Expenses ends--}}
                        {{--Gross Profit starts--}}
                        <tr>
                            <td><span><b>Gross Profit</b></span></td>
                            <td><span></span></td>
                            <td class="text-right"><b>68768768</b></td>
                        </tr>
                        {{--Gross Profit ends--}}


                    </table>

                    <table class="table table-sm ">
                        <tr><td colspan="3"><p>Income Statement:</p></td></tr>
                        {{--Indirect Expenses--}}
                        <tr>
                            <td><b>Indirect Expenses</b></td>
                            <td width="50"><span></span></td>
                            <td width="50" class="text-right"><b>67467687</b></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Revenue Stamp Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Administrative Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Family Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Marketing Expenses</span></td>
                            <td class="text-right"><b>68768768</b></td>
                            <td><span></span></td>
                        </tr>
                        <tr>
                            <td><span class="tab">Selling Expenses</span></td>
                            <td class="text-right underline"><b>68768768</b></td>
                            <td class="underline"><span></span></td>
                        </tr>
                        <tr>
                            <td><b>NET Profit :</b></td>
                            <td class="underline"><span></span></td>
                            <td class="text-right underline"><b>68768768</b></td>
                        </tr>
                        {{--Indirect Expenses--}}
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
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