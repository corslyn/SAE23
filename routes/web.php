<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeplacementController;
use App\Http\Controllers\EquipageController;
use App\Http\Controllers\LieuxController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\VehiculeController;


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


Route::view("/admin", "auth.admin") -> name("auth.admin") -> middleware("admin");
Route::post("/admin", [AppController::class, "admin_actions"]) -> name("auth.admin_actions") -> middleware("admin");


/*
|--------------------------------------------------------------------------
| App routing
|--------------------------------------------------------------------------
|
*/

Route::name("app.") -> middleware("auth") -> controller(AppController::class) -> group(function () {
    Route::get("/edt",  "edt") -> name("edt");
    Route::get("/search", "search") -> name("search");
});

Route::name("vehicule.") -> prefix("vehicule") -> middleware("auth") -> controller(VehiculeController::class) -> group(function () {
    Route::get("/show", "show") -> name("show");
    Route::delete("/remove/{vehicule}", "delete") -> name("delete");

    Route::post("/create", "create") -> name("create");
});

Route::name("lieux.") -> prefix("lieux") -> middleware("auth") -> controller(LieuxController::class) -> group(function () {
    Route::get("/show", "show") -> name("show");
    Route::post("/create", "create") -> name("create");

    Route::delete("/remove/{lieux}", "delete") -> name("delete");
});

Route::name("equipage.") -> prefix("equipage") -> middleware("auth") -> controller(EquipageController::class) -> group(function () {
    Route::get("/show", "show") -> name("show");
    Route::post("/create", "create") -> name("create");

    Route::get("/join", "join") -> name("join");
    Route::delete("/quit/{rejoint}", "quit") -> name("quit");

    Route::delete("/remove/{user_join}", "delete") -> name("delete");

});

Route::name("deplacement.") -> prefix("deplacement") -> middleware("auth") -> controller(DeplacementController::class) -> group(function () {
    Route::get("/show", "show") -> name("show");

    Route::post("/create", "create") -> name("create");

});


//XXXX
Route::name("recommendation.") -> prefix("recommendation") -> middleware("auth") -> controller(RecommendationController::class) -> group(function () {
    Route::get("/show", "show") -> name("show");
//     Route::post("/create", "create") -> name("create");

//     Route::get("/join", "join") -> name("join");
//     Route::delete("/quit/{rejoint}", "quit") -> name("quit");

//     Route::delete("/remove/{user_join}", "delete") -> name("delete");

});
Route::get('/profile', [AppController::class, "show_profile"]) -> name("profile.show") -> middleware("auth");
Route::post("/profile", [AppController::class, "edit_profile"]) -> name("profile.form") -> middleware("auth");
