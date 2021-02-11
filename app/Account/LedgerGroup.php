<?php

namespace App\Account;

use App\Account\Principle\Principle;
use App\Account\Principle\SubPrinciple;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    protected $fillable = ['name','group_id','note','status','sub_principle_id','principle_id'];


    public function parent_group(){
        return $this->belongsTo(LedgerGroup::class,'group_id');
    }
    public function child_group(){
        return $this->hasMany(LedgerGroup::class,'group_id');
    }

    public function journalEntries(){
        return $this->hasMany(JournalEntrie::class,'ledger_id');
    }
    public function ledgerItem(){
        return $this->hasMany(AccountLedger::class,'group_id');
    }

    public function sub_principle(){
        return $this->belongsTo(SubPrinciple::class,'sub_principle_id');
    }


    //for principle to group
    public function principle(){
        return $this->belongsTo(Principle::class,'principle_id');
    }

}
