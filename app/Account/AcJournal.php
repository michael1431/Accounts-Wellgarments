<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class AcJournal extends Model
{

    protected $dates = ['date'];

    protected $fillable = ['company_id','journal_no','event','date','created_by','updated_by'];

//    public function debitLedgerGroup(){
//        return $this->belongsTo(LedgerGroup::class,'dr_ledger_group_id');
//    }
//
//    public function creditLedgerGroup(){
//        return $this->belongsTo(LedgerGroup::class,'cr_ledger_group_id');
//    }

//    -================================================
    //get all journal entries according to journal id
    function journalEntries(){
        return $this->hasMany(JournalEntrie::class,'ac_journal_id','id');
    }

    //get company name
    public function company(){
        return $this->belongsTo(AccountCompany::class);
    }
    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }




}

