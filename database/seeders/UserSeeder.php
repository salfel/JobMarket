<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'email' => 'felix.salcher.06@gmail.com',
            'password' => bcrypt('Flix-gaming.cr1'),
        ]);
    }
}
