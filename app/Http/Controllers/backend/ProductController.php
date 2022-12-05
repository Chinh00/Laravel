<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table("products")->select("products.id", "products.name", "products.price", "products.quantity", "products.category_id", "products.status", "products.slug", "product_images.image")->join("product_images", "products.id", "=", "product_images.product_id")->get();
        return view("backend.pages.products.product_list", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = DB::table("categories")->select("id", "category_name")->where("status", "1")->get();
        return view("backend.pages.products.product_add", compact("cate"));
    }
    public function postCreate(Request $request){
        $a = json_encode([
            "weight" => $request-> weight, 
            "display_func" => $request-> display_func,
            "display_px" => $request-> display_px,
            "os" => $request-> os,
            "sim" => $request-> sim,
            "pin" => $request-> pin,
            "rom" => $request-> rom,
            "ram" => $request-> ram,
            "cpu" => $request-> cpu,
            "camera_before" => $request-> camera_before,
            "camera_after" => $request-> camera_after,
            "display_technology" => $request-> display_technology,
            "display_size" => $request-> display_size,
        ]);
        DB::table("products")->insert([
            "name" => $request->name,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
            "status" => $request->status,
            "slug" => $request->slug,
            "featured" => $request->featured,
            "content" => $a,
            "created_at" => date('Y-m-d H:i:s'),
            "sale_price" => (isset($request->sale_price)) ? $request->sale_price: $request->price ,
            "description" => $request->description
        ]);
        $id = DB::table("products")->select("id")->orderBy("id", "DESC")->get();
        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $image);
        $s = [];
        foreach($request->images as $key){
            $str = md5(rand(1, 10000)) . '.' . $key->getClientOriginalExtension();
            $key->move(public_path("images"), $str);
            array_push($s, $str);
        }
        $s = implode( "|", $s);
        DB::table("product_images")->insert([
            "product_id" => $id[0]->id,
            "image" => $image,
            "images" => $s,
            "created_at" => date('Y-m-d H:i:s')
        ]);
        return redirect("/admin/product/list");
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function delete(Request $request){
        $prd = DB::table("product_images")->where("product_id", $request->id)->get();
        $a = [];
        $a = explode("|", $prd[0]->images);
        if(File::exists(public_path("images/". $prd[0]->image))){
            File::delete(public_path("images/". $prd[0]->image));
        }
        

        foreach($a as $key => $val){
            if(File::exists(public_path("images/". $val))){
                File::delete(public_path("images/". $val));
            }
        }
        
        DB::table("product_images")->where("product_id", $request->id)->delete();
        DB::table("products")->where("id", $request->id)->delete();
        return redirect("/admin/product/list");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $cate = DB::table("categories")->select("id", "category_name")->where("status", "1")->get();
        $product = DB::table("products")->select("products.*", "product_images.image", "product_images.images")->where("products.id", $request->id)->join("product_images", "products.id", "=", "product_images.product_id")->get();
        return view("backend.pages.products.product_edit", compact("product", "cate"));

    }
    public function postEdit(Request $request){
        
        if($request->image != null){
            if(File::exists(public_path("images/". DB::table("product_images")->select("image")->where("product_id", $request->id)->get()[0]->image))){
                File::delete(public_path("images/". DB::table("product_images")->select("image")->where("product_id", $request->id)->get()[0]->image));
            }
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path("images"), $image);
            DB::table("product_images")->where("product_id", $request->id)->update([
                "image" => $image
            ]);
            
        }
        if ($request->images != null){
            $a = explode("|", DB::table("product_images")->select("images")->where("product_id", $request->id)->get()[0]->images);
            foreach($a as $key => $val){
                if(File::exists(public_path("images/". $val))){
                    File::delete(public_path("images/". $val));
                }
            }
            $s = [];
            foreach($request->images as $key){
                $str = md5(rand(1, 10000)) . '.' . $key->getClientOriginalExtension();
                $key->move(public_path("images"), $str);
                array_push($s, $str);
            }
            $s = implode( "|", $s);
            DB::table("product_images")->where("product_id", $request->id)->update([
                "images" => $s
            ]);
        }
        $a = json_encode([
            "weight" => $request-> weight, 
            "display_func" => $request-> display_func,
            "display_px" => $request-> display_px,
            "os" => $request-> os,
            "sim" => $request-> sim,
            "pin" => $request-> pin,
            "rom" => $request-> rom,
            "ram" => $request-> ram,
            "cpu" => $request-> cpu,
            "camera_before" => $request-> camera_before,
            "camera_after" => $request-> camera_after,
            "display_technology" => $request-> display_technology,
            "display_size" => $request-> display_size,
        ]);
        DB::table("products")->where("id", $request->id)->update([
            "name" => $request->name,
            "price" => $request->price,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
            "status" => $request->status,
            "slug" => $request->slug,
            "featured" => $request->featured,
            "content" => $a,
            "updated_at" => date('Y-m-d H:i:s'),
            "sale_price" => (isset($request->sale_price)) ? $request->sale_price: $request->price,
            "description" => $request->description
        ]);
        return redirect("/admin/product/list");
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
