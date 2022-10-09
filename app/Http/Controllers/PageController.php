<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;

class PageController extends Controller
{
    public function index()
    {
        $forums = Forum::with(["topics.posts"])->withCount(["topics", "posts"])->get();
        $membersCount = User::count();
        $lastMember = User::latest()->first();
        $topicsCount = Topic::count();
        $activeUsers = User::where("is_active", 1)->get();
        $activeUsersCount = User::where("is_active", 1)->count();
        return view("pages.index", ["activeUsersCount" => $activeUsersCount, "forums" => $forums, "lastMember" => $lastMember, "membersCount" => $membersCount, "topicsCount" => $topicsCount, "activeUsers" => $activeUsers]);
    }

    public function aboutAuthor()
    {
        return view("pages.aboutAuthor");
    }
}
