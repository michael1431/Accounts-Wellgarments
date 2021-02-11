<?php


namespace App\Repositories;


use App\Account\AccountLedger;
use App\Account\AcGroup;
use App\Account\AcHead;
use App\Account\AccountCompany;
use App\Account\AcMainHead;
use App\Account\AcPrinciple;
use App\Account\AcSubChildHead;
use App\Account\AcSubHead;
use App\Account\LedgerGroup;
use Auth;
use DB;

class AccountsRepository
{
    public function principles(){
        return AcPrinciple::select('id','name')->get();
    }

    public function accGroups(){
        return AcGroup::select('id','name')->get();
    }

    public function accMainHeads(){
        return AcMainHead::select('id','name')->get();
    }


    public function accHeads(){
        return AcHead::select('id','name')->get();
    }


    public function accSubHeads(){
        return AcSubHead::select('id','name')->get();
    }


    public function accSubChildHeads(){
        return AcSubChildHead::select('id','name')->get();
    }

    //used in journal create page..
    public function ledgerLists(){
        return AccountLedger::with('parent')->where('ledger',1)->pluck('name','id');
    }
    public function unitLists(){
        if(settings('module')==1){
            $units=  AccountCompany::pluck('name','id');
            return $units;
        }else{
            return Auth::user()->units ? Auth::user()->units->pluck('name','id') : [];
        }
    }




}