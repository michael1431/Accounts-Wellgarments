<?php
use Illuminate\Support\Facades\DB;
use App\Role;
function isActive($path, $active = 'active menu-open'){
    return call_user_func_array('Request::is', (array)$path) ? $active : '';
}
function app_info(){
    $info = DB::table('company_addresses')->first();
    return $info;
}
function settings($key){
   $setting = DB::table('settings')->where('field_key','=',$key)->first();
   return $setting->value;
}
function auth_unit(){
    $units=Auth::user()->units;
   if($units){
       if(count($units)>0){
        return Auth::user()->active_unit;
       }
       return $units->first()->id;
    
   }else{
        return null;
   }
}
function unit_name(){
    $units=Auth::user()->units;
   if($units){
           return unit_lists()->where('id',Auth::user()->active_unit)->first()->name;
   }else{
        return null;
   }
}
function unit_lists(){
    if(settings('module')==1){
        $units=  AccountCompany::pluck('name','id');
        return $units;
    }else{
        return Auth::user()->units ? Auth::user()->units : [];
    }
}
function hasPermission($role,$permission){
    $activeRole=Role::with('permissions')->find($role);
    foreach($activeRole->permissions as $activePermission){
        if($activePermission->name==$permission){
            return true;
        }
    }
    return false;
    //dd($permissions);
}
function canAbleToSee($permission){
    $roles=Auth::user()->roles;
    foreach($roles as $activeRole){
    //$activeRole=Role::with('permissions')->find($role);
        foreach($activeRole->permissions as $activePermission){
            if($activePermission->name==$permission){
                return true;
            }
        }
    }
    return false;
}