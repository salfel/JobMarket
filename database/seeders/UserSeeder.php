<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Felix Salcher',
            'email' => 'felix.salcher.06@gmail.com',
            'password' => bcrypt('Flix-gaming.cr1'),
			'role' => 'owner',
			'company_id' => Company::first()->id
        ]);

		$companies = Company::all();
		foreach($companies as $company) {
			if ($company->id == Company::first()->id) return;

			User::factory()->create([
				'role' => 'owner',
				'company_id' => $company->id
			]);
		}
    }
}
