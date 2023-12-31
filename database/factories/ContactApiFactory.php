<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactApi>
 */
class ContactApiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->name(),
            "country_code" => 95,
            "phone_number" => fake()->numerify('#########'),
            "email" => fake()->email(),
            "user_id" => rand(1,5)
        ];
    }
}
