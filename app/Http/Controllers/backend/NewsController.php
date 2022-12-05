<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function postEdit(Request $request){
        if(isset($request->image)){
            $image = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path("images"), $image);
            DB::table("news")->where("id", $request->id)->update([
                "header" => $request->header_name,
                "content" => $request->description,
                "created_at" => date('Y-m-d H:i:s'),
                "image" => $image, 
                "status" => $request->status
            ]);        
        } else {
            
            DB::table("news")->where("id", $request->id)->update([
                "header" => $request->header_name,
                "content" => $request->description,
                "created_at" => date('Y-m-d H:i:s'),
                "status" => $request->status
            ]);

        }
        return redirect("/admin/news/list");

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request){
        $image = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $image);
        DB::table("news")->insert([
            "header" => $request->header_name,
            "content" => $request->description,
            "created_at" => date('Y-m-d H:i:s'),
            "image" => $image,
            "status" => $request->status
        ]);
        return redirect("/admin/news/list");
    }
    public function index()
    {
        $news = DB::table("news")->get();
        return view("backend.pages.news.news_list", compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.pages.news.news_add");
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
        if(File::exists(public_path("images/". (DB::table("news")->where("id", $request->id)->get()[0]->image)))){
            File::delete(public_path("images/". (DB::table("news")->where("id", $request->id)->get()[0]->image)));
        }
        DB::table("news")->where("id", $request->id)->delete();
        
        return redirect("/admin/news/list");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = DB::table("news")->where("id", $id)->get();
        return view("backend.pages.news.news_edit", compact("new"));
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
