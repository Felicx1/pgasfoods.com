<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider{

    protected $repositories = [
        'Users\User',
    ];

    public function register(){

        foreach($this->repositories as $repository){

            $this->app->bind(
                'App\Repositories\\' . $repository . 'RepositoryInterface',
                'App\Repositories\\' . $repository . 'Repository'
            );
        }
    }
}
