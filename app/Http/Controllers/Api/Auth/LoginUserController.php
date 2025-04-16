<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;

class LoginUserController extends ApiBaseController
{
    public function __invoke(
        LoginRequest $request,
        AuthService $authService
    ) {
        return $authService->login($request->getParams($request));
    }
}
