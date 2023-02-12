<?php

namespace App\Exports;
use Exportable;
use App\Models\Products;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class ProductExport implements FromCollection, WithHeadings{
    /**
     * @return \Illuminate\Support\Collection
     */
   
    public function headings(): array
    {
        return [
            'id',
            'product_title',
            'slug',
            'product_description',
           
            'product_stocks',
            'stock_status',
            'product_price',
            'product_dealer_price',
            'product_discount',
            'product_sku',
            'product_brand',
            'product_meta_title',
            'product_meta_keywords',
            'product_meta_description',
            'product_status',
            'product_visibility',
            'product_category',
            'product_tags',
            'product_short_description',
            'publishtime',
        ];
    }
    public function collection()
    {
        return Products::select('id','product_title','slug','product_description','product_stocks','stock_status','product_price','product_dealer_price','product_discount','product_sku','product_brand','product_meta_title','product_meta_keywords','product_meta_description','product_status','product_visibility','product_category','product_tags','product_short_description','publishtime',)->get();
    }
}
