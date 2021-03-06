<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "index"])->name("index");
Route::get("/contact", [PageController::class, "contact"])->name("contact");
Route::get("/about", [PageController::class, "about"])->name("about");
Route::get("/aboutAuthor", [PageController::class, "aboutAuthor"])->name("aboutAuthor");
Route::resource('users', UserController::class);
Route::get("/login", [AuthController::class, "login"])->name("auth.login");
Route::post("/login", [AuthController::class, "doLogin"])->name("auth.doLogin");
Route::get("/register", [AuthController::class, "register"])->name("auth.register");
Route::middleware("isLogged")->group(function () {
    Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");
    Route::get("/myprofile", [UserController::class, "myProfile"])->name("users.myProfile");
});
