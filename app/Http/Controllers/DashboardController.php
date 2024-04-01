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

        $dataset = $this->getSaleData();

        return view('dashboard.view', [ 
            'area' => array(
                'labels' => $dataset['label'],
                'data' => $dataset['data']
            )
         ]);
    }

    private function getSaleData($top = 5)
    {
        $query = "
            SELECT product_id, products.name, COUNT(product_id), sales.date
            FROM sale_products
            INNER JOIN sales ON(sales.id = sale_products.sale_id)
            INNER JOIN products ON(products.id = sale_products.product_id)
            GROUP BY (product_id)
            ORDER BY 3 DESC
            LIMIT $top
        ";
        $results = DB::select($query);
        
        $labels = [];
        $data = [];
        foreach ($results as $result) {
            array_push($labels, $result[0]);
            array_push($data, $result[1]);
        }

        return [
            'labels' => $labels,
            'data' => $data
        ];
    }
}
