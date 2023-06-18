<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vip>
 */
class VipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fname = fake()->firstName;
        $lname = fake()->lastName;

        return [
            'full_name'  => $fname . " " . $lname,
            'position'   => fake()->words(3, true),
        ];
    }
}
