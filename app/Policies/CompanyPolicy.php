<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Gate;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return boolval($user);
    }

    public function update(User $user, Company $company): bool
    {
        return $user->id === $company->owner_id;
    }

    public function delete(User $user, Company $company): bool
    {
        return $user->id === $company->owner_id;
    }
}

Gate::define('create-company', [CompanyPolicy::class, 'create']);
Gate::define('update-company', [CompanyPolicy::class, 'update']);
Gate::define('delete-company', [CompanyPolicy::class, 'delete']);
