<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function postCheckout(Request $request){
        DB::table("transactions")->insert([
            "fullname" => $request->fullname,
            "phone" => $request->phone,
            "address" => $request->address . "," . $request->city . ", " . $request->state . ", " . $request->xa, 
            "email" => $request->email, 
            "order_id" => (DB::table("orders")->select("id")->where("user_id", session()->get("user_id"))->get()[0]->id),   
            "mode" => "1",
            "status" => "0",
            "subtotal" => (DB::table("orders")->select("subtotal")->where("user_id", session()->get("user_id"))->get()[0]->subtotal),
            "created_at" => date('Y-m-d H:i:s')
        ]);
        DB::table("orders")->where("user_id", session()->get("user_id"))->update([
            "status" => "1",
        ]);
        Mail::to($request->email)->send(new SendMail());
        return redirect("success");
    }
    public function index(Request $request){
        $order = DB::table("orders")->select("orders.subtotal","order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->where("orders.user_id", $request->session()->get("user_id"))->where("orders.status", "0")->join("order_detail", "order_detail.order_id", "=", "orders.id")->groupBy("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id" , "orders.subtotal")->get();
        $count = $order->count();
        return view("cart", compact("order", "count"));
    }
    public function checkout(){

        $order = DB::table("orders")->select("orders.subtotal", "order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id")->where("orders.user_id", session()->get("user_id"))->where("orders.status", "0")->join("order_detail", "order_detail.order_id", "=", "orders.id")->groupBy("order_detail.quantity", "order_detail.name", "order_detail.price", "order_detail.total", "order_detail.product_id", "orders.subtotal")->get();

        $user = DB::table("users")->where("id", session()->get("user_id"))->get();
        return view("checkout", compact("user", "order"));
    }
    public function postCart(Request $request){
        $user_id = $request->session()->get("user_id");
        $prd = DB::table("products")->select("products.id", "products.name", "products.sale_price", "product_images.image")->where("products.id", $request->product_id)->join("product_images", "product_images.product_id", "=", "products.id")->get();
        $total = (isset($request->quantity) ? $request->quantity : 1) * $prd[0]->sale_price;
        
        if(DB::table("orders")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->get()->count() == 0){
            DB::table("orders")->insert([
                "user_id" => $request->session()->get("user_id"),
                "status" => "0", 
                "subtotal" => $total,
            ]);
            DB::table("order_detail")->insert([
                "order_id" => DB::table("orders")
                    ->select("id")
                    ->where("user_id", $request->session()->get("user_id"))->where("status", "0")
                    ->get()[0]->id,
                "product_id" => $request->product_id,
                "quantity" => (isset($request->quantity) ? $request->quantity : 1),
                "name" => $prd[0]->name,
                "price" => $prd[0]->sale_price,
                "total" => $total,
            ]);

        } else {
            if( DB::table("orders")->join("order_detail", "orders.id", "=", "order_detail.order_id")->where("order_detail.product_id", $request->product_id)->where("status", "0")->get()->count() > 0){
                $product = DB::table("order_detail")->where("order_id", (DB::table("orders")->select("id")->where("user_id", $request->session()->get("user_id"))->get()[0]->id ))->where("product_id", $request->product_id)->get();
                if(isset($request->quantity)){
                    DB::table("order_detail")->where("order_id", (DB::table("orders")->select("id")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->get()[0]->id ))->where("product_id", $request->product_id)
                    ->update([
                        "total" => $product[0]->total + $product[0]->price * $request->quantity ,
                        "quantity" => $request->quantity + $product[0]->quantity,                         
                    ]);
                } else {
                    DB::table("order_detail")->where("order_id", (DB::table("orders")->select("id")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->get()[0]->id ))->where("product_id", $request->product_id)
                    ->update([
                        "total" => $product[0]->total + $product[0]->price  ,
                        "quantity" => 1 + $product[0]->quantity,                         
                    ]);
                }
                DB::table("orders")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->update([
                    "subtotal" => DB::table("orders")->where("user_id", $request->session()->get("user_id"))->get()[0]->subtotal + (isset($request->quantity) ? $request->quantity : 1 ) * $product[0]->price,
                ]);
            } else {
                DB::table("order_detail")->insert([
                    "order_id" => DB::table("orders")
                        ->select("id")
                        ->where("user_id", $request->session()->get("user_id"))->where("status", "0")
                        ->get()[0]->id,
                    "product_id" => $request->product_id,
                    "quantity" => (isset($request->quantity) ? $request->quantity : 1),
                    "name" => $prd[0]->name,
                    "price" => $prd[0]->sale_price,
                    "total" => $total,
                ]);
                DB::table("orders")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->update([
                    "subtotal" => DB::table("orders")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->get()[0]->subtotal + (isset($request->quantity) ? $request->quantity : 1 ) * $prd[0]->sale_price,
                ]);
            }
            
        }
        
        return redirect("/cart");
    }

    public function delete(Request $request){
        $product = DB::table("order_detail")->where("order_id", (DB::table("orders")->select("id")->where("user_id", $request->session()->get("user_id"))->where("orders.status", "0")->get()[0]->id ))->where("product_id", $request->product_id)
        ->get();

        DB::table("order_detail")->where("order_id", (DB::table("orders")->select("id")->where("user_id", $request->session()->get("user_id"))->where("orders.status", "0")->get()[0]->id ))->where("product_id", $request->product_id)
        ->delete();
        
        DB::table("orders")->where("user_id", $request->session()->get("user_id"))->update([
                "subtotal" => DB::table("orders")->select("subtotal")->where("user_id", $request->session()->get("user_id"))->where("status", "0")->get()[0]->subtotal - ( $product[0]->total)
            ]);
        return redirect()->back();
    }
}
