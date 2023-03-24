<?php

namespace App\Http\Controllers;

use App\Models\siteBlogs;
use Illuminate\Http\Request;

class frontBlogController extends Controller
{
    public function index()
    {
        $blogs = siteBlogs::all();
        return view('front.blog.index',['data'=>$blogs]);

    }
    public function detail(siteBlogs $blog)
    {
        $blogs = siteBlogs::all();
        return view('front.blog.detail',['data'=>$blogs,'blog'=>$blog]);
    }
}
