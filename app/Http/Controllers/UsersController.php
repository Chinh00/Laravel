<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login(Request $request){

        $request->validate([
            
        ]);
        $user = DB::table("users")->where("user_name", $request->user_name)->get();

        if( $user->count() > 0 ) 
            if( Hash::check($request->password, $user[0]->password)){
                $request->session()->put("user_id", $user[0]->id);
                return redirect()->back();
            }


        return redirect()->back();
        
    }

    public function logout(Request $request){
        $request->session()->forget("user_id");
        return redirect()->back();
    }

    public function signin(Request $request){
        DB::table("users")->insert([
            "user_name" => $request->user_name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "is_admin" => "0",
            "created_at" => date('Y-m-d H:i:s'),
        ]);
        return redirect()->back();
    }
}
