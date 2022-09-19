<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show($id)
    {
        $topic = Topic::find($id);
        return view("pages.topic.show", ["topic" => $topic]);
    }
}
