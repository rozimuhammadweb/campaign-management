<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Company\CompanyService;

class DeleteCompanyController extends ApiBaseController
{
    public function __invoke(
        int $id,
        CompanyService $companyService
    ) {
        if (auth()->user()->cannot("delete-company")) {
            abort(403);
        }

        $companyService->delete($id);

        return response()->successJson([],
            "Company deleted successfully."
        );
    }
}
