<?php

namespace App\Http\Dto\Auth;

class LoginUserDto
{
    public function __construct(
        public string $email,
        public string $password,
    ) {
    }
}
