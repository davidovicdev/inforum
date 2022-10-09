<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Composer\Pcre\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class AuthController extends Controller
{

    public function login()
    {
        return view("pages.auth.login");
    }
    public function doLogin(LoginRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::select(["id", "username", "email", "is_admin"])->where("email", $request->email)->first();
            if ($user) {
                $user = User::select(["id", "username", "email", "is_admin"])->where("email", $request->email)->where("password", md5($request->password))->first();
                if ($user) {
                    session()->put("user", $user);
                    return redirect()->route("index");
                } else {
                    return redirect()->back()->withInput()->with("message", "Wrong password");
                }
            } else {
                return redirect()->back()->withInput()->with("message", "Account with that email does not exists");
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function register()
    {
        return view("pages.auth.register");
    }
    public function doRegister(RegisterRequest $request)
    {
        try {
            DB::beginTransaction();

            $user = User::where("email", $request->email)->first();
            if ($user) {
                return redirect()->back()->withInput()->with("message", "Account with that email already exists");
            } else {
                $user = User::where("username", $request->username)->first();
                if ($user) {
                    return redirect()->back()->withInput()->with("message", "Account with that username already exists");
                } else {
                    $userId =  User::insertGetId([
                        "gender_id" => null,
                        "city_id" => null,
                        "eye_color_id" => null,
                        "interested_in_id" => null,
                        "hair_color_id" => null,
                        "profession_id" => null,
                        "status_of_relationship_id" => null,
                        "avatar" => null,
                        "about_me_description" => null,
                        "phone" => null,
                        "facebook" => null,
                        "twitter" => null,
                        "linkedin" => null,
                        "instagram" => null,
                        "updated_at" => null,
                        "username" => $request->username,
                        "email" => $request->email,
                        "date_of_birth" => $request->birthDate,
                        "password" => md5($request->password),
                        "is_admin" => 0,
                        "is_active" => 1,
                        "created_at" => Carbon::now("Europe/Belgrade"),
                    ]);
                    DB::commit();
                    $userForSession = new stdClass();
                    $userForSession->id = $userId;
                    $userForSession->username = $request->username;
                    $userForSession->email = $request->email;
                    $userForSession->is_admin = 0;
                    session()->put("user", $userForSession);
                    return redirect()->route("users.show", $userId);
                }
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            echo $th->getMessage();
        }
    }
    public function logout()
    {
        $user = User::find(session("user")->id);
        $user->is_active = 0;
        $user->save();
        session()->flush("user");
        return redirect()->route("index");
    }
}
