<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Requests\Company\CompanyListRequest;
use App\Http\Resources\Company\CompanyResource;
use App\Models\Company;
use App\Services\Company\CompanyService;

class CompanyListController extends ApiBaseController
{
    public function __invoke(
        CompanyListRequest $request,
        CompanyService $companyService
    ) {
        if ($request->user()->cannot("view-company", Company::class)) {
            abort(403);
        }

        $companies = $companyService->get($request->all());

        return response()->successJson(["companies" => CompanyResource::collection($companies)],
         "List of all companies"
        );
    }
}
