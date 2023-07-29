<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Company $company): bool
    {
        return $user->id === $company->owner_id;
    }

    public function delete(User $user, Company $company): bool
    {
        return $user->id === $company->owner_id;
    }
}
