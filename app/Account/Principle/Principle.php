<?php

namespace App\Account\Principle;

use App\Account\LedgerGroup;
use Illuminate\Database\Eloquent\Model;

class Principle extends Model
{
    protected $fillable = ['id','name'];

    //previous sub_principles was under principle but changed it now
    public function sub_principles(){
        return $this->hasMany(SubPrinciple::class);
    }


    //ledger Groups is direct under principle now
    public function ledgerGroups()
    {
        return $this->hasMany(LedgerGroup::class,'principle_id');
    }

}
