<?php

namespace App\Http\Controllers\Account;

use App\Account\AcJournal;
use App\Account\AccountCompany;
use App\Account\JournalEntrie;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class JournalController extends Controller
{
    private $repository;
//    this is by Ahmed
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

        //dd(auth_unit());
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        //dd($where);
        

        $journalLists = AcJournal::where($where)->with('journalEntries')->latest()->paginate(10);
        if(request('start') && request('end')){
            $journalLists = AcJournal::where($where)->whereBetween('created_at',[ request('start') , request('end')])->with('journalEntries')->latest()->paginate(10);
        }
        return view('account.journal.lists',compact('journalLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd(Auth::user()->units);
        $repository = $this->repository;
        //dd($repository->unitLists());
        $companies = AccountCompany::query()->pluck('name','id');
        //it is sending as auto journal no to store by Ahmed
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
      
        $journal_no = 'JR-'.auth_unit().'-'.Auth::user()->id.'-'.$lastEntId;
        $journal = null;
        $journalEntries = null;
        //dd($journal_no);
        return view('account.journal.create',compact('repository','journal_no','journal','companies','date'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //journal store by Ahmed,
    // public function store(Request $request)
    // {
    //     //getting ac_journals next auto-increment number
    //     $query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'ac_journals'"));
    //     $nextAutoIncId= $query[0]->Auto_increment;

    //     $request->validate([
    //         'cr_ledger_id'=>'required',
    //         'dr_ledger_id'=>'required',
    //         'journal_no' => 'required',
    //         'dr_amount'  => 'required',
    //         'cr_amount'  => 'required',
    //     ]);

    //     $data = array();
    //     //auto increment journal no
    //     $data = $request->except('journal_no','dr_amount','cr_amount','dr_ledger_id','cr_ledger_id');
    //     $data['journal_no'] = 'JR-'.date('Y-s');
    //     AcJournal::query()->create($data);
    //     //================================start multiple journal entry============================================

    //     $dr_ledger_id = $request->get('dr_ledger_id');
    //     $dr_amount = $request->get('dr_amount');
    //     $dr = array_combine($dr_ledger_id,$dr_amount);

    //     foreach($dr as $id => $amount){
    //         $dr_entries['dr_ledger_id'] = $id;
    //         $dr_entries['dr_amount'] = $amount;
    //         $dr_entries['ac_journal_id'] = $nextAutoIncId;
    //         JournalEntrie::query()->create($dr_entries);
    //     }

    //     $cr_ledger_group_id = $request['cr_ledger_id'];
    //     $cr_amount = $request['cr_amount'];
    //     $cr = array_combine($cr_ledger_group_id,$cr_amount);

    //     foreach($cr as $id => $amount){
    //         $cr_entries['cr_ledger_id'] = $id;
    //         $cr_entries['cr_amount'] = $amount;
    //         $cr_entries['ac_journal_id'] = $nextAutoIncId;

    //         JournalEntrie::query()->create($cr_entries);
    //     }


    //     return redirect('ac/journal/lists');
    // }
    //journal store by MRRAHMAN,
    public function store(Request $request)
    {
       
        // //getting ac_journals next auto-increment number
        // $query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'ac_journals'"));
        //dd($request->all());
        // $nextAutoIncId= $query[0]->Auto_increment;

        $request->validate([
            'cr_ledger_id.*'=>'required',
            'dr_ledger_id.*'=>'required',
            'journal_no' => 'required',
            'dr_amount.*'  => 'required',
            'cr_amount.*'  => 'required',
        ]);
       
        $dr_ledger_id = $request->get('dr_ledger_id');
        $dr_amount = $request->get('dr_amount');
        $cr_ledger_id = $request['cr_ledger_id'];
        $cr_amount = $request->get('cr_amount');

        if(array_sum($dr_amount) != array_sum($cr_amount)){
            session()->flash('error',"Debit And Credit Amount Should be Same");
            return redirect()->back();
        }

        $data = array();
       
        $data = $request->except('journal_no','dr_amount','cr_amount','dr_ledger_id','cr_ledger_id','company_id');
        if($request->company_id){
            $data['company_id']=$request->company_id;
        }else{
            $data['company_id']=auth_unit();
        }
        //dd($data);
        $data['journal_no'] = $request->journal_no;
        $data['created_by'] =Auth::user()->id;
        $data['date'] = date('Y-m-d',strtotime($data['date']));
        $acJournal=AcJournal::query()->create($data);
        $nextAutoIncId=$acJournal->id;
        //================================start multiple journal entry============================================

      

        foreach($dr_ledger_id as $key=>$dr){
            $dr_entries['ledger_id'] = $dr;
            $dr_entries['type'] = 0;
            $dr_entries['amount'] = $dr_amount[$key];
            $dr_entries['note'] = $request->voucher_type;
            $dr_entries['ac_journal_id'] = $nextAutoIncId;
            JournalEntrie::query()->create($dr_entries);
        }

        foreach($cr_ledger_id as $key=>$cr){
            $cr_entries['ledger_id'] = $cr;
            $cr_entries['type'] = 1;
            $cr_entries['amount'] = $cr_amount[$key];
            $cr_entries['note'] = $request->voucher_type;
            $cr_entries['ac_journal_id'] = $nextAutoIncId;

            JournalEntrie::query()->create($cr_entries);
        }


        return redirect()->back()->with('success','Data Saved Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transactions=AcJournal::with('journalEntries')->find($id);
        return view('account.voucher.journal-voucher',compact('transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $repository = $this->repository;
        $journal = AcJournal::find($id);
        $companies = AccountCompany::query()->pluck('name','id');

        //$JournalEntries =   JournalEntrie::query()->where('ac_journal_id',$id)->get();
        return view('account.journal.edit',compact('journal','repository','companies'));

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
        $request->validate([
            'date'       => 'required',
            'cr_ledger_id'=>'required',
            'dr_ledger_id'=>'required',
//          'journal_no' => 'required',
            'dr_amount'  => 'required',
            'cr_amount'  => 'required',
        ]);
        $dr_ledger_id = $request->dr_ledger_id;
        $dr_amount = $request->dr_amount;
        //$dr = array_combine($dr_ledger_id,$dr_amount);
        
        $cr_ledger_id = $request->cr_ledger_id;
        $cr_amount = $request->cr_amount;
        $request['date'] =  date('Y-m-d',strtotime($request['date']));

        if(array_sum($dr_amount) != array_sum($cr_amount)){
            session()->flash('error',"Debit And Credit Amount Should be Same");
            return redirect()->back();
        }
    
        $data = array();
        //auto increment journal no
        $journal_data = $request->except('dr_amount','cr_amount','dr_ledger_id','cr_ledger_id','company_id');
        if($request->company_id){
            $data['company_id']=$request->company_id;
        }else{
            $data['company_id']=auth_unit();
        }
        AcJournal::query()->find($id)->update($journal_data);

        //================================start multiple journal entry============================================
      

        JournalEntrie::query()->where('ac_journal_id',$id)->delete();


        foreach($dr_ledger_id as $key => $dru){
            $dr_entries['ledger_id'] = $dru;
            $dr_entries['type'] = 0;
            $dr_entries['amount'] = $dr_amount[$key];
            $dr_entries['ac_journal_id'] = $id;
            JournalEntrie::query()->create($dr_entries);
        }

     

        foreach($cr_ledger_id as $key => $cru){
            $cr_entries['ledger_id'] = $cru;
            $cr_entries['type'] = 1;
            $cr_entries['amount'] = $cr_amount[$key];
            $cr_entries['ac_journal_id'] = $id;
            JournalEntrie::query()->create($cr_entries);
        }

        session()->flash('success',"Journal update successfully Complete");
        return redirect('accounts/journal/lists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $ac_journal_id = JournalEntrie::query()->where('ac_journal_id',$id);
        $ac_journal_id->delete();
        AcJournal::find($id)->delete();
        return redirect('ac/journal/lists');
    }

}


