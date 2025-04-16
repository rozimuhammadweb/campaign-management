<?php

namespace App\Services\Auth;

use App\Http\Dto\Auth\LoginUserDto;
use App\Http\Resources\User\UserResource;
use App\Repositories\User\UserRepository;
use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService extends BaseService
{
    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }

    public function login(LoginUserDto $dto)
    {
        $user = $this->repo->findByEmail($dto->email);

        if (!$user || !Hash::check($dto->password, $user->password)) {
            return response()->errorJson(
                "Invalid credentials",
                401
            );
        }

        $token = $user->createToken("token")->plainTextToken;

        return response()->successJson(
            [
                'user' => UserResource::make($user),
                'token' => $token,
            ],
            "User logged in successfully",
        );
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->successJson([],
            "User logged out successfully"
        );
    }
}
