<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Route;


Route::view("/", "index") -> name("index");

/*
|--------------------------------------------------------------------------
| Authentication / Logout
|--------------------------------------------------------------------------
| 
*/

Route::middleware("guest") -> name("auth.") -> controller(AuthController::class) -> group( function () {
    Route::view("/login", "auth.login") -> name("login");
    Route::post("/login", "login");
    
    Route::view("/signup", "auth.signup") -> name("signup");
    Route::post("/signup", "signup");
});

Route::get("logout", function() {
    # Clean the session
    session() -> flush();

    # Redirect to /
    return to_route("index");
}) -> name("auth.logout") -> middleware("auth");


/*
|--------------------------------------------------------------------------
| App routing
|--------------------------------------------------------------------------
| 
*/

Route::name("app.") -> middleware("auth") -> controller(AppController::class) -> group(function () {
    Route::get("/app",  "app") -> name("app");
});
