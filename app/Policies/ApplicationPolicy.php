<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ApplicationPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
		dd($user);
		return true;
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
