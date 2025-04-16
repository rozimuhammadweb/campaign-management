<?php

namespace App\Http\Controllers\Api\Employee;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Employee\EmployeeService;

class DeleteEmployeeController extends ApiBaseController
{
    public function __invoke(
        int $id,
        EmployeeService $employeeService
    ) {
        if (auth()->user()->cannot("delete-employee")) {
            abort(403);
        }

       $employeeService->delete($id);

       return response()->successJson(null,
           'Employee deleted successfully'
       );
    }
}
