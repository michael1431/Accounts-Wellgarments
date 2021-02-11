<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Account\LedgerGroup;
use App\User;
use App\Account\JournalEntrie;
use App\Account\AccountLedger;
use App\Account\AcJournal;
use App\Account\Principle\Principle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Session;
use Auth;

class DisplayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /***
     ** Display Book method
     **
     **
     */
    function daybook(){
        //dd(auth_unit());
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $transactions=AcJournal::where($where)->where('date',date('Y-m-d'))->get();
        return view('account.display.daybook',compact('transactions'));
    }

    function primarySettings(){
        $groups = AccountLedger::where('ledger',0)->get();
        $ledgers = AccountLedger::where('ledger',1)->get();
      
        return view('account.settings.create',compact('groups','ledgers'));
    }
    function primarySettingsStore(Request $request){
        //dd($request->all());
        $cash_group_id = DB::table('settings')->where('field_key','=','cash_group_id')->update(['value' => $request->cash_group_id]);
        $bank_group_id = DB::table('settings')->where('field_key','=','bank_group_id')->update(['value' => $request->bank_group_id]);
        $cash_ledger_id = DB::table('settings')->where('field_key','=','cash_ledger_id')->update(['value' => $request->cash_ledger_id]);
        $sales = DB::table('settings')->where('field_key','=','sales')->update(['value' => $request->sales]);
        $sales_return = DB::table('settings')->where('field_key','=','sales_return')->update(['value' => $request->sales_return]);
        $sales_discount = DB::table('settings')->where('field_key','=','sales_discount')->update(['value' => $request->sales_discount]);
        $purchase = DB::table('settings')->where('field_key','=','purchase')->update(['value' => $request->purchase]);
        $purchase_return = DB::table('settings')->where('field_key','=','purchase_return')->update(['value' => $request->purchase_return]);
        $purchase_discount = DB::table('settings')->where('field_key','=','purchase_discount')->update(['value' => $request->purchase_discount]);
        $theme = DB::table('settings')->where('field_key','=','theme')->update(['value' => $request->theme]);
        //dd($cash_group_id);
        //$cash_group_id->update(['value' => $request->cash_group_id]);
        session()->flash('success','Primary Settings Updated successfully');
        return redirect()->back();
    }
    function unitSetup(Request $request){
        $unitsPermittedForLoggedInUser=unit_lists();
        $settedUnit=$unitsPermittedForLoggedInUser->where('id',$request->unit_id)->first();  
        $activeUser=User::find(Auth::user()->id);
        $activeUser->active_unit=$settedUnit->id;
        $activeUser->update();
       // dd($settedUnit);
        // session()->put('unit_id', $settedUnit->unit_id);
        // session()->put('unit_name', $settedUnit->name);
            
        session()->flash('success','Unit has been Changed Successfully');
        return $activeUser;
    }

    /***
    * Display Receipts and Payments
     */
    function chartOfAccount(){
        //$principles=AccountLedger::with('childs')->where([['ledger',0],['group_id',null]])->get();
        $accountLedgers = AccountLedger::with('childs')->where('group_id',null)->get();

        $accountHeads= $this->headRecursive($accountLedgers);
         //return $accountHeads;
        //$principles=Principle::with('ledgerGroups','ledgerGroups.child_group')->get();
        return view('account.settings.chart-of-accounts',compact('accountHeads'));
    }
    function headRecursive($headLedgers){
        $returnData='<ul id="myUL" class="charOfAccount treeList treeCollapse">';
        foreach($headLedgers as $head){
            //return $head->name;
            $returnData.='<li><span class="caret '. ( $head->ledger==0 ? 'font-weight-bold' : 'font-weight-normal'). '">'.$head->code.' - '.$head->name.'</span> '.($head->ledger==0 ? '(GR)' : '(LEDGER)');
            if($head->childs){
                $returnData.='<ul class="nested">';
                $returnData.=$this->headRecursive($head->childs);
                $returnData.='</ul>';
            }
            $returnData.='</li>';
        }
        $returnData.='</ul>';

        return $returnData;
    }
    function listOfGroups(){
        $principles=AccountLedger::with('childs')->where([['ledger',0],['group_id',null]])->get();
        //$principles=Principle::with('ledgerGroups','ledgerGroups.child_group')->get();
        return view('account.settings.list-of-groups',compact('principles'));
    }
    function receipt_payment(){
        return view('account.display.receipt_payment');
    }

    function profit_loss(){

        
        //$principleledgerGroup=LedgerGroup::where('group_id',null)->where('principle_id',3)->orWhere('principle_id',4)->with('child_group','child_group.ledgerItem')->get();
        //dd($principleledgerGroup);
        $start=request('start');
        $end=request('end');

        $openingAmounts=array();
        
        if($start && $end){
            $accountHeadGroups=JournalEntrie::whereBetween('created_at',[ $start , $end])
                ->with('acchead')
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('acchead.parent.name');
            $journalLedger=JournalEntrie::whereBetween('created_at',[  $start , $end])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            $journalLedgerForOpening=JournalEntrie::whereBetween('created_at',["2019-12-01" , $start ])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            foreach($journalLedgerForOpening as $key=>$openning){
                $debitData=0;
                $creditData=0;
                $openningDebitData=0;
                $openningCreditData=0;
                foreach($openning as $journal){
                    if($journal->type==0){
                        $openningDebitData+=$journal->amount;
                    }
                    if($journal->type==1){
                        $openningCreditData+=$journal->amount;
                    }
                }
                $openingAmounts[$key]=($openningDebitData-$openningCreditData);
            }
        }else{
            $accountHeadGroups=JournalEntrie::with('acchead','acchead.parent')
            ->whereHas('acchead.parent',function($que){
                $que->where('type',3)->orWhere('type',4);
            })
            ->orderBy('ledger_id')
            ->get()
            ->groupBy('acchead.parent.name');    //->groupBy('acchead.group.name');
            //dd($accountHeadGroups);
            $journalLedger=JournalEntrie::whereHas('acchead')
                ->orderBy('ledger_id')->get()->groupBy('ledger_id');
        }
        
        foreach($journalLedger as $key=>$ledger){
            $debitData=0;
            $creditData=0;
            foreach($ledger as $journal){
                if($journal->type==0){
                    $debitData+=$journal->amount;
                }
                if($journal->type==1){
                    $creditData+=$journal->amount;
                }
            }
            $ledgerWiseAmounts[$key]=($debitData-$creditData);
        }
        //return view('account.display.profit_loss',compact('accountHeadGroups','ledgerWiseAmounts','openingAmounts'));
        return view('account.display.income_statement',compact('accountHeadGroups','ledgerWiseAmounts','openingAmounts'));
    }
    function income_statement(){
        $start=request('start');
        $end=request('end');
        $openingAmounts=array();
        $accountHeadGroups=JournalEntrie::with('acchead','acchead.parent')
            ->whereHas('acchead.parent',function($que){
                $que->where('type',3)->orWhere('type',4);
            })
            ->orderBy('ledger_id')
            ->get()
            ->groupBy('acchead.parent.name');    //->groupBy('acchead.group.name');
            //dd($accountHeadGroups);
        $journalLedger=JournalEntrie::whereHas('acchead')
            ->orderBy('ledger_id')->get()->groupBy('ledger_id');
        if($start && $end){
            $accountHeadGroups=JournalEntrie::whereBetween('created_at',[ $start , $end])
                ->with('acchead')
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('acchead.parent.name');
            $journalLedger=JournalEntrie::whereBetween('created_at',[  $start , $end])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            $journalLedgerForOpening=JournalEntrie::whereBetween('created_at',["2019-12-01" , $start ])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            foreach($journalLedgerForOpening as $key=>$openning){
                $debitData=0;
                $creditData=0;
                $openningDebitData=0;
                $openningCreditData=0;
                foreach($openning as $journal){
                    if($journal->type==0){
                        $openningDebitData+=$journal->amount;
                    }
                    if($journal->type==1){
                        $openningCreditData+=$journal->amount;
                    }
                }
                $openingAmounts[$key]=($openningDebitData-$openningCreditData);
            }
        }
        
        foreach($journalLedger as $key=>$ledger){
            $debitData=0;
            $creditData=0;
            foreach($ledger as $journal){
                if($journal->type==0){
                    $debitData+=$journal->amount;
                }
                if($journal->type==1){
                    $creditData+=$journal->amount;
                }
            }
            $ledgerWiseAmounts[$key]=($debitData-$creditData);
        }
        // return view('account.display.profit_loss',compact('accountHeadGroups','ledgerWiseAmounts','openingAmounts'));
         return view('account.display.income_statement',compact('accountHeadGroups','ledgerWiseAmounts','openingAmounts'));
    }

    function  profit_loss_statement(){
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        // $incomes= AccountLedger::with('journals')->whereIn('id',[4,17,14,9,15,11,12,13])->orderByRaw('FIELD(id,4,17,14,9,15,11,12,13)')->get();
        $incomes= AccountLedger::with('journals','journals.journal')
                                ->whereHas('journals.journal',function($q)use($where){
                                    $q->where($where);
                                })
                                ->whereIn('id',
                                    [
                                        settings('sales'),
                                        settings('sales_return'),
                                        settings('sales_discount'),
                                        settings('purchase'),
                                        settings('purchase_return'),
                                        settings('purchase_discount'),
                                        128,129])
                                // ->orderByRaw('FIELD(id,
                                //         settings("sales"),
                                //         settings("sales return"),
                                //         settings("sales discount"),
                                //         settings("purchase"),
                                //         settings("purchase return"),
                                //         settings("purchase discount"),
                                //         128,129)')
                                ->get();
            $operatingExpenses= AccountLedger::with('journals')->where('type','=',4)->where('group_id','!=',101)->where('ledger','=',1)->get();//should use parent id
            //$endingInventory=Branch_inventory::where('stock_quantity','>',0)->get();
            $einvAmount=0;
            // foreach($endingInventory as $eInv){
            //     $einvAmount+=($eInv->purchase->purchase_unit_price*$eInv->stock_quantity);
            // }
             $returndata['endingInventory']=$einvAmount;
            foreach($incomes as $tb){
                $amount=0;
                $camount=0;
                if(settings('sales')==$tb->id){
                   $acc_name="sales_revenue";
                }elseif(settings('sales_return')==$tb->id){
                    $acc_name="sales_return";
                }elseif(settings('sales_discount')==$tb->id){
                    $acc_name="sales_discount";
                }elseif(settings('purchase')==$tb->id){
                    $acc_name="purchase";
                }elseif(settings('purchase_return')==$tb->id){
                    $acc_name="purchase_return";
                }elseif(settings('purchase_discount')==$tb->id){
                    $acc_name="purchase_discount";
                }else{
                    $acc_name=$tb->name;
                }
                
                $returndata[strtolower($acc_name)]['account_head']=$tb->name;
                $returndata[strtolower($acc_name)]['type']=$tb->type;
                foreach($tb->journals as $jr){

                    if($jr->type==0){
                    $amount=$amount+$jr->amount;
                    }//endif

                    if($jr->type==1){
                    $camount=$camount+$jr->amount;
                    }//endif

                }//endforeach
                if($amount>$camount){  
                    $returndata[strtolower($acc_name)]['amount']=($amount-$camount);
                }elseif($amount<$camount){
                    $returndata[strtolower($acc_name)]['amount']=($camount-$amount);
                }else{
                    $returndata[strtolower($acc_name)]['amount']=0;
                }
                }//foreach
            foreach($operatingExpenses as $opEx){
                $amount=0;
                $camount=0;
                $operatingExp[$opEx->id]['account_head']=$opEx->name;
                $operatingExp[$opEx->id]['type']=$opEx->type;
                foreach($opEx->journals as $jr){

                    if($jr->type==0){
                    $amount=$amount+$jr->amount;
                    }//endif

                    if($jr->type==1){
                    $camount=$camount+$jr->amount;
                    }//endif

                }//endforeach
                if($amount>$camount){  
                    $operatingExp[$opEx->id]['amount']=($amount-$camount);
                }elseif($amount<$camount){
                    $operatingExp[$opEx->id]['amount']=($camount-$amount);
                }else{
                    $operatingExp[$opEx->id]['amount']=0;
                }
                }//foreach
           
                //dd($returndata);
            return view('account.display.income_status',compact('returndata','operatingExp'));
    }
    function  balance_sheet(){
        return view('account.display.balance_sheet');
    }

    function trial_balance(){
        //$ledgerGroup=LedgerGroup::where('group_id',null)->with('child_group','child_group.ledgerItem')->get();
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
        $start=request('start');
        $end=request('end');

        $openingAmounts=array();
        $accountHeadGroups=JournalEntrie::with('acchead')
            ->whereHas('journal',function($jk)use($where){
                $jk->where($where);
            })
            ->orderBy('ledger_id')
            ->get()
            ->groupBy('acchead.parent.name');
        $journalLedger=JournalEntrie::orderBy('ledger_id')
                    ->whereHas('journal',function($jk)use($where){
                        $jk->where($where);
                    })->get()->groupBy('ledger_id');
        if($start && $end){
            $accountHeadGroups=JournalEntrie::whereHas('journal',function($jk)use($where){$jk->where($where);})
                ->whereBetween('created_at',[ $start , $end])
                ->with('acchead')
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('acchead.parent.name');
            $journalLedger=JournalEntrie::whereHas('journal',function($jk)use($where){$jk->where($where);})
                ->whereBetween('created_at',[  $start , $end])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            $journalLedgerForOpening=JournalEntrie::whereHas('journal',function($jk)use($where){$jk->where($where);})
                ->whereBetween('created_at',["2019-12-01" , $start ])
                ->orderBy('ledger_id')
                ->get()
                ->groupBy('ledger_id');
            foreach($journalLedgerForOpening as $key=>$openning){
                $debitData=0;
                $creditData=0;
                $openningDebitData=0;
                $openningCreditData=0;
                foreach($openning as $journal){
                    if($journal->type==0){
                        $openningDebitData+=$journal->amount;
                    }
                    if($journal->type==1){
                        $openningCreditData+=$journal->amount;
                    }
                }
                $openingAmounts[$key]=($openningDebitData-$openningCreditData);
            }
        }
        
        foreach($journalLedger as $key=>$ledger){
            $debitData=0;
            $creditData=0;
            foreach($ledger as $journal){
                if($journal->type==0){
                    $debitData+=$journal->amount;
                }
                if($journal->type==1){
                    $creditData+=$journal->amount;
                }
            }
            $ledgerWiseAmounts[$key]=($debitData-$creditData);
        }
        //dd($ledgerWiseAmount);
        return view('account.display.trial_balance',compact('accountHeadGroups','ledgerWiseAmounts','openingAmounts'));
    }

//    function ledger(){
//        return view('account.display.ledger');
//    }
function cash_book()
    {
    
        $start=request('start');
        $end=request('end');

        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }

        $journal_entries=JournalEntrie::where('ledger_id',settings('cash_ledger_id'))
                                ->whereHas('journal',function($jk)use($where){
                                    $jk->where($where)->where('date',date('Y-m-d'));
                                });
        


        if($start && $end){
            $journal_entries=JournalEntrie::where('ledger_id',settings('cash_ledger_id'))
                            ->whereHas('journal',function($query)use($where,$start,$end){
                                $query->where($where)->whereBetween('date',[$start,$end]);
                            });
        }

        $journals = $journal_entries->orderBy('id','ASC')
                                    ->get()
                                    ->groupBy('ac_journal_id');
        
        
    
        return view('account.display.cash_book',compact('journals'));
    }
}
