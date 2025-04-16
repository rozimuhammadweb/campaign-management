<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepository;
use App\Services\BaseService;

class CompanyService extends BaseService
{
    protected array $filter_fields = [
        'name' => ['type' => 'string'],
        "head_fio" => ['type' => 'string'],
        "location" => ['type' => 'string'],
        "email" => ['type' => 'string'],
        "website" => ['type' => 'string'],
        "phone_number" => ['type' => 'string'],
    ];

    protected $sort_fields = [
        'sort_key' => 'created_at',
        'sort_type' => 'desc'
    ];

    protected $attributes = ['*'];

    protected $relation = ['employees', 'users'];
    public function __construct(CompanyRepository $repo)
    {
        $this->repo = $repo;
    }
}
