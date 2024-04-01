<?php

namespace App\Http\Controllers;

use App\Models\SaleProduct;
use App\Models\Sale;

use Illuminate\Http\Request;

use DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $query = "SELECT product_id, COUNT(product_id) FROM sale_products GROUP BY(product_id); ";

        $top = $this->getTopSaleData();
        $growth = $this->getSaleGrowthData();

        return view('dashboard.view', [ 
            'top' => array(
                'labels' => $top['labels'],
                'data' => $top['data'],
                'colors' => $top['colors']
            ),
            'growth' => array(
                'labels' => $growth['labels'],
                'data' => $growth['data']
            )
         ]);
    }

    private function getTopSaleData($top = 5)
    {
        $query = "
            SELECT product_id AS id, products.name as name, COUNT(product_id) as count, sales.date as date
            FROM sale_products
            INNER JOIN sales ON(sales.id = sale_products.sale_id)
            INNER JOIN products ON(products.id = sale_products.product_id)
            GROUP BY product_id, products.name, sales.date
            ORDER BY 3 DESC
            LIMIT $top
        ";
        $results = DB::select($query);
        
        $labels = [];
        $data = [];
        $colors = [];
        foreach ($results as $result) {
            array_push($labels, $result->name);
            array_push($data, $result->count);
            array_push($colors, $this->quantityColor($result->count));
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'colors' => $colors
        ];
    }

    private function quantityColor($count) 
    {
        return '#' . \random_int(100, 500);
    }

    private function getSaleGrowthData()
    {
        $query = "
            SELECT s.date AS date,
            SUM(sp.quantity * p.price) AS amount
            FROM sales s
            JOIN sale_products sp ON s.id = sp.sale_id
            JOIN products p ON sp.product_id = p.id
            GROUP BY s.date
            ORDER BY date
        ";
        $results = DB::select($query);
        
        $labels = [];
        $data = [];
        foreach ($results as $result) {
            array_push($labels, $result->date);
            array_push($data, $result->amount);
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
