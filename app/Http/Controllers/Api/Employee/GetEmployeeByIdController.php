<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\Employee\EmployeeResource;
use App\Services\Employee\EmployeeService;

class GetEmployeeByIdController extends ApiBaseController
{
   public function __invoke(
       int $id,
       EmployeeService $employeeService
   ) {
       if (auth()->user()->cannot("view-employee")) {
           abort(403);
       }

       $employee = $employeeService->show($id);

       return response()->successJson(["employee" => EmployeeResource::make($employee)]);
   }
}
