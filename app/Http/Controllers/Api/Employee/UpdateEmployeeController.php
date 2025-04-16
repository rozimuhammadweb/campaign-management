<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Services\Employee\EmployeeService;

class UpdateEmployeeController extends ApiBaseController
{
    public function __invoke(
        int $id,
        UpdateEmployeeRequest $request,
        EmployeeService $employeeService
    ) {
        $employee = $employeeService->edit($request->validated(), $id);

        return response()->successJson(["employee" => EmployeeResource::make($employee)],
            "Employee updated successfully"
        );
    }
}
