<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
		Company::factory(25)->create();
    }
}
