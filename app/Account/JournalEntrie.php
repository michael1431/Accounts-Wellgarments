<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class JournalEntrie extends Model
{
    protected $fillable = ['ac_journal_id','amount','type','ledger_id','cr_ledger_id','note'];
    //protected $fillable = ['ac_journal_id','dr_amount','cr_amount','dr_ledger_id','cr_ledger_id','note'];


    function journal(){
        return $this->belongsTo(AcJournal::class,'ac_journal_id');
    }
    function acchead(){
        return $this->belongsTo(AccountLedger::class,'ledger_id','id');
    }

    //use this for getting debit ledger name ...
    function debitLedgerName(){
        return $this->belongsTo(AccountLedger::class,'dr_ledger_id','id');
    }

    //use this for getting credit ledger name ...
    function creditLedgerName(){
        return $this->belongsTo(AccountLedger::class,'cr_ledger_id','id');
    }


    //getting account ledger name using id ....
    public function ledgerName($id){
        return AccountLedger::query()->findOrFail($id);
    }




}
