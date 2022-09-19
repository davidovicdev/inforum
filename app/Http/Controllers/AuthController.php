<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Composer\Pcre\Regex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                $user = User::where("usernae", $request->username)->first();
                if ($user) {
                    return redirect()->back()->withInput()->with("message", "Account with that username already exists");
                } else {
                    // REGISTER
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
        session()->flush("user");
        return redirect()->route("index");
    }
}
