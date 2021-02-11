<?php

namespace App\Http\Controllers\Account;

use App\Account\Principle\Principle;
use App\User;
use  App\Account\AccountLedger;
use  App\Account\AcJournal;
use Barryvdh\DomPDF\Facade as PDF;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CashPaymentVoucherController extends Controller
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
        $cashPayments=AcJournal::where($where)->whereHas('journalEntries',function($jr){
            $jr->where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',1);
        })->get();
        //dd($cashPayments);
        // $lastEntId = AcJournal::query()->exists();
        // if ($lastEntId){
        //     $lastEntId = AcJournal::query()->latest()->first()->id+1;
        // }else{
        //     $lastEntId = 0;
        // }

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
       
         $journal_no = 'CP-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where('group_id',settings('cash_group_id'))->pluck('name','id');
        $bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-payment.create',compact('repository','allLedgerHead','cashLedgerHead','bankLedgerHead','journal_no','cashPayments','date'));
    }
    public function lists()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashPayments=AcJournal::where($where)->whereHas('journalEntries',function($jr){
            $jr->where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',1);
        })->get();
        //dd($cashPayments);
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
       
         $journal_no = 'CP-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        // $allLedgerHead=AccountLedger::query()->pluck('name','id');
        // $cashLedgerHead=AccountLedger::where('group_id',settings('cash_group_id'))->pluck('name','id');
        // $bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        // //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-payment.lists',compact('repository','journal_no','cashPayments','date'));
    }

    public function createBank()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashPayments=AcJournal::where($where)
                    ->whereHas('journalEntries',function($jr){
                            $jr->where('type','=',1)->where('note','bank-payment');
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
      
        $journal_no = 'BP-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where([['unit_id',auth_unit()],['is_bank',1],['ledger',1]])->pluck('name','id');
        //$bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-payment.create',compact('date','repository','allLedgerHead','cashLedgerHead','journal_no','cashPayments'));
    }
    public function listsBank()
    {
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $cashPayments=AcJournal::where($where)
                    ->whereHas('journalEntries',function($jr){
                            $jr->where('type','=',1)->where('note','bank-payment');
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
      
        $journal_no = 'BP-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;

        $allLedgerHead=AccountLedger::query()->pluck('name','id');
        $cashLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //$bankLedgerHead=AccountLedger::where('group_id',settings('bank_group_id'))->pluck('name','id');
        //dd($bankLedgerHead);
        $repository = $this->repository;
        return view('account.voucher.cash-payment.lists',compact('repository','allLedgerHead','cashLedgerHead','journal_no','cashPayments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function generate_voucher_report($id){
        $transactions=AcJournal::with('journalEntries')->find($id);
        return view('account.voucher.cash-payment.payment-voucher-report',compact('transactions'));
    }

    public function generate_pdf(){
//        return view('account.voucher.cash-payment.payment-voucher-report');
        $principles = Principle::all();
        $users = User::all();

        $data =[
           // 'id' => $id,
            'principles' => $principles,
            'users' => $users
        ];

        $pdf = PDF::loadView('account.voucher.cash-payment.payment-voucher-report',$data); //load view page
        return $pdf->download('voucher-report.pdf'); // download pdf file

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
