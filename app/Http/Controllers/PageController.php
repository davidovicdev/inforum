<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Topic;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $forums = Forum::withCount(["topics", "posts"])->get();
        dd($forums);
        $membersCount = User::count();
        $lastMember = User::latest()->first();
        $topicsCount = Topic::count();
        return view("pages.index", ["forums" => $forums, "lastMember" => $lastMember, "membersCount" => $membersCount, "topicsCount" => $topicsCount]);
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
