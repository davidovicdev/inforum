<?php

namespace App\Http\Controllers;

use App\Models\EyeColor;
use App\Models\Friend;
use App\Models\Gender;
use App\Models\HairColor;
use App\Models\InterestedIn;
use App\Models\Profession;
use App\Models\StatusOfRelationship;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select(["id", "is_active", "avatar", "is_admin", "username", "email", "created_at"])->withCount("posts")->get();
        return view("pages.users.index", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(["city", "profession", "interestedIn", "statusOfRelationship", "gender", "eyeColor", "hairColor", "posts", "userComments", "friends"])->withCount('posts')->findOrFail($id);
        $friendsId = [];
        foreach ($user->friends as $friend) {
            if ($friend->accepted) {
                $friendsId[] = $friend->friend_id;
                $friendsId[] = $friend->user_id;
            }
        }
        $friendsId = array_unique($friendsId);
        $friends = User::whereIn("id", $friendsId)->orderBy('username', "ASC")->get(["id", "username", "is_active"]);
        return view("pages.users.show", ["user" => $user, "friends" => $friends]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (session("user")->id == $id) {

            $user = User::find($id);
            $gender = Gender::all();
            $interestedIn = InterestedIn::all();
            $eyeColors = EyeColor::all();
            $hairColors = HairColor::all();
            $professions = Profession::all();
            $statusOfRelationships = StatusOfRelationship::all();

            return view("pages.users.edit", ["user" => $user, "gender" => $gender, "interestedIn" => $interestedIn, "eyeColors" => $eyeColors, "hairColors" => $hairColors, "professions" => $professions, "statusOfRelationships" => $statusOfRelationships]);
        } else {
            http_response_code(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function friendRequests($userId)
    {
        $friendIds = [];
        $user = User::find($userId);
        foreach ($user->friends as $friend) {
            if (!$friend->accepted) {
                $friendIds[] = $friend->id;
            }
        }
        $friends = [];
        foreach ($friendIds as $friendId) {
            $friends[] = User::find($friendId);
        }
        dd($friends);
    }
}
