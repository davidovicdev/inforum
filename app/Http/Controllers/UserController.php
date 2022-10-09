<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\EyeColor;
use App\Models\Friend;
use App\Models\Gender;
use App\Models\HairColor;
use App\Models\InterestedIn;
use App\Models\Profession;
use App\Models\StatusOfRelationship;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::select(["id", "is_active", "avatar", "is_admin", "username", "email", "created_at"])->withCount("posts")->get();
        return view("pages.users.index", compact("users"));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
        $user = User::with(["city", "profession", "interestedIn", "statusOfRelationship", "gender", "eyeColor", "hairColor", "posts", "userComments", "friends"])->withCount('posts')->findOrFail($id);
        $friendIds = [];
        $friendships1 = Friend::where("user_id", $id)->where("accepted", 1)->get();
        $friendships2 = Friend::where("friend_id", $id)->where("accepted", 1)->get();
        foreach ($friendships1 as $f1) {
            $friendIds[] = $f1->user_id;
            $friendIds[] = $f1->friend_id;
        }
        foreach ($friendships2 as $f2) {
            $friendIds[] = $f2->user_id;
            $friendIds[] = $f2->friend_id;
        }
        $friendIds = array_unique($friendIds);
        if (($index = array_search($id, $friendIds)) !== false) {
            unset($friendIds[$index]);
        }
        $friends = User::whereIn("id", $friendIds)->orderBy('username', "ASC")->get(["id", "username", "is_active"]);
        $isFriend = false;
        $isAccepted = false;
        if (session("user")) {

            if (session("user")->id != $id) {
                $myUsername = User::findOrFail(session("user")->id)->username;
                foreach ($friends as $friend) {
                    if ($friend->username == $myUsername) {
                        $isFriend = true;
                        /* IS ACCEPTED */
                        if (Friend::where("user_id", $myUsername)->where("friend_id", $friend->username)->where("accepted", 1)->first() || Friend::where("user_id", $friend->username)->where("friend_id", $myUsername)->where("accepted", 1)->first()) {
                            $isAccepted = true;
                        }
                        break;
                    }
                }
            }
        }
        return view("pages.users.show", ["user" => $user, "friends" => $friends, "isFriend" => $isFriend, "isAccepted" => $isAccepted]);
    }
    public function edit($id)
    {
        if (session("user")->id == $id) {

            $user = User::find($id);
            $gender = Gender::all();
            $interestedIn = InterestedIn::all();
            $city = City::all();
            $eyeColors = EyeColor::all();
            $hairColors = HairColor::all();
            $professions = Profession::all();
            $statusOfRelationships = StatusOfRelationship::all();

            return view("pages.users.edit", ["city" => $city, "user" => $user, "gender" => $gender, "interestedIn" => $interestedIn, "eyeColors" => $eyeColors, "hairColors" => $hairColors, "professions" => $professions, "statusOfRelationships" => $statusOfRelationships]);
        } else {
            http_response_code(404);
        }
    }
    public function update(Request $request, $id)
    {
        try {
            if (User::where("email", $request->email)->first()) {
                return redirect()->back()->with(["error" => "User with that email already exists"]);
            } elseif (User::where("username", $request->username)->first()) {
                return redirect()->back()->with(["error" => "User with that username already exists"]);
            } else {
                $user = User::find(session("user")->id);
                if ($request->file("avatar")) {
                    $fileName = time() . '_' . $request->file("avatar")->getClientOriginalName();
                    $request->file("avatar")->move(public_path('uploads'), $fileName);
                } else {
                    $fileName = $user->avatar;
                }
                $user->email = $request->email;
                $user->username = $request->username;
                $user->about_me_description = $request->about_me_description;
                $user->status_of_relationship_id = $request->statusOfRelationship;
                $user->profession_id = $request->profession;
                $user->hair_color_id = $request->hairColor;
                $user->city_id = $request->city;
                $user->eye_color_id = $request->eyeColor;
                $user->interested_in_id = $request->interestedIn;
                $user->gender_id = $request->gender;
                $user->instagram = $request->instagram;
                $user->linkedin = $request->linkedin;
                $user->facebook = $request->facebook;
                $user->twitter = $request->twitter;
                $user->phone = $request->phone;
                $user->avatar = $fileName;
                $user->save();
                return redirect()->route("users.show", session("user")->id)->with(["success" => "Successfully updated profile"]);
            }
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            session()->forget("user");
            return redirect()->route("index");
        } catch (\Throwable $th) {
            echo $th->getMessage();
        }
    }
    public function friendRequests($userId)
    {
        $friendIds = DB::table("friends")->where("friend_id", $userId)->where("accepted", 0)->get("user_id");
        $friends = [];
        foreach ($friendIds as $friendId) {
            $friends[] = User::find($friendId->user_id);
        }
        return view("pages.users.friendRequests", ["friends" => $friends]);
    }
    public function sendFriendRequest($friendId)
    {
        $userId = session("user")->id;
        try {
            DB::beginTransaction();
            Friend::insert([
                "user_id" => $userId,
                "friend_id" => $friendId,
                "accepted" => 0,
                "created_at" => Carbon::now()
            ]);
            DB::commit();
            return redirect()->back()->with(["success" => "Successfully sent friend request"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function acceptFriendRequest($friendId)
    {
        $userId = session("user")->id;
        try {
            DB::beginTransaction();
            $friendship = Friend::where("user_id", $friendId)->where("friend_id", $userId)->first();
            $friendship->accepted = 1;
            $friendship->save();
            DB::commit();
            return redirect()->back()->with(["success" => "Successfully accepted friend request"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function declineFriendRequest($friendId)
    {
        $userId = session("user")->id;
        try {
            DB::beginTransaction();
            Friend::where("user_id", $friendId)->where("friend_id", $userId)->delete();
            DB::commit();
            return redirect()->back()->with(["success" => "Successfully declined friend request"]);
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
}
