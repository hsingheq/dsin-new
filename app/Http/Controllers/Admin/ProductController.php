<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\MY_Controller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Excel;
use Session;
use Validator;
use DB;
use App\Models\Category;
use App\Models\ProductStocks;

use App\Models\User;
use App\Models\Brands;
use App\Models\Products;
use Illuminate\Support\Str;
use App\Models\Attribute;
use App\Models\AttributeOptions;


class ProductController extends MY_Controller
{

    /*********************************************
     * ****** Start Of product function parts*********
     *****************************************
     *********************************************/


    /****************************************
     * ****** End Of product function parts*********
     ****************************************
     */



    public function add_more_choice_option(Request $request)
    //public function add_more_choice_option($id)
    {
        $all_attribute_values = AttributeOptions::with('attribute')->where('attribute_id', $request->attribute_id)->get();
        //$all_attribute_values = AttributeOptions::with('attribute')->where('attribute_id', $id)->get();
        //print_r($all_attribute_values);

        //die;

        $html = '';

        foreach ($all_attribute_values as $row) {
            //            $val = $row->id . ' | ' . $row->name;
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }

        echo json_encode($html);
    }




    public function sku_combination(Request $request)
    {



        $options = array();

        $unit_price = $request->input('unit_price');
        $product_title = $request->input('product_title');

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);

        // return view("admin.products.sku");
        return view('admin.products.sku_combinations', compact('combinations', 'unit_price', 'product_title'));
    }


    public function sku_combination_edit(Request $request)
    {
        $product = Products::findOrFail($request->id);


        $options = array();

        $unit_price = $request->input('unit_price');
        $product_title = $request->input('product_title');

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$name][0]) as $key => $item) {
                foreach ($request[$name] as $key => $item) {
                    // array_push($data, $item->value);
                    array_push($data, $item);
                }
                array_push($options, $data);
            }
        }

        $combinations = Combinations::makeCombinations($options);

        // return view("admin.products.sku");
        return view('admin.products.sku_combinations_edit', compact('combinations', 'unit_price', 'product_title', 'product'));
    }


    /*********************************************
     * ****** End Of brand function parts*********
     *****************************************
     *********************************************/



    /*********************************************
     ******* Start Of products function parts ********
     *****************************************
     *********************************************/

    public function add_product()
    {
        //getting brands
        $data['brands']     = DB::table('brands')->get();
        $data['categories'] = DB::table('categories')->get();





        return view('admin.products.add-product', $data);
    }


    public function store_product(Request $request)
    {


        $product       = new Products();


        $product->product_title             = $request->product_title;
        $product->slug                      = $request->product_title;
        $product->product_description       = $request->product_description;
        $product->photos                    = $request->photos;
        $product->thumbnail_img             = $request->thumbnail_img;
        $product->stock_status              = $request->stock_status;
        $product->unit_price                = $request->unit_price;
        $product->product_dealer_price      = $request->product_dealer_price;
        $product->product_brand             = $request->product_brand;
        $product->product_meta_title        = $request->product_meta_title;
        $product->product_meta_keywords     = $request->product_meta_keywords;
        $product->product_meta_description  = $request->product_meta_description;
        $product->product_status            = $request->product_status;
        $product->product_visibility        = $request->product_visibility;
        $product->product_category          = (isset($request->product_category)) ? json_encode($request->product_category) : NULL;
        // $product->product_tags              = $request->product_tags;
        $product->product_short_description = $request->product_short_description;

        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;

        if ($request->date_range != null) {
            $date_var               = explode(" to ", $request->date_range);
            $product->discount_start_date = strtotime($date_var[0]);
            $product->discount_end_date   = strtotime($date_var[1]);
        }

        $choice_options = array();

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);
        $product->save();
        //choices


        $options = array();



        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }
                array_push($options, $data);
            }
        }




        //Generates the combinations of customer choice options
        $combinations = Combinations::makeCombinations($options);
        if (count($combinations[0]) > 0) {
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination) {
                $str = '';
                foreach ($combination as $key => $item) {
                    if ($key > 0) {
                        $str .= '-' . str_replace(' ', '', $item);
                    } else {

                        $str .= str_replace(' ', '', $item);
                    }
                }
                $product_stock = ProductStocks::where('product_id', $product->id)->where('variant', $str)->first();
                if ($product_stock == null) {
                    $product_stock = new ProductStocks;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_' . str_replace('.', '_', $str)];
                $product_stock->image = $request['img_' . str_replace('.', '_', $str)];
                $product_stock->save();
            }
        } else {
            $product_stock              = new ProductStocks;
            $product_stock->product_id  = $product->id;
            $product_stock->variant     = '';
            $product_stock->price       = $request->unit_price;
            $product_stock->sku         = $request->sku;
            $product_stock->qty         = $request->current_stock;
            $product_stock->save();
        }




        flash("Product has been added successfully!")->success();
        return redirect('/admin/products/all-products');
    }



    public function all_products()
    {
        $data['products']   =  DB::table('products')->orderBy('id', 'DESC')->get();

        /* $data['products'] = DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('products.*', 'product_images.*')
            ->get(); */

        // $data['products'] = DB::table('products')->get();

        // $data['product_variations']        =  DB::table('products')
        //   $data        = Products::with('');
        /*  $data       =  DB::table('products') */
        /*   ->join('product_stocks',  'product_stocks.product_id', '=', 'products.id')
            ->select('variant', 'product_id', 'qty', 'product_title', 'unit_price', 'thumbnail_img', 'product_category', 'stock_status')
            ->get()
            ->groupby('product_title')->distinct(); */

        return view('admin.products.products', $data);
    }

    public function edit_product($id)
    {
        //this will check id exist or not in the database.
        Products::findOrfail($id);
        $data['brands']                 = DB::table('brands')->get();
        $data['categories']             = DB::table('categories')->get();


        /*        $data['product_gallery']        =  DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('product_gallery', 'product_id', 'image_id')
            ->where('product_id', $id)
            ->get(); */

        $data['product']                = Products::findOrfail($id);


        return view('admin.products.edit-product', $data);
    }

    public function update_product(Request $request)
    {
        echo  $id = $request->id;

        // print_r($request->all());

        $product = Products::find($id);


        $product->product_title             = $request->product_title;
        $product->slug                      = $request->product_title;
        $product->thumbnail_img             = $request->thumbnail_img;
        $product->product_description       = $request->product_description;
        $product->product_stocks            = $request->product_stocks;
        $product->stock_status              = $request->stock_status;
        $product->unit_price                = $request->unit_price;
        $product->product_dealer_price      = $request->product_dealer_price;
        $product->discount                  = $request->discount;
        // $product->product_sku               = $request->product_sku;
        $product->product_brand             = $request->product_brand;
        //(isset($request->product_brand)) ? $request->product_brand : NULL;
        $product->product_meta_title        = $request->product_meta_title;
        $product->product_meta_keywords     = $request->product_meta_keywords;
        $product->product_meta_description  = $request->product_meta_description;
        $product->product_status            = $request->product_status;
        $product->product_visibility        = $request->product_visibility;
        $product->product_stocks            = "NULL";
        $product->product_category          = (isset($request->product_category)) ? $request->product_category : NULL;
        $product->product_tags              = (isset($request->product_tags)) ? $request->product_tags : NULL;
        $product->product_short_description = $request->product_short_description;



        if ($request->date_range != null) {
            $date_var               = explode(" to ", $request->date_range);
            $product->discount_start_date = strtotime($date_var[0]);
            $product->discount_end_date   = strtotime($date_var[1]);
        }


        $choice_options = array();

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }



        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options);
        $product->save();
        //choices


        $options = array();



        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;
                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }
                array_push($options, $data);
            }
        }




        //Generates the combinations of customer choice options
        $combinations = Combinations::makeCombinations($options);
        if (count($combinations[0]) > 0) {
            $product->variant_product = 1;
            foreach ($combinations as $key => $combination) {
                $str = '';
                foreach ($combination as $key => $item) {
                    if ($key > 0) {
                        $str .= '-' . str_replace(' ', '', $item);
                    } else {

                        $str .= str_replace(' ', '', $item);
                    }
                }


                $product_stock = ProductStocks::where('product_id', $product->id)->where('variant', $str)->first();
                if ($product_stock == null) {
                    $product_stock = new ProductStocks;
                    $product_stock->product_id = $product->id;
                }

                $product_stock->variant = $str;
                $product_stock->price = $request['price_' . str_replace('.', '_', $str)];
                $product_stock->sku = $request['sku_' . str_replace('.', '_', $str)];
                $product_stock->qty = $request['qty_' . str_replace('.', '_', $str)];
                $product_stock->image = $request['img_' . str_replace('.', '_', $str)];
                $product_stock->save();
            }
        } else {
            $product_stock              = new ProductStocks;
            $product_stock->product_id  = $product->id;
            $product_stock->variant     = '';
            $product_stock->price       = $request->unit_price;
            $product_stock->sku         = $request->sku;
            $product_stock->qty         = $request->current_stock;
            $product_stock->save();
        }

        $product->save();

        //  $result = $product->save();
        flash("Product updated successfully!")->success();
        return redirect(route('admin.all_products'));
    }



    public function edit_product_image_delete($id)
    {

        $ids = $id;
        $ids = explode(",", $ids);
        $image_id  = $ids[0];
        $product_id  = $ids[1];

        // print_r($ids);


        //  $request->imageid;
        // echo $id;

        //getting name using id of image 
        $getname = DB::table('product_images')->where('image_id', $image_id)->get()->first();

        //this will delete image from folder id based!
        $this->removeImage('/images/uploads/products/' . "/" . $product_id . "/", $getname->product_gallery);
        $result = DB::table('product_images')->where('image_id', $image_id)->delete();
        //return $this->resultCheck($result, 'Product gallery image has Deleted!');
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }



    public function view_product($id)
    {
        /* $data['product_gallery']        =  DB::table('products')
            ->join('product_images', 'products.id', '=', 'product_images.product_id')
            ->select('product_gallery', 'product_id', 'image_id')
            ->where('product_id', $id)
            ->get(); 
 */
        $data['product_variations'] =  DB::table('products')
            /*  $data       =  DB::table('products') */
            ->join('product_stocks', 'products.id', '=', 'product_stocks.product_id')
            ->select('variant', 'product_id', 'qty')
            ->where('product_id', $id)
            ->get();


        // print_r($bit->qty);
        // array_sum($bit->qty);
        //  die;
        //$product = DB::table('products')->join('categories','categories.id',DB::Raw("CAST(products.product_category->'$.id' AS UNSIGNED)"))->get()->first();
        //print_r(DB::table('products')->join('categories','categories.id',DB::Raw("JSON_CONTAINS(products.product_category, 'categories.id')"))->get()->first());
        $data['product'] = DB::table('products')->where('id', $id)->get()->first();
        return view('admin.products.view-product', $data);
    }



    public function delete_product(Request $request)
    {
        $id = $request->id;



        $result = DB::table('products')->where('id', $id)->delete();
        $result = DB::table('product_stocks')->where('id', $id)->delete();

        flash("Product has been deleted successfully!")->success();
        return back();
    }

    /*********************************************
     * ****** End Of products function parts*********
     *****************************************
     *********************************************/





    public function product_excel_export()
    {
        return view('admin.products.product-excel');
    }


    public function product_export()
    {
        //dd('export ');
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function product_import(Request $request)
    {
        $result = Excel::import(new ProductImport, $request->file('file'));
        flash("Excel has imported successfully!")->success();
        return back();
    }
}
