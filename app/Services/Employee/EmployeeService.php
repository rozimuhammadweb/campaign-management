<?php

namespace App\Services\Employee;

use App\Repositories\Employee\EmployeeRepository;
use App\Services\BaseService;

class EmployeeService extends BaseService
{
    protected array $filter_fields = [
        'first_name' => ['type' => 'string'],
        "last_name" => ['type' => 'string'],
        "fathers_name" => ['type' => 'string'],
        "passport_number" => ['type' => 'string'],
        "position" => ['type' => 'string'],
        "phone_number" => ['type' => 'string'],
        "address" => ['type' => 'string'],
    ];

    protected $sort_fields = [
        'sort_key' => 'created_at',
        'sort_type' => 'desc'
    ];
    protected $attributes = ['*'];
    protected $relation = ["company"];

    public function __construct(EmployeeRepository $repo)
    {
        $this->repo = $repo;
    }
}
