<?php

namespace App\Account;

use Illuminate\Database\Eloquent\Model;

class AccountLedger extends Model
{
    protected $table = 'account_ledgers';

    protected $fillable = ['group_id','code','name','type','unit_id','is_bank','ledger'];

    public function group(){
        return $this->belongsTo(LedgerGroup::class,'group_id');
    }
    public function parent(){
        return $this->belongsTo(AccountLedger::class,'group_id');
    }
    public function childs(){
        return $this->hasMany(AccountLedger::class,'group_id');
    }
    public function journals(){
        return $this->hasMany(JournalEntrie::class,'ledger_id');
    }
}

