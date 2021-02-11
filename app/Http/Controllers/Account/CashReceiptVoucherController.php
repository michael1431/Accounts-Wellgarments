<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AccountsRepository;
use App\Account\Principle\Principle;
use App\User;
use Auth;
use  App\Account\AccountLedger;
use  App\Account\AcJournal;
use Barryvdh\DomPDF\Facade as PDF;


class CashReceiptVoucherController extends Controller
{
    private $repository;
    //    this is by MR
        function __construct(AccountsRepository $repository)
        {
            $this->repository = $repository;
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashReceipts=AcJournal::where($where)->whereHas('journalEntries',function($jr){
            $jr->where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',0);
        })->get();
         $lastTransactionOb=AcJournal::where([['created_by',Auth::user()->id],['company_id',auth_unit()]])->latest()->first();
       // dd($lastTransaction);
        if($lastTransactionOb){
            $lastTransaction=$lastTransactionOb->toArray();
            $date=date('d-m-Y',strtotime($lastTransaction['date']));
            $lastEntId=$lastTransaction['id']+1;
        }else{
            $date=date('d-m-Y');
            $lastEntId=1;
        }
      
        $journal_no = 'CR-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where('group_id',settings('cash_group_id'))->pluck('name','id');
        $bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-receipt.create',compact('date','repository','allLedgerHead','cashLedgerHead','bankLedgerHead','journal_no','cashReceipts'));
        //return view('account.voucher.cash-receipt.create');
    }
    public function lists()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashReceipts=AcJournal::where($where)->whereHas('journalEntries',function($jr){
            $jr->where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',0);
        })->get();
        $lastTransactionOb=AcJournal::where([['created_by',Auth::user()->id],['company_id',auth_unit()]])->latest()->first();
        // dd($lastTransaction);
         if($lastTransactionOb){
             $lastTransaction=$lastTransactionOb->toArray();
             $date=date('Y-m-d',strtotime($lastTransaction['date']));
             $lastEntId=$lastTransaction['id']+1;
         }else{
             $date=date('Y-m-d');
             $lastEntId=1;
         }
       
         $journal_no = 'CR-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $repository = $this->repository;
        return view('account.voucher.cash-receipt.lists',compact('date','repository','journal_no','cashReceipts'));
        //return view('account.voucher.cash-receipt.create');
    }
    public function createBank()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashReceipts=AcJournal::where($where)
                        ->whereHas('journalEntries',function($jr){
                                $jr->where('type','=',0)->where('note','bank-receipt');
                        })
                        ->get();
         $lastTransactionOb=AcJournal::where([['created_by',Auth::user()->id],['company_id',auth_unit()]])->latest()->first();
       // dd($lastTransaction);
        if($lastTransactionOb){
            $lastTransaction=$lastTransactionOb->toArray();
            $date=date('d-m-Y',strtotime($lastTransaction['date']));
            $lastEntId=$lastTransaction['id']+1;
        }else{
            $date=date('d-m-Y');
            $lastEntId=1;
        }
      
        $journal_no = 'BR-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;
        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where([['is_bank',1],['unit_id',auth_unit()]])->pluck('name','id');
        //$bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-receipt.create',compact('date','repository','allLedgerHead','cashLedgerHead','journal_no','cashReceipts'));
        //return view('account.voucher.cash-receipt.create');
    }
    public function listsBank()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashReceipts=AcJournal::where($where)
                        ->whereHas('journalEntries',function($jr){
                                $jr->where('type','=',0)->where('note','bank-receipt');
                        })
                        ->get();
        $lastTransactionOb=AcJournal::where([['created_by',Auth::user()->id],['company_id',auth_unit()]])->latest()->first();
       // dd($lastTransaction);
        if($lastTransactionOb){
            $lastTransaction=$lastTransactionOb->toArray();
            $date=date('Y-m-d',strtotime($lastTransaction['date']));
            $lastEntId=$lastTransaction['id']+1;
        }else{
            $date=date('Y-m-d');
            $lastEntId=1;
        }
      
        $journal_no = 'BR-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //$bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-receipt.lists',compact('date','repository','allLedgerHead','cashLedgerHead','journal_no','cashReceipts'));
        //return view('account.voucher.cash-receipt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function generate_voucher_report($id){
        $transactions=AcJournal::with('journalEntries')->find($id);
        return view('account.voucher.cash-receipt.receipt-voucher-report',compact('transactions'));
        //return view('account.voucher.cash-receipt.receipt-voucher-report');
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
