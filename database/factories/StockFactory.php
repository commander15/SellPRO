<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\make:factory>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productIds = Product::pluck('id')->toArray();
        $productId = $productIds[random_int(0, count($productIds) -1)];
        
        return [
            'label' => fake()->streetName(),
            'quantity' => fake()->numberBetween(1, 64),
            'product_id' => $productId
        ];
    }
}
