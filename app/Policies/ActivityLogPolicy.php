<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityLogPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->role === 'super admin';
    }
}
