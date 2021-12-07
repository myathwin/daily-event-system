<?php

namespace App\Repository\Eloquent\Api;

// use App\Models\Admin;
use App\Repository\Eloquent\Api\BaseApiRepository;
use Illuminate\Support\Collection;

class CompanyApiRepository extends BaseApiRepository
{

    public function store(array $attribute)
    {
        return $this->api()->post('/api/company/store', $attribute);
    }

    public function update(array $attribute)
    {
        return $this->api()->post('/api/company/update', $attribute);
    }

}