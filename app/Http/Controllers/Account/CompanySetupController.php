<?php

namespace App\Http\Controllers\Account;

use App\Account\AccountCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class CompanySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = AccountCompany::query()->paginate(10);
        return view('account.settings.company-setup.create',compact('companies'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'note'=>'max:200'
        ]);
        AccountCompany::create($request->all());
        session()->flash('success',"Company Name created successfully");
        return redirect()->route('company.add');
    }


    public function edit($id)
    {
        $company = AccountCompany::findOrFail($id);
        $companies = AccountCompany::query()->paginate(10);
        return view('account.settings.company-setup.edit',compact('company','companies'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'note'=>'max:200'
        ]);
        AccountCompany::findOrFail($id)->update($request->all());
        session()->flash('success',"Company name updated successfully");
        return redirect()->route('company.add');
    }

    public function destroy(Request $request)
    {
        AccountCompany::findOrFail($request->id)->delete();
    }

}
