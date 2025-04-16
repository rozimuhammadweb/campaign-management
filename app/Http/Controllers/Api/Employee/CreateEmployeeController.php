<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Services\Employee\EmployeeService;

class CreateEmployeeController extends ApiBaseController
{
      public function __invoke(
          CreateEmployeeRequest $request,
          EmployeeService $employeeService
      ) {
          $employee = $employeeService->create($request->validated());

          return response()->successJson(["employee" => EmployeeResource::make($employee)],
          "Employee created successfully."
          );
      }
}
