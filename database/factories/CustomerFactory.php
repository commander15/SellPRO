<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement([ 'M', 'F' ]);
        return [
            'nic' => fake()->text(20),
            'name' => fake()->name($gender),
            'firstName' => fake()->firstName($gender),
            'sex' => $gender
        ];
    }
}
