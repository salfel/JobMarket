<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CompanyFactory extends Factory
{
    protected $model = Company::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'logo' => $this->faker->imageUrl(),
            'website' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'region' => $this->faker->word(),
            'location' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
