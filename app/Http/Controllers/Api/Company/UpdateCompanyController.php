<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Company\CompanyService;

class UpdateCompanyController extends ApiBaseController
{
    public function __invoke(
        int  $id,
        UpdateCompanyRequest $request,
        CompanyService  $companyService,
    ) {
        if (auth()->user()->cannot("update-company")) {
            abort(403);
        }

        $company = $companyService->edit($request->validated(), $id);

        return response()->successJson(["company" => CompanyResource::make($company)],
         "Company updated successfully"
        );
    }
}
