<?php

namespace App\Http\Controllers\Account;

use App\Account\LedgerGroup;
use App\Account\Principle\Principle;
use App\Account\Principle\SubPrinciple;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LedgerGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = LedgerGroup::all();
        //$ledgerGroups = LedgerGroup::all();
       // $subPrinciples = SubPrinciple::all();
        $principles = Principle::all();
        return view('account.ledger-group.create',compact('groups','ledgerGroups','principles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'      =>'required|unique:ledger_groups',
            'group_id'      =>'required',
        ]);

//        $sub_principle_id = $group_id = null;
//        $data = $request->except('group_id');
//        if (substr($request->group_id,0,2) == 'pr'){
//            $sub_principle_id = substr($request->group_id,2,strlen($request->group_id));
//            $data["sub_principle_id"] = $sub_principle_id;
//        }elseif (substr($request->group_id,0,2) == 'ur'){
//            $group_id = substr($request->group_id,2,strlen($request->group_id));
//            $data["group_id"] = $group_id;
//
//        }else{
//            $group_id = $request->group_id;
//            $data["group_id"] = $group_id;
//        }

//      start for principle

        $principle_id = $group_id = null;
        $data = $request->except('group_id');
        if (substr($request->group_id,0,2) == 'pr'){
            $principle_id = substr($request->group_id,2,strlen($request->group_id));
            $data["principle_id"] = $principle_id;
        }elseif (substr($request->group_id,0,2) == 'ur'){
            $group_id = substr($request->group_id,2,strlen($request->group_id));
            $data["group_id"] = $group_id;

        }else{
            $group_id = $request->group_id;
            $data["group_id"] = $group_id;
        }

//    end for principle



        LedgerGroup::query()->create($data);

        session()->flash('success',"Group create successfully");
        return redirect()->route('ledgerGroup.create');
    }


    public function edit($id)
    {
        $group = LedgerGroup::findOrFail($id);
        $principles = Principle::all();
        $groups = LedgerGroup::query()->paginate(10);
        $subPrinciples = SubPrinciple::all();
        //$groupsPluck = LedgerGroup::query()->pluck('name','id');
        return view('account.ledger-group.edit',compact('group','groups','subPrinciples','principles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'      =>'required|unique:ledger_groups,name,'.$id,
            'group_id'      =>'required',
        ]);

//        $sub_principle_id = $group_id = null;
        //for principle
        $principle_id = $group_id = null;
        $data = $request->except('group_id');

        if (substr($request->group_id,0,2) == 'pr'){

            $sub_principle_id = substr($request->group_id,2,strlen($request->group_id));
//            $data["sub_principle_id"] = $sub_principle_id;
            //for principle
            $data["principle_id"] = $sub_principle_id;
            $data["group_id"] = null;
        }elseif (substr($request->group_id,0,2) == 'ur'){

            $group_id = substr($request->group_id,2,strlen($request->group_id));
            $data["group_id"] = $group_id;
//            $data["sub_principle_id"] = null;
            //for principle
            $data["principle_id"] = null;


        }else{

            $group_id = $request->group_id;
            $data["group_id"] = $group_id;
//            $data["sub_principle_id"] = null;
            //for principle
            $data["principle_id"] = null;

        }

        //dd(["data"=>$data,"all"=>$request->all(),"group_id"=>substr($request->group_id,0,2)]);

        LedgerGroup::findOrFail($id)->update($data);

        /* if(is_numeric($request->group_id)){
             LedgerGroup::findOrFail($id)->update($request->all());
         }else{
             $sub_principle_array = explode('-',$request->group_id);
             $ledge_group = $request->except('group_id');
             $ledge_group['group_id'] = null;
             $ledge_group['sub_principle_id'] = $sub_principle_array[1];
             LedgerGroup::findOrFail($id)->update($ledge_group);
         }*/
        session()->flash('success',"Group updated successfully");
        return redirect()->route('ledgerGroup.create');
    }



    public function destroy(Request $request)
    {
        LedgerGroup::findOrFail($request->id)->delete();
    }
}
