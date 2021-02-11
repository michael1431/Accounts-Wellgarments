<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrator',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Administrator'){
                        return $permission->name == 'Administrator';
                    }
                }
            }
        });

        Gate::define('merchandiser',function($user){
//            dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    //dd($permission->name);
                    if($permission->name == 'Merchandise'){
                        return $permission->name == 'Merchandise';
                    }
                }
            }

        });

        Gate::define('commercial',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Commercial'){
                        return $permission->name == 'Commercial';
                    }
                }
            }

        });

        Gate::define('hrm',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'HRM'){
                        return $permission->name == 'HRM';
                    }
                }
            }

        });

        Gate::define('production',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Production'){
                        return $permission->name == 'Production';
                    }
                }
            }

        });

        Gate::define('planning',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Planning'){
                        return $permission->name == 'Planning';
                    }
                }
            }

        });

        Gate::define('accounts',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Accounts'){
                        return $permission->name == 'Accounts';
                    }
                }
            }

        });

        Gate::define('inventory',function($user){
            //dd($user->roles);
            foreach ($user->roles as $role){
                foreach($role->permissions as $permission){
                    if($permission->name == 'Inventory'){
                        return $permission->name == 'Inventory';
                    }
                }
            }

        });
    }
}
