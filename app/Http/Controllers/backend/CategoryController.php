<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::table("categories")->get();
        return view("backend.pages.category.category_list", compact("categories"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent = DB::table("categories")->get();
        return view("backend.pages.category.category_add", compact("parent"));
    }
    
    public function postCreate(Request $request){
        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $image);
        DB::table("categories")->insert([
            "category_name" => $request->name,
            "slug" => $request->slug,
            "status" => $request->status,
            "image" =>  $image,
            "created_at" => date('Y-m-d H:i:s'),
        ]);
        return redirect("/admin/categories/list");
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table("categories")->where("id", $id)->get();
        $parent = DB::table("categories")->whereNot('id', $id)->get();
        return view("backend.pages.category.category_edit", compact("category", "parent"));

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
        if(isset($request->image)){
            if(File::exists(public_path("images/". DB::table("categories")->select("image")->where("id", $id)->get()[0]->image))){
                File::delete(public_path("images/". DB::table("categories")->select("image")->where("id", $id)->get()[0]->image));
            }
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path("images"), $image);
            DB::table("categories")->where("id", $id)->update([
                "category_name" => $request->name,
                "slug" => $request->slug,
                "status" => $request->status,
                "image" => $image,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
            
        } else {
            DB::table("categories")->where("id", $id)->update([
                "category_name" => $request->name,
                "slug" => $request->slug,
                "parent_id" => $request->parent_id,
                "status" => $request->status,
                "updated_at" => date('Y-m-d H:i:s')
            ]);
        }
        
        
        return redirect("/admin/categories/list");
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
