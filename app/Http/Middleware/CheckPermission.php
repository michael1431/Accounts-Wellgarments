<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $per
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //        dd($request->user());
        if(Auth::check()){

            $route_name=$request->route()->getName();
            // dd($route_name);
                $roles = $request->user()->roles;
                foreach($roles as $role){
                    foreach($role->permissions as $permission){
                        if($permission->name === $route_name){
                            return $next($request);
                        }
                    }
                }

            
            abort(403);
        }

        // if (Auth::check()) {
        //     return redirect('/');
        // }

        // return $next($request);

    }
}
