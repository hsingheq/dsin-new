<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Products([

            'product_title' => $row[1],
            'slug' => $row[2],
            'product_description' => $row[3],
            'product_stocks' => $row[4],
            'stock_status' => $row[5],
            'product_price' => $row[6],
            'product_dealer_price' => $row[7],
            'product_discount' => $row[8],
            'product_sku' => $row[9],
            'product_order' => $row[10],
            'product_brand' => $row[11],
            'product_meta_title' => $row[12],
            'product_meta_keywords' => $row[13],
            'product_meta_description' => $row[14],
            'product_status' => $row[15],
            'product_visibility' => $row[16],
            'product_category' => $row[17],
            'product_tags' => $row[18]

        ]);
    }
}
