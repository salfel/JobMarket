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
        $url = $this->faker->url();
        $array = explode('/', $url);
        array_pop($array);
        $url = implode('/', $array);

        return [
            'name' => $this->faker->unique()->company(),
            'description' => $this->faker->text(500),
            'logo' => $this->faker->imageUrl(),
            'website' => $url,
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'region' => $this->faker->randomElement(config('constants.regions')),
            'location' => $this->faker->city(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
