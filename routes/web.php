<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get("/", [PageController::class, "index"])->name("index");
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
    Route::post("/post", [TopicController::class, "storePost"])->name("posts.store");
    Route::delete("/posts/{id}", [TopicController::class, "destroyPost"])->name("topics.destroyPost");
    Route::middleware("isAdmin")->group(function () {
        Route::delete("/topics/{id}", [TopicController::class, "destroy"])->name("topics.destroy");
        Route::post("/topics/{id}/store", [TopicController::class, "store"])->name("topics.store");
        Route::get("/topics/{id}/create", [TopicController::class, "create"])->name("topics.create");
        Route::post("/topics/{id}/lock", [TopicController::class, "lock"])->name("topics.lock");
        Route::post("/topics/{id}/unlock", [TopicController::class, "unlock"])->name("topics.unlock");
    });
});
