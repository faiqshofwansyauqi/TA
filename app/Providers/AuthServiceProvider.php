<?php

namespace App\Providers;

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
        'App\Models\Ibu' => 'App\Policies\AksesPagePolicy',
        'App\Models\Anak' => 'App\Policies\AksesPagePolicy',
        'App\Models\Anc' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Anc' => 'App\Policies\AksesPagePolicy',
        'App\Models\Ropb' => 'App\Policies\AksesPagePolicy',
        'App\Models\Rencana_Persalinan' => 'App\Policies\AksesPagePolicy',
        'App\Models\Persalinan' => 'App\Policies\AksesPagePolicy',
        'App\Models\Nifas' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Nifas' => 'App\Policies\AksesPagePolicy',
        'App\Models\Ppia' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Ppia' => 'App\Policies\AksesPagePolicy',
        'App\Models\Pemantauan_Bayi' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Hepatitis' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Hiv' => 'App\Policies\AksesPagePolicy',
        'App\Models\Show_Sifilis' => 'App\Policies\AksesPagePolicy',
        User::class => AksesPagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
