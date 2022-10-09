<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show($id)
    {
        $topic = Topic::with(["posts.user"])->find($id);
        return view("pages.topic.show", ["topic" => $topic]);
    }
}
