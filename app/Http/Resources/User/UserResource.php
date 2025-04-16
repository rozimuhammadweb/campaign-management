<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin User
 */
class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'roles' => [
                'is_admin' => $this->isAdmin(),
                'is_company' => $this->isCompany(),
            ],
            'permissions' => [
                'company' => [
                    'get' => $this->can("view-company"),
                    'create' => $this->can("create-company"),
                    'update' => $this->can("update-company"),
                    'delete' => $this->can("delete-company"),
                ],
                'employee' => [
                    'get' => $this->can("view-employee"),
                    'create' => $this->can("create-employee"),
                    'update' => $this->can("update-employee"),
                    'delete' => $this->can("delete-employee"),
                ],
            ],
            'created_at' => $this->created_at->format('d M Y H:i:s'),
            'updated_at' => $this->updated_at->format('d M Y H:i:s'),
        ];
    }
}
