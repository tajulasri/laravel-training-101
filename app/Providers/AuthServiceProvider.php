<?php

namespace App\Providers;

use App\Policies\FileUploadPolicy;
use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();        
        //define our permissions
        Gate::define('view-upload-file',[FileUploadPolicy::class,'index']);
        Gate::define('store-upload-file',[FileUploadPolicy::class,'store']);
    }
}
