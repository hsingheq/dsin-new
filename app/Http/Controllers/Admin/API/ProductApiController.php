<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Products;
use App\Models\Brands;
use App\Models\ShoppingCart;
use App\Models\Attribute;
use App\Models\AttributeOptions;


class ProductApiController extends Controller
{
    public function our_products(Request $requestss)
    {
        $data = DB::table('products')
            ->leftJoin('uploads', 'uploads.id' ,'products.thumbnail_img' )
            ->select('products.id','product_title','product_category','file_name','unit_price','products.slug','products.id')
            ->orderBy('id', 'DESC');

        if($requestss->categories){
            $category = $requestss->categories;
            $data = $data->Where(function ($query) use($category) {
                for ($i = 0; $i < count($category); $i++){
                $query->orwhere('product_category', 'like',  '%' . $category[$i] .'%');
                }      
            });
        }

        if($requestss->checkedColors){
            $color = $requestss->checkedColors;
            $data->orwhere('choice_options', 'like',  '%' . $color .'%');
        }

        if($requestss->checkedSize){
            $size = $requestss->checkedSize;
            $data = $data->Where(function ($query) use($size) {
                for ($i = 0; $i < count($size); $i++){
                $query->orwhere('choice_options', 'like',  '%' . $size[$i] .'%');
                }      
            });
        }
        
        
        if($requestss->checkedBrand){
            $brand = $requestss->checkedBrand;
            $data = $data->Where(function ($query) use($brand) {
                for ($i = 0; $i < count($brand); $i++){
                $query->orwhere('product_brand', $brand[$i]);
                }      
            });
        }

        if($requestss->sorting == 'latest'){
            
        }else if($requestss->sorting == 'new'){

        }else{

        }

        $data = $data->paginate($requestss->perPage);
        $result =  array (
					'success'   => true,
					'data'      => $data,
					'currency'  => get_setting('currency'),
					'message'    => 'getting categories..'
				); 
        return response()->json($result); 
    }

    public function new_arriaval_products()
    {
        $data = DB::table('products')
            ->leftJoin('uploads', 'uploads.id' ,'products.thumbnail_img' )
            ->select('products.id','product_title','product_category','file_name','unit_price','products.slug','products.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);
      
         
        $result =  array (
					'success'   => true,
					'data'      => $data,
					'currency'  => get_setting('currency'),
					'message'    => 'getting categories..'
				); 
        $vals =  response()->json($result); 
        return $vals;
    }

    public function best_selling_products()
    {
        $data = DB::table('products')
            ->leftJoin('uploads', 'uploads.id' ,'products.thumbnail_img' )
            ->select('products.id','product_title','product_category','file_name','unit_price','products.slug','products.id')
            ->orderBy('id', 'DESC')
            ->paginate(10);
      
         
        $result =  array (
					'success'   => true,
					'data'      => $data,
					'currency'  => get_setting('currency'),
					'message'    => 'getting categories..'
				); 
        $vals =  response()->json($result); 
        return $vals;
    }

    public function  get_product(Request $request){
        $slug = $request->slug;
        $product = Products::where('slug',$slug)->get()->first();
        return response()->json(['response'=> $product]); 
    }

   
    public function  get_brand(Request $request){
        $slug = $request->slug;
        $brand = Brands::where('slug',$slug)->get()->first();
        return response()->json(['response'=> $brand]); 
    }

    public function addToCart(Request $request){
        $uid = $request->uid;
         $data=array (
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'user_id' =>  $uid,
			);
        ShoppingCart::updateOrCreate($data); 
        return response()->json(['response'=> $data]);
    }


    public function getCartItemsCount(Request $request){
        $uid = $request->user_id;
        $data =   ShoppingCart::where('user_id',$uid)->get();
       
        //ShoppingCart::updateOrCreate($data); 
        return response()->json(['response'=> $data]);
    }



    public function getCartItems(Request $request){
        $uid = $request->user_id;
     // $data  = DB::raw($request->user_id);
        // $data =  ShoppingCart::where('user_id',$uid)->get();
         
        $data =  DB::table('shopping_carts')
         ->join('users',function ($join) use ($uid){
          //multiple conditions
          $join->on('users.id','=', DB::raw("'".$uid."'"));
         })
         ->join('products','products.id','shopping_carts.product_id')
         ->join('uploads','uploads.id','products.thumbnail_img')
         ->get();  
       
        
          return response()->json(['response'=> $data]);
    }

    public function getAtribute(Request $request)
    {
        $colors = AttributeOptions::where('attribute_id',1)->get();
        foreach($colors as $key => $value) {
            $value->totalProduct = Products::where('choice_options', 'like',  '%' . $value->value .'%')->count();
        }
        $size = AttributeOptions::where('attribute_id',2)->get();
        foreach($size as $key => $value) {
            $value->totalProduct = Products::where('choice_options', 'like',  '%' . $value->value .'%')->count();
        }
        $brands = Brands::get();
        foreach($brands as $key => $value) {
            $value->totalProduct = Products::where('product_brand', $value->id)->count();
        }

        $data = array(
            'colors' => $colors,
            'size' => $size,
            'brands' => $brands,
        );

        return response()->json(['response'=> $data]);
    }
}
