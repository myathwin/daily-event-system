<?php

namespace App\Repository\Eloquent;
use App\Repository\Eloquent\UserRepository;


class DataMatchRepository {

    public static function user(): UserRepository {
        return app(UserRepository::class);
    }

    

}