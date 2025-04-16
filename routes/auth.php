<?php

use App\Http\Controllers\Api\Auth\LoginUserController;
use App\Http\Controllers\Api\Auth\LogoutUserController;
use App\Http\Resources\User\UserResource;

Route::prefix("auth")->group(function () {
    Route::post("login", LoginUserController::class);

    Route::middleware(["auth:sanctum"])->group(function () {
        Route::get("/profile", function () { return response()->successJson(["user" => UserResource::make(auth()->user())]); });
        Route::post("/logout", LogoutUserController::class);
    });
});
