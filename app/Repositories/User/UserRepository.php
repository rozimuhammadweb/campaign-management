<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository
{
    public function __construct(User $entity)
    {
        $this->entity = $entity;
    }

    public function findByEmail(string $email)
    {
        return $this->entity->where('email', $email)->first();
    }

}
