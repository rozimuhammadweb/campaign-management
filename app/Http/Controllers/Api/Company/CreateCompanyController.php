<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Company\CreateCompanyRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Services\Company\CompanyService;

class CreateCompanyController extends ApiBaseController
{
     public function __invoke(
         CreateCompanyRequest $request,
         CompanyService $companyService
     ) {
         $company = $companyService->create($request->validated());

         return response()->successJson(["company" => CompanyResource::make($company)],
            "Company created successfully"
         );
     }
}
