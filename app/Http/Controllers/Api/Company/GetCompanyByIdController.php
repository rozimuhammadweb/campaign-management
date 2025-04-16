<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Company\CompanyService;

class GetCompanyByIdController extends ApiBaseController
{
    public function __invoke(
        int $id,
        CompanyService $companyService
    ) {
        if (auth()->user()->cannot("view-company")) {
            abort(403);
        }

        $company = $companyService->show($id);

        return response()->successJson(["company" => CompanyResource::make($company)]);
    }
}
