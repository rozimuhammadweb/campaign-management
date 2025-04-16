<?php

namespace App\Http\Resources\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Company
 */
class CompanyResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "head_fio" => $this->head_fio,
            "location" => $this->location,
            "email" => $this->email,
            "website" => $this->website,
            "phone_number" => $this->phone_number,
            'permissions' => [
                "get" => $request->user()->can("view-company"),
                "create" => $request->user()->can("create-company"),
                "update" => $request->user()->can("update-company"),
                "delete" => $request->user()->can("delete-company"),
            ],
            'created_at' => $this->created_at->format('d M Y H:i:s'),
            'updated_at' => $this->updated_at->format('d M Y H:i:s'),
        ];

    }
}
