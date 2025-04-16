<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Employee\EmployeeListRequest;
use App\Http\Resources\Employee\EmployeeResource;
use App\Services\Employee\EmployeeService;

class EmployeeListController extends ApiBaseController
{
     public function __invoke(
         EmployeeListRequest $request,
         EmployeeService $employeeService
     ) {
         $employees = $employeeService->list($request->all());

         return response()->successJson(["employees" => EmployeeResource::collection($employees)],
         "Employees list successfully"
         );
     }
}
