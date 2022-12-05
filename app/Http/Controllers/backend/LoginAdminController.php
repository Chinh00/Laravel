<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginAdminController extends Controller{
    //

    public function index(){
        return view("backend.pages.index");
    }
    public function login(){
        if (!Auth::check()){
            return view("backend.pages.login");

        } else {
            return redirect()->back();
        }
    }
    public function postLogin(Request $request){
        if (Auth::attempt(["user_name" => $request->user_name, "password" => $request->password, "is_admin" => "1"])){
            return redirect("admin/dashboard");
        }
        
        
    }
    public function logout(){
        Auth::logout();
        return redirect("/admin/login");
    }
}
