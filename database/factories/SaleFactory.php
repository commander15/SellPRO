<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $sellerIds = User::pluck("id")->toArray();
        $sellerId = $sellerIds[random_int(0, count($sellerIds) -1)];
        
        $customerIds = Customer::pluck("id")->toArray();
        $customerId = $customerIds[random_int(0, count($customerIds) -1)];

        return [
            'ref' => fake()->uuid(),
            'date' => fake()->date(),
            'time' => fake()->time(),
            'user_id' => $sellerId,
            'customer_id' => $customerId
        ];
    }
}
