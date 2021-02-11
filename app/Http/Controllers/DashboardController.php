<?php

namespace App\Http\Controllers;

use App\Account\AccountLedger;
use App\Account\JournalEntrie;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\User;
use Auth;
use Hash;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function changePassword(){

        return view('dashboard.change-password');
    }
    public function updatePassword(Request $request){
        $user = Auth::user();
        $this->validate($request, [
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $data['password']=Hash::make($request['password']);
        User::query()->findOrFail($user->id)->update($data);
        Auth::logout();
        return redirect('login');
    }

    public function index()
    {
        $activeUser=Auth::user();
        if(!$activeUser->active_unit){
            $activeUser->active_unit=Auth::user()->units->first()->id;
            $activeUser->update();
        }
        if(auth_unit()){
            $where=[['company_id',auth_unit()]];
        }else{
            $where=[];
        }
       
        $accountLedger = AccountLedger::where('ledger',1)->get()->count();
        $cashPayments=JournalEntrie::where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',1)->where('created_at','>=', Carbon::today())->get();
        $cashReceipts=JournalEntrie::where('ledger_id','=',settings('cash_ledger_id'))->where('type','=',0)->where('created_at','>=', Carbon::today())->get();
        $bankDeposites=JournalEntrie::whereHas('acchead',function($q){
            $q->where('group_id',settings('bank_group_id'));
        })->where('type','=',0)->where('created_at','>=', Carbon::today())->get();
        $bankWithdrawns=JournalEntrie::whereHas('acchead',function($q){
            $q->where('group_id',settings('bank_group_id'));
        })->where('type','=',1)->where('created_at','>=', Carbon::today())->get();
		
        return view('dashboard.index',compact('accountLedger','cashPayments','cashReceipts','bankDeposites','bankWithdrawns'));
    }
    

    public function index2()
    {
        return view('dashboard.index2');
    }

    public function index3()
    {
        return view('dashboard.index3');
    }
}
