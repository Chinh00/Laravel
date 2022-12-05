<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function product(){
        $products = DB::table("categories")->join("products", "products.category_id", "=", "categories.id")->join("product_images", "product_images.product_id", "=", "products.id")->get();
        return response()->json($products);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $product_sale = DB::table("products")->select("products.id", "products.slug", "products.name", "products.price", "products.sale_price", "product_images.image")->whereNot("products.price", "products.sale_price")->join("product_images", "product_images.product_id", "=", "products.id")->get();

        $products = DB::table("products")->select("products.id", "products.slug", "products.name", "products.price", "products.sale_price", "product_images.image")->join("product_images", "product_images.product_id", "=", "products.id")->get();
        $cate = DB::table("categories")->get();
        return view("welcome", compact("cate", "products", "product_sale"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function quickView($id)
    {
        $product = DB::table("products")->where("products.id", $id)->join("product_images", "product_images.product_id", "=", "products.id")->get();
        $a = explode("|", $product[0]->images);
        return view("quickView", compact("product", "a"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function contact(){
        return view("contact");
    }
    public function about(){
        return view("about");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function news()
    {

        $new = DB::table("news")->where("status", "1")->get();
        return view("blog", compact("new"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
