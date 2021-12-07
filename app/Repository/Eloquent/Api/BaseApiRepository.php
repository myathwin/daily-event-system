<?php

namespace App\Repository\Eloquent\Api;

use App\Network\Clients\KenkoAdminApiClient;

abstract class BaseApiRepository
{
    protected function api(): KenkoAdminApiClient
    {
        return new KenkoAdminApiClient();
    }
}
