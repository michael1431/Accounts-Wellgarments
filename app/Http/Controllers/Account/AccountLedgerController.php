<?php

namespace App\Http\Controllers\Account;

use App\Account\JournalEntrie;
use App\Account\LedgerGroup;
use App\Repositories\AccountsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Account\AccountLedger;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use DB;

class AccountLedgerController extends Controller
{
    /**
     * @var AccountsRepository
     */
    private $repository;

    public function __construct(AccountsRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $groups = AccountLedger::where('ledger',0)->get();
        $ledgers = AccountLedger::where('group_id','!=',null)->get();     
        
        return view('account.ledger.create',compact('groups','ledgers'));
    }

    // function str_putcsv($data) {
    //     # Generate CSV data from array
    //     $fh = fopen('php://temp', 'rw'); # don't create a file, attempt
    //                                      # to use memory instead

    //     # write out the headers
    //     fputcsv($fh, array_keys(current($data)));

    //     # write out the data
    //     foreach ($data as $row) {
    //             fputcsv($fh, $row);
    //     }
    //     rewind($fh);
    //     $csv = stream_get_contents($fh);
    //     fclose($fh);

    //     return $csv;
    // }

    public function store(Request $request){
        $this->validate($request,[
            'group_id'=>'required',
            'name'=>'required|unique:account_ledgers'
        ]);
        $data=$request->all();
        if($request->is_bank==1){
            $data['unit_id']=auth_unit();
            $data['is_bank']=1;
        }
        $parent=AccountLedger::find($request->group_id);
        //dd($parent);
        $data['type']=$parent->type??$request->group_id;
        //dd($data);
        AccountLedger::query()->create($data);
        session()->flash('success','Account Ledger Create successfully complete');
        return redirect()->route('ledger.add');
    }

    public function edit($id){
        $groups = AccountLedger::where('ledger',0)->get();
        $ledgers = AccountLedger::where('group_id','!=',null)->get();
        $ledger = AccountLedger::query()->findOrFail($id);
        return view('account.ledger.edit',compact('groups','ledgers','ledger'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'group_id'=>'required',
            'name'=>'required|unique:account_ledgers,name,'.$id,
        ]);
        $data=$request->all();
        if($request->is_bank==1){
            $data['unit_id']=auth_unit();
            $data['is_bank']=1;
        }

        AccountLedger::query()->findOrFail($id)->update($data);
        session()->flash('success','Account Ledger update successfully complete');
        return redirect()->route('ledger.add');
    }

    public function destroy(Request $request){
        AccountLedger::query()->findOrFail($request->id)->delete();
    }

    public function ledger_reports(JournalEntrie $entry)
    {

        $journal_entries = $entry->newQuery();
        $j =null;
        $ledger_name = null;
        $journals=null;
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
    
        if (Input::has('ledger_name') && Input::get('ledger_name') != null) {
            $ledger_name = Input::get('ledger_name');
            $journal_entries->where('ledger_id',$ledger_name);
       


        if ((Input::has('start') && Input::get('start') != null) AND (Input::has('end') && Input::get('end') != null)) {
            $journal_entries->whereHas('journal',function($query)use($where){
                $query->where($where)->whereBetween('date',[Input::get('start'),Input::get('end')]);
            });
        }

        $journals = $journal_entries->orderBy('id','ASC')->get()
        ->groupBy('ac_journal_id');
       
        }//if end of query
        $repository = $this->repository;
        //dd($journals);
    return view('account.display.ledger',compact('j','journals','repository','ledger_name'));
}
//     public function ledger_reports(JournalEntrie $entry){

//             $je = $entry->newQuery();
//             $j =null;
//             $ledger_name = null;

//             // if (Input::has('ledger_name') && Input::get('ledger_name') != null) {
//             //     $ledger_name = Input::get('ledger_name');
//             //     $je->where('dr_ledger_id',$ledger_name)->orWhere('cr_ledger_id',$ledger_name);
//             // }
//             if (Input::has('ledger_name') && Input::get('ledger_name') != null) {
//                 $ledger_name = Input::get('ledger_name');
//                 $je->where('ledger_id',$ledger_name);
//             }


//             if ((Input::has('start') && Input::get('start') != null) AND (Input::has('end') && Input::get('end') != null)) {
//                 $je->whereHas('journal',function($query){
//                     $query->whereBetween('date',[Input::get('start'),Input::get('end')]);
//                 });
//             }

//             $journals = $je->orderBy('id','DESC')->pluck('ac_journal_id');
// //
//             $j = JournalEntrie::query()
//                 ->whereIn('ac_journal_id',$journals)
//                 ->where(function($query)use($ledger_name){
//                     $query->where('ledger_id','<>',$ledger_name);
//                 })
//                 ->get()
//                 ->groupBy('ac_journal_id');
//             // $j = JournalEntrie::query()
//             //     ->whereIn('ac_journal_id',$journals)
//             //     ->where(function($query)use($ledger_name){
//             //         $query->where('cr_ledger_id','<>',$ledger_name)
//             //             ->orWhere('dr_ledger_id','<>',$ledger_name);
//             //     })
//             //     ->get()
//             //     ->groupBy('ac_journal_id');

//             $rowsFound = $je->count();
//             $repository = $this->repository;
//             dd($journals);

//         return view('account.display.ledger',compact('j','journals','rowsFound','repository','ledger_name'));
//     }

}
