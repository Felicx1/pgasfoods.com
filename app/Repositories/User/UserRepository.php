<?php

namespace App\Repositories\User;

use App\Models\Users\Users;
use App\Repositories\CoreRepository;

class UserRepository extends CoreRepository
{
    /**
     * Constructor to bind model to repo
     */
    public function __construct()
    {
        $this->model = new Users();
    }

}
