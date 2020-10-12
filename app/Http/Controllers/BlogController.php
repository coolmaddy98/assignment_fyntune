<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function add(){

        $title = "Add new bLog";
        $categories =Category::all();
        return view("admin.blog.add",compact('title','categories'));
    }

    public function create(Request $request){
        $data = $request->all();
        $blog = new Blog([
                'title' =>$data["title"],
                'description' =>$data["description"],
                'user_id' =>auth()->user()->id,
                'cat_id' =>$data["cat_id"],
                'status' =>1
            ]
        );
        $blog->save();
        return redirect()->route("admin.index")->with("success","Blog added successfully");
    }

}
