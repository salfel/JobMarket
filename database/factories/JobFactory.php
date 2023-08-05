<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->jobTitle(),
            'description' => $this->faker->text(350),
            'company_id' => $this->faker->word(),
            'type' => $this->faker->randomElement(config('constants.jobType')),
            'region' => $this->faker->randomElement(config('constants.regions')),
            'location' => $this->faker->city(),
            'created_at' => Carbon::now()->subDays(rand(1, 365)),
            'updated_at' => Carbon::now()->subDays(rand(1, 365)),
        ];
    }
}
