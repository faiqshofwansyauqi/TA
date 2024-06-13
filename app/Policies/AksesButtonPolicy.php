<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AksesButtonPolicy
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

    public function akses_tambah(User $user)
    {
        return $user->name == 'Bidan' || $user->name == 'Admin';
    }
    public function akses_edit(User $user)
    {
        return $user->name == 'Bidan' || $user->name == 'Admin';
    }
}
