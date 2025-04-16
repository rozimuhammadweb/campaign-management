<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Company\CompanyResource;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Employee
 */
class EmployeeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "fathers_name" => $this->fathers_name,
            "passport_number" => $this->passport_number,
            "position" => $this->position,
            "phone_number" => $this->phone_number,
            "address" => $this->address,
            'permissions' => [
                "get" => $request->user()->can("view-employee"),
                "create" => $request->user()->can("create-employee"),
                "update" => $request->user()->can("update-employee"),
                "delete" => $request->user()->can("delete-employee"),
            ],
            "company" => CompanyResource::make($this->company),
            'created_at' => $this->created_at->format('d M Y H:i:s'),
            'updated_at' => $this->updated_at->format('d M Y H:i:s'),
        ];
    }
}
