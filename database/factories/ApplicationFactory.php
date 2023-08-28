<?php

namespace Database\Factories;

use App\Models\Application;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ApplicationFactory extends Factory
{
    protected $model = Application::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'residence' => $this->faker->city(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'application_letter' => $this->faker->realText(),
            'files' => $this->faker->filePath(),
			'created_at' => Carbon::now()->subDays(rand(1, 365)),
			'updated_at' => Carbon::now()->subDays(rand(1, 365)),
        ];
    }
}
