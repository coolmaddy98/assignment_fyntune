<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function add(){

        $categories =Category::all();
        return view("admin.blog.add",compact('categories'));
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

    public function edit($id){

        $title = "Edit bLog";
        $categories =Category::all();
        $blog = Blog::find($id);
        return view("admin.blog.edit",compact('title','categories','blog'));
    }

    public function update($id,Request $request){
        $data = $request->all();
        $blog =Blog::find($id)->update($request->except('_token'));
        return redirect()->route("admin.index")->with("success","Blog update successfully");
    }

    public function delete($id){
        $blog =Blog::find($id)->update(['status'=>0]);
        return redirect()->route("admin.index")->with("success","Blog Deleted successfully");
    }

}
