<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\SaleProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $count = random_int(1,10);

        Sale::factory($count)->create();
        SaleProduct::factory($count * 1.5)->create();
    }
}
