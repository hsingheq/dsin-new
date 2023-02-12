<?php

namespace App\Http\Controllers\Admin\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Products;
use App\Models\Brands;
use App\Models\ShoppingCart;


class ProductApiController extends Controller
{
    public function our_products()
    {
        $data = DB::table('products')
            ->join('uploads', 'uploads.id' ,'products.thumbnail_img' )
            ->select('product_title','product_category','file_name','unit_price','products.slug','products.id')
            ->get();
      
         
         $res =  [
            'success'   => true,
            'data'      => $data,
            'currency'  => get_setting('currency'),
           'message'    => 'getting categories..'
         ]; 

         $vals =  response()->json($res); 
        
         return $vals;
  
    }


    public function best_selling_products()
    {
        $data = DB::table('products')
            ->join('uploads', 'uploads.id' ,'products.thumbnail_img' )
            ->select('product_title','product_category','file_name','unit_price','products.slug','products.id')
            ->get();
      
         
         $res =  [
            'success'   => true,
            'data'      => $data,
            'currency'  => get_setting('currency'),
           'message'    => 'getting categories..'
         ]; 
         
         $vals =  response()->json($res); 
        
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
         $data=[
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'user_id' =>  $uid,

        ];
       
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
}
