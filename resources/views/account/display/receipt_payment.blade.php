@extends('layouts.fixed')
@section('title','Receipts & Payments Report')
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
                            <h3 class="card-title">Receipts & Payments Report</h3>
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
                                <td>Particulars</td>
                                <td></td>
                                <td width="50" class="text-right">
                                    <b>Amount</b>
                                </td>
                                <td width="50" class="text-right">
                                    <b>Amount</b>
                                </td>
                            </tr>
                            <tr>
                                <td><b>Opening Balance</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Bank-Accounts</span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Cash-in-hand</span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>654664854</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Bank-Loan</span></td>
                                <td><span></span></td>
                                <td class="text-right underline"><b>6768768</b></td>
                                <td><span></span></td>
                            </tr>
                        </table>
                        <table class="table table-sm">
                            <tr>
                                <td colspan="4">
                                    <p>Receipts:</p>
                                </td>
                            </tr>
                            {{--Loans--}}
                            <tr>
                                <td><b>Loans(Liability)</b></td>
                                <td width="50"><span></span></td>
                                <td width="50" class="text-right"><b>67467687</b></td>
                                <td width="50"><span></span></td>

                            </tr>
                            <tr>
                                <td><span class="tab">Secured Loans</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Director Loan</span></td>
                                <td class="text-right underline"><b>654664854</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Loans--}}
                            {{--Current liabilities--}}
                            <tr>
                                <td><b>Current Liabilities</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Sundry Creditors</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Liability For Expenses</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Current Liability--}}
                            {{--Current Assets--}}
                            <tr>
                                <td><b>Current Assets</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Advances, Deposits & Prepayments</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Current Assets--}}
                            {{--Branch / Divisions--}}
                            <tr>
                                <td><b>Branch / Divisions</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Intercompany & Associates</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Branch / Divisions--}}
                            {{--Income--}}
                            <tr>
                                <td><b>Income</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Export (CM)</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Other Income</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Income--}}
                            {{--Purchase Accounts--}}
                            <tr>
                                <td><b>Purchase Accounts</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Printing & Stationary Purchase</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Purchase Accounts--}}
                            {{--Direct Expenses--}}
                            <tr>
                                <td><b>Direct Expenses</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Food Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Salaries Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Transport Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Direct Expenses--}}
                            {{--Indirect Expenses--}}
                            <tr>
                                <td><b>Indirect Expenses</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Revenue Stamp Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Administrative Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Family Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Marketing Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span><b>NET RECEIPTS</b></span></td>
                                <td><span></span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>68768768</b></td>
                            </tr>
                            {{--Indirect Expenses--}}
                        </table>
                        <table class="table table-sm">
                            <tr>
                                <td colspan="4">
                                    <p>Well Fashion Limited (Unit-2)</p>
                                </td>
                            </tr>
                            {{--Branch / Divisions--}}
                            <tr>
                                <td><b>Branch / Divisions</b></td>
                                <td width="50"><span></span></td>
                                <td width="50" class="text-right"><b>67467687</b></td>
                                <td width="50"><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Intercompany & Associates</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Branch / Divisions--}}
                            {{--Income--}}
                            <tr>
                                <td><b>Income</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Export (CM)</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Income--}}
                            {{--Purchase Accounts--}}
                            <tr>
                                <td><b>Purchase Accounts</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Accessories Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Chemical Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Electrical Goods Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Machine Oil Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Maintanance Material Purchase </span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Needle Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Printing & Stationary Purchase</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Spare Parts Purchase</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Purchase Accounts--}}
                            {{--Direct Expenses--}}
                            <tr>
                                <td><b>Direct Expenses</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Entertainment Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Food Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Repair and Maintenance</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Salaries & Wages</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Transport Expenses</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            {{--Direct Expenses--}}
                            {{--Indirect Expenses--}}
                            <tr>
                                <td><b>Indirect Expenses</b></td>
                                <td><span></span></td>
                                <td class="text-right"><b>67467687</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Revenue Stamp Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Administrative Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Family Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Financial Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Marketing Expenses</span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Selling Expenses</span></td>
                                <td class="text-right underline"><b>68768768</b></td>
                                <td><span></span></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span><b>NET RECEIPTS</b></span></td>
                                <td><span></span></td>
                                <td ><span></span></td>
                                <td class="text-right"><b>68768768</b></td>
                            </tr>
                            {{--Indirect Expenses--}}
                        </table>

                        <table class="table table-sm">
                            <tr>
                                <td><b>Closing Balance</b></td>
                                <td><span></span></td>
                                <td width="50"><span></span></td>
                                <td width="50" class="text-right"><b>67467687</b></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Bank-Accounts</span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>68768768</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Cash-in-hand</span></td>
                                <td><span></span></td>
                                <td class="text-right"><b>654664854</b></td>
                                <td><span></span></td>
                            </tr>
                            <tr>
                                <td><span class="tab">Bank-Loan</span></td>
                                <td><span></span></td>
                                <td class="text-right underline"><b>6768768</b></td>
                                <td><span></span></td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection