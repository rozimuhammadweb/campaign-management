<?php

namespace App\Http\Requests\Auth;

use App\Http\Dto\Auth\LoginUserDto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "email" => ["required", "email", "exists:users,email"],
            "password" => ["required", "string", "min:8", "max:255"],
        ];
    }

    public function getParams(Request $request): LoginUserDto
    {
        return new LoginUserDto(
            email: $request->input("email"),
            password: $request->input("password"),
        );
    }
}
