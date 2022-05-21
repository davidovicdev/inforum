<?php

namespace App\Http\Controllers;


class PageController extends Controller
{
    public function index()
    {
        return view("pages.index");
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
