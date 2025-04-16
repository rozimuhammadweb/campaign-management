<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Auth\AuthService;

class LogoutUserController extends ApiBaseController
{
    public function __invoke(AuthService $authService)
    {
        return $authService->logout();
    }
}
