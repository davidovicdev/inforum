<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function show($id)
    {
        $topic = Topic::with(["posts.user"])->find($id);
        return view("pages.topic.show", ["topic" => $topic]);
    }
    public function destroyPost($postId)
    {
        try {
            Post::destroy($postId);
            return redirect()->back()->with(["success" => "Successfully deleted post"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function destroy($topicId)
    {
        try {
            Topic::destroy($topicId);
            return redirect()->back()->with(["success" => "Successfully deleted topic"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function storePost(Request $request)
    {
        try {
            $userId = session("user")->id;
            DB::beginTransaction();
            Post::insert([
                "topic_id" => $request->topicId,
                "user_id" => $userId,
                "text" => $request->post,
                "created_at" => Carbon::now("Europe/Belgrade")

            ]);
            DB::commit();
            return redirect()->back()->with(["success" => "Successfully posted post"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
}
