<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;

class CompanyRepository extends BaseRepository
{
    public function __construct(Company $company)
    {
        $this->entity = $company;
    }
}
