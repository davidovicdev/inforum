<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\Post;
use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\For_;

class TopicController extends Controller
{
    public function show($id)
    {
        $topic = Topic::with(["posts.user"])->findOrFail($id);
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
    public function lock($topicId)
    {
        $topicName = "";
        try {
            DB::beginTransaction();
            $topic = Topic::findOrFail($topicId);
            $topic->locked = 1;
            $topicName = $topic->name;
            $topic->save();
            DB::commit();
            return redirect()->back()->with(["lock" => "Successfully locked $topicName"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function unlock($topicId)
    {
        $topicName = "";
        try {
            DB::beginTransaction();
            $topic = Topic::findOrFail($topicId);
            $topic->locked = 0;
            $topicName = $topic->name;
            $topic->save();
            DB::commit();
            return redirect()->back()->with(["unlock" => "Successfully unlocked $topicName"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function create($forumId)
    {
        $forum = Forum::findOrFail($forumId);
        return view("pages.topic.create", ["forum" => $forum]);
    }
    public function store(Request $request)
    {
        try {
            $forumId = $request->forumId;
            $forumName = Forum::findOrFail($forumId)->name;
            DB::beginTransaction();
            Topic::insert([
                "forum_id" => $forumId,
                "name" => $request->name,
                "locked" => 0,
                "created_at" => Carbon::now("Europe/Belgrade")
            ]);
            DB::commit();
            return redirect()->route("index")->with(["store" => "Successfully added new topic to $forumName"]);
        } catch (\Throwable $th) {
            echo $th->getMessage();
            DB::rollBack();
        }
    }
}
