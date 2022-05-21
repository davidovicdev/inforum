<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
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
            $user = User::where("email", $request->email)->where("password", md5($request->password))->first();
            if ($user) {
                session()->put("user", $user);
                return redirect()->route("index");
            } else {
                return redirect()->back()->with("message", "Wrong email or password");
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
    public function logout()
    {
        session()->flush("user");
        return redirect()->route("index");
    }
}
