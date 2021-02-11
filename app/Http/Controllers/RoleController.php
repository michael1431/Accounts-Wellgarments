<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::query()->paginate(5);
        return view('role.index',compact('roles'));
    }

    public function create()
    {
        $permission_groups=Permission::all()->groupBy('label_group');
        //$permissions = Permission::all()->pluck('name','id');
        return view('role.create',compact('permission_groups'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:roles'
        ]);
        /** @noinspection PhpUndefinedClassInspection */
        Role::query()->create($request->all())->permissions()->attach($request->asignpermission);
        Session::flash('success','Role has been created!');
        return redirect('role/index');
    }

    public function edit($id)
    {
        $permission_groups=Permission::all()->groupBy('label_group');
        $role=Role::with('permissions')->find($id);
        $roles=Role::all();
        return view('role.edit',compact('role','roles','permission_groups'));
    }

    public function update($id, Request $request)
    {

        // dd($request->all());
        $role = Role::find($id);

        $this->validate($request,[
            'name' => ['required',Rule::unique('roles')->ignore($role->id)],
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->asignpermission);

        Session::flash('success','Role has been updated!');
        return redirect('role/index');
    }

    public function destroy($id)
    {
        /** @noinspection PhpUndefinedClassInspection */
        $role = Role::query()->findOrFail($id);
        $role->delete();
        Session::flash('success','Role has been deleted');
        return redirect('role/index');
    }
}
