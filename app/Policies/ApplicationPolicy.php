<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {

    }

    public function view(User $user, Application $application)
    {
    }

    public function create(User $user)
    {
    }

    public function update(User $user, Application $application)
    {
    }

    public function delete(User $user, Application $application)
    {
    }

    public function restore(User $user, Application $application)
    {
    }

    public function forceDelete(User $user, Application $application)
    {
    }
}
