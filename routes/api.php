<?php

use App\Http\Controllers\Api\Company\CompanyListController;
use App\Http\Controllers\Api\Company\CreateCompanyController;
use App\Http\Controllers\Api\Company\DeleteCompanyController;
use App\Http\Controllers\Api\Company\GetCompanyByIdController;
use App\Http\Controllers\Api\Company\UpdateCompanyController;
use App\Http\Controllers\Api\Employee\CreateEmployeeController;
use App\Http\Controllers\Api\Employee\DeleteEmployeeController;
use App\Http\Controllers\Api\Employee\EmployeeListController;
use App\Http\Controllers\Api\Employee\GetEmployeeByIdController;
use App\Http\Controllers\Api\Employee\UpdateEmployeeController;

require_once __DIR__ . '/auth.php';

Route::middleware('auth:sanctum')->group(function () {
    Route::get("/companies", CompanyListController::class);
    Route::get("/company/{id}", GetCompanyByIdController::class);
    Route::post("/company/create", CreateCompanyController::class);
    Route::put("/company/{id}/update", UpdateCompanyController::class);
    Route::delete("/company/{id}/delete", DeleteCompanyController::class);

    Route::get("/employees", EmployeeListController::class);
    Route::get("/employee/{id}", GetEmployeeByIdController::class);
    Route::post("/employee/create", CreateEmployeeController::class);
    Route::put("/employee/{id}/update", UpdateEmployeeController::class);
    Route::post("/employee/{id}/delete", DeleteEmployeeController::class);
});
