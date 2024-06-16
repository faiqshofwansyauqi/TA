<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AksesPagePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function akses_sidebar(User $user)
    {
        return $user->hasRole('Bidan') || $user->hasRole('Admin');
    }
    public function akses_page(User $user)
    {
        return $user->hasRole('Bidan') || $user->hasRole('Admin');
    }
}
