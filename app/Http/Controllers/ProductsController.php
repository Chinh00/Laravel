<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductsController extends Controller
{
    public function index(){
        $products  = DB::table("products")->select("products.id", "products.name", "products.price", "products.sale_price", "products.slug",  "product_images.image", "product_images.images")->join("product_images", "product_images.product_id", "=", "products.id")->paginate(4);
        if(isset($product)){
            $a = explode("|", $products[0]->images);

        } else {
            $a = [];
        }
        return view("products", compact("products", "a"));
    }
    public function product($slug, $id){
        $product = DB::table("products")->select("products.id", "products.content", "products.name", "products.price", "products.sale_price", "product_images.image", "product_images.images", "products.description")->where("products.id", $id)->join("product_images", "product_images.product_id", "=", "products.id")->get();
        if(isset($product)){
            $a = explode("|", $product[0]->images);

        } else {
            $a = [];
        }
        $b = json_decode($product[0]->content);
        $a[] = $product[0]->image;
        $products = DB::table("products")->select("products.id", "products.content", "products.name", "products.price", "products.sale_price", "product_images.image", "product_images.images", "products.description")->join("product_images", "product_images.product_id", "=", "products.id")->take(10)->get();

        return view("product_detail", compact("product", "a", "b", "products"));
    }
    public function category($slug){
        
        $products = DB::table("products")
        ->select("products.id", "products.name", "products.price", "products.sale_price", "products.slug",  "product_images.image", "product_images.images")
        ->join("categories", "categories.id", "=", "products.category_id")
        ->join("product_images", "product_images.product_id", "=", "products.id")
        ->where("categories.slug", $slug)
        ->paginate(2);
        return view("products", compact("products"));
    }
}
