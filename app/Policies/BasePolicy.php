<?php

namespace App\Policies;

abstract class BasePolicy
{
    abstract public static function getRolePermissions(): array;
}
