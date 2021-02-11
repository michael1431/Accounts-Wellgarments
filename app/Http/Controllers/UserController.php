<?php

namespace App\Http\Controllers;

use /** @noinspection PhpUndefinedClassInspection */
    App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::query()->paginate(5);
        return view('user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all()->pluck('name','id');
        return view('user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'min:4',
            'password' => 'min:6|confirmed',
            'email' => 'email|unique:users',
            'roles' => 'required'
        ]);
        $request['category'] = 1;
        $request['number'] = 0;
        $request['password'] = bcrypt($request->password);
        User::query()->create($request->except('roles'))->roles()->attach($request->roles);
        Session::flash('success','User created successfully');
        return redirect('users');
    }

    public function show()
    {
        $user = Auth::user();
        return view('user.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        /** @noinspection PhpUndefinedClassInspection */
        $roles = Role::all()->pluck('name','id');
        return view('user.edit',compact('user','roles'));
    }

    public function update($id, Request $request)
    {
        $user = User::query()->findOrFail($id);

        if($request->has('password')){
            $this->validate($request,[
                'password' => 'min:6|confirmed',
            ]);
            $data = $request->only('password');
        }else{
            $this->validate($request,[
                'name' => 'min:4',
                'email' => ['email',Rule::unique('users','email')->ignore($user->id)],
                'roles' => 'required'
            ]);
            $data = $request->except(['roles','password']);
        }

        $user->update($data);

        if(!$request->has('password')){
            $user->roles()->sync($request->roles);
        }

        Session::flash('success','User has been updated!');
        return redirect('users');
    }

    public function destroy($id)
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        Session::flash('success','User has been deleted');
        return redirect('users');
    }
}
