<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * @package Role
 */
class Role extends SpatieRole {
    public const ROLE_ADMIN = "admin";
    public const ROLE_ADMIN_ID = 1;
    public const ROLE_COMPANY = "company";
    public const ROLE_COMPANY_ID = 2;

    public const ROLE_ALL_ROLES = [
        self::ROLE_ADMIN,
        self::ROLE_COMPANY,
    ];

    public const ROLE_ALL_ROLE_IDS = [
        self::ROLE_ADMIN_ID,
        self::ROLE_COMPANY_ID,
    ];
}
