@extends('layouts.fixed')
@section('title','Balance Sheet')
@section('css')
    <style>
        .table tr td, .table tr th{
            border: none;
        }
        span.tab { margin-left: 40px; }
        td.underline{
            border-bottom: solid 2px;
        }

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
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0 text-dark">Balance Sheet</h3>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Settings</a></li>
                        {{--<li class="breadcrumb-item active">City</li>--}}
                        <li class="breadcrumb-item active">Balance Sheet</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="col-md-12">
            <div class="card-body">
                <div class=" bg-light">
                        {{--   bg-dark--}}
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Balance Sheet Report</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div> <!-- /.card-header -->

                            <div class="card-body" style="display: block;">
                                <div class="box-header with-border text-center" style="margin-bottom: -25px!important;">
                                    <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                                    <p>{{ str_before(app_info()->address,"|") }}</p>
                                    <small>{{ str_after(app_info()->address,"|") }}</small>
                                    <h3>Balance Sheet</h3>
                                    <p>1-OCT-2018 to 30-Sep-2019</p>
                                </div>
                                <table class
                                       ="table table-striped table-sm table-hover" id="" style="width:100%">
                                    <thead>
                                        <tr>
                                            <td colspan="3">
                                                <p>Source of Funds:</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <p>Capital Account:</p>
                                            </td>
                                        </tr>
                                        <tr style="border-bottom: black 1px solid">
                                            <td>Particular</td>
                                            <td width="50" class="text-right"><b>Amoun</b></td>
                                            <td width="50" class="text-right"><b>Amount</b></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {{--Loans Starts--}}
                                    <tr>
                                        <td><b>Loans (Liabilities)</b></td>
                                        <td><span></span></td>
                                        <td class="text-right"><b>67467687</b></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Bank Loans</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Secured Loans</span></td>
                                        <td class="text-right"><b>654664854</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Director Loan</span></td>
                                        <td class="text-right"><b>654664854</b></td>
                                        <td><span></span></td>
                                    </tr>

                                    <tr>
                                        <td><span class="tab">Loan From Others</span></td>
                                        <td class="text-right underline"><b>654664854</b></td>
                                        <td class="underline"><span></span></td>
                                    </tr>
                                    {{--Loans ends--}}
                                    {{--Current liabilities Starts--}}
                                    <tr>
                                        <td><b>Current Liabilities</b></td>
                                        <td><span></span></td>
                                        <td class="text-right"><b>67467687</b></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Sundry Creditors</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Liabilities for Expenses</span></td>
                                        <td class="text-right underline"><b>654664854</b></td>
                                        <td class="underline"><span></span></td>
                                    </tr>
                                    {{--Current liabilities ends--}}
                                    {{--Branch / Division Starts--}}
                                    <tr>
                                        <td>

                                            <b>Branch / Divisions</b>
                                        </td>
                                        <td><span></span></td>
                                        <td class="text-right"><b>67467687</b></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Intercompany & Associates</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    {{--Branch / Division ends--}}
                                    {{--Profit and loss a/c Starts--}}
                                    <tr>
                                        <td><b>Profit & loss A/C</b></td>
                                        <td><span></span></td>
                                        <td class="text-right"><b>67467687</b></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Opening Balance</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Current Period</span></td>
                                        <td class="text-right underline"><b>68768768</b></td>
                                        <td class="underline"><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span><b>Total :</b></span></td>
                                        <td><span></span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                    </tr>
                                    {{--Profit and loss a/c ends--}}
                                    <tr>
                                        <td>
                                            <p>Application of Funds:</p>
                                        </td>
                                        <td width="50"></td>
                                        <td width="50"></td>
                                    </tr>
                                    {{--Assets--}}
                                    <tr>
                                        <td><b>Fixed Assets</b></td>
                                        <td class="text-right"><b>67467687</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Fixed Asset at Cost</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    {{--Assets--}}
                                    {{--Current Assets--}}
                                    <tr>
                                        <td><b>Current Assets</b></td>
                                        <td class="text-right"><b>67467687</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Deposits (Asset)</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Cash-in-hand</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Bank Accounts</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Advances, Deposits & Prepayments</td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class="tab">Loan to Others</span></td>
                                        <td class="text-right"><b>68768768</b></td>
                                        <td><span></span></td>
                                    </tr>
                                    {{--Current Assets--}}

                                    {{--Diff. in Opening Balance--}}
                                    <tr>
                                        <td>Diff. in Opening Balance</td>
                                        <td class="text-right underline"><b>67467687</b></td>
                                        <td class="underline"><span></span></td>
                                    </tr>
                                    {{--Diff. in Opening Balance--}}
                                    <tr style="border-top:1px solid">
                                        <td><span><b>Total:</b></span></td>
                                        <td class="underline"><span></span></td>
                                        <td class="text-right underline"><b>68768768</b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    {{--<div class="box">--}}
                        {{--<div class="box-header with-border text-center">--}}
                            {{-- <h3>{{ unit_name() ?? app_info()->company_name }}</h3>
                                    <p>{{ str_before(app_info()->address,"|") }}</p>
                                    <small>{{ str_after(app_info()->address,"|") }}</small>--}}
                            {{--<h3>Balance Sheet</h3>--}}
                            {{--<p>1-OCT-2018 to 30-Sep-2019</p>--}}
                        {{--</div>--}}
                        {{--<p class="text-right">page-2</p>--}}
                        {{--<!-- /.box-header -->--}}
                        {{--<div class="box-body">--}}
                            {{--<table class="table table-sm">--}}
                                {{--<tr>--}}
                                    {{--<td colspan="3">--}}
                                        {{--<p>Source of Funds:</p>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td colspan="3">--}}
                                        {{--<p>Capital Account:</p>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Particular</td>--}}
                                    {{--<td width="50" class="text-right"><b>Amoun</t</td>--}}
                                    {{--<td width="50" class="text-right"><b>Amount</b></td>--}}
                                {{--</tr>--}}
                                {{--Loans Starts--}}
                                {{--<tr>--}}
                                    {{--<td><b>Loans (Liabilities)</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Bank Loans</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Secured Loans</span></td>--}}
                                    {{--<td class="text-right"><b>654664854</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Director Loan</span></td>--}}
                                    {{--<td class="text-right"><b>654664854</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}

                                {{--<tr>--}}
                                    {{--<td><span class="tab">Loan From Others</span></td>--}}
                                    {{--<td class="text-right underline"><b>654664854</b></td>--}}
                                    {{--<td class="underline"><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Loans ends--}}
                                {{--Current liabilities Starts--}}
                                {{--<tr>--}}
                                    {{--<td><b>Current Liabilities</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Sundry Creditors</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Liabilities for Expenses</span></td>--}}
                                    {{--<td class="text-right underline"><b>654664854</b></td>--}}
                                    {{--<td class="underline"><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Current liabilities ends--}}
                                {{--Current liabilities Starts--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<b>Branch / Divisions</b>--}}
                                    {{--</td>--}}
                                    {{--<td><span></span></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Intercompany & Associates</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Current liabilities ends--}}
                                {{--Profit and loss a/c Starts--}}
                                {{--<tr>--}}
                                    {{--<td><b>Profit & loss A/C</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Opening Balance</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Current Period</span></td>--}}
                                    {{--<td class="text-right underline"><b>68768768</b></td>--}}
                                    {{--<td class="underline"><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span><b>Total :</b></span></td>--}}
                                    {{--<td><span></span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                {{--</tr>--}}
                                {{--Profit and loss a/c ends--}}
                            {{--</table>--}}
                            {{--<table class="table table-sm">--}}
                                {{--<tr>--}}
                                    {{--<td>--}}
                                        {{--<p>Application of Funds:</p>--}}
                                    {{--</td>--}}
                                    {{--<td width="50"></td>--}}
                                    {{--<td width="50"></td>--}}
                                {{--</tr>--}}
                                {{--Assets--}}
                                {{--<tr>--}}
                                    {{--<td><b>Fixed Assets</b></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Fixed Asset at Cost</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Assets--}}
                                {{--Current Assets--}}
                                {{--<tr>--}}
                                    {{--<td><b>Current Assets</b></td>--}}
                                    {{--<td class="text-right"><b>67467687</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Deposits (Asset)</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Cash-in-hand</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Bank Accounts</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Advances, Deposits & Prepayments</td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td><span class="tab">Loan to Others</span></td>--}}
                                    {{--<td class="text-right"><b>68768768</b></td>--}}
                                    {{--<td><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Current Assets--}}

                                {{--Diff. in Opening Balance--}}
                                {{--<tr>--}}
                                    {{--<td>Diff. in Opening Balance</td>--}}
                                    {{--<td class="text-right underline"><b>67467687</b></td>--}}
                                    {{--<td class="underline"><span></span></td>--}}
                                {{--</tr>--}}
                                {{--Diff. in Opening Balance--}}
                                {{--<tr>--}}
                                    {{--<td><span><b>Total:</b></span></td>--}}
                                    {{--<td class="underline"><span></span></td>--}}
                                    {{--<td class="text-right underline"><b>68768768</b></td>--}}
                                {{--</tr>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<!-- /.box-body -->--}}
                        {{--<div class="box-footer clearfix">--}}
                            {{--<ul class="pagination pagination-sm no-margin pull-right">--}}
                                {{--<li><a href="#">«</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<!-- /.box -->--}}

            </div>
        </div>
        </div>
    </section>
@endsection