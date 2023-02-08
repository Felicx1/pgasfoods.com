<?php

namespace App\Models\Users;

class Client extends \Laravel\Passport\Client
{
    protected $fillable = [
        "user_id",
        'name',
        'secret',
        'redirect',
        'personal_access_client',
        'password_client',
        'revoked'
    ];
}