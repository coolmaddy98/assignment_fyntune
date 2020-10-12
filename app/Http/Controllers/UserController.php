<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request){

        $title ="Blogging";
        if($request->has('title') && $request->get("title") !="")
        $blogs = Blog::where('status',1)->where('title','like','%'.$request->get('title').'%')->paginate(2);
        else
        $blogs = Blog::where('status',1)->paginate(2);

        $categories =Category::all();
        return view("front.index",compact('title','blogs','categories'));
    }

    public function categoryBlog($id){
        $title ="Blogging";
        if(!$id)
            $blogs = Blog::where('status',1)->paginate(2);
        else
            $blogs = Blog::where('status',1)->where('cat_id',$id)->paginate(2);
        $categories = Category::all();
        return view("front.index",compact('title','blogs','categories'));
    }
}
