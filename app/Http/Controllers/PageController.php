<?php

namespace App\Http\Controllers;

use App\Models\Forum;

class PageController extends Controller
{
    public function index()
    {
        $forums = Forum::withCount(["topics", "posts"])->get();
        return view("pages.index", ["forums" => $forums]);
    }
    public function contact()
    {
        return view("pages.contact");
    }
    public function about()
    {
        return view("pages.about");
    }
    public function aboutAuthor()
    {
        return view("pages.aboutAuthor");
    }
}
