<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $title= "Blogs List";
        $blogs = Blog::where('user_id',auth()->user()->id)->paginate(2);
        return view("admin.index",compact('title','blogs'));
    }
}
