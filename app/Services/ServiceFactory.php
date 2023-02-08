<?php

namespace App\Services;

use App\Services\Services\StatusService;
use App\Services\Services\UserService;


class ServiceFactory {

    protected $callbacks;

    /**
     * @param array $callbacks
     */
    public function __construct(array $callbacks = [])
    {
        $this->callbacks = array_merge([
            ServicesConstants::USER_SERVICE        => [$this, 'createUser'],
            ServicesConstants::STATUS_SERVICE      => [$this, 'createStatus'],
        ], $callbacks);
    }

    

    /**
     * @return UserService
     */
    public function createUser(){

        return new UserService();
    }



    /**
     * @return StatusService
     */
    public function createStatus(){

        return new StatusService();
    }
}
