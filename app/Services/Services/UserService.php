<?php

namespace App\Services\Services;

use App\Repositories\User\UserRepository;

class UserService extends \App\Services\Service
{

    public function __construct(){

        $this->repository = new UserRepository();
    }
}
