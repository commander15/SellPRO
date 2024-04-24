<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Sale;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleProduct>
 */
class SaleProductFactory extends Factory
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
        
        $saleIds = Sale::pluck("id")->toArray();
        $saleId = $saleIds[random_int(0, count($saleIds) -1)];

        return [
            'quantity' => fake()->numberBetween(1,100),
            'product_id' => $productId,
            'sale_id' => $saleId
        ];
    }
}
