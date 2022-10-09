<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
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
Route::post("/register", [AuthController::class, "doRegister"])->name("auth.doRegister");
Route::get("/topics/{id}", [TopicController::class, "show"])->name("topic.show");
Route::middleware("isLogged")->group(function () {
    Route::get("/users/{id}/requests", [UserController::class, "friendRequests"])->name("users.friendRequests");
    Route::post("/users/{id}/sendFriendRequest", [UserController::class, "sendFriendRequest"])->name("users.sendFriendRequest");
    Route::put("/users/{id}/acceptFriendRequest", [UserController::class, "acceptFriendRequest"])->name("users.acceptFriendRequest");
    Route::delete("/users/{id}/declineFriendRequest", [UserController::class, "declineFriendRequest"])->name("users.declineFriendRequest");
    Route::post("/logout", [AuthController::class, "logout"])->name("auth.logout");
});
