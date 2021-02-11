<?php

namespace App\Account\Principle;

use App\Account\LedgerGroup;
use Illuminate\Database\Eloquent\Model;

class SubPrinciple extends Model
{
    protected $fillable = ['id','name','principle_id','note'];

    public function principle()
    {
        return $this->belongsTo(Principle::class);
    }

    public function ledgerGroups()
    {
        return $this->hasMany(LedgerGroup::class);
    }

}
