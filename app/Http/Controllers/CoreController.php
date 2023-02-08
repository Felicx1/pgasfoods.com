<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\ServiceLoader;
use App\Services\ServiceFactory;
use App\Services\ServicesConstants as Constants;

class CoreController extends Controller
{

    protected $token;
    protected $id;
    protected $email;

    protected $userService;
    protected $webService;
    protected $statusService;

    protected $selector = [];

    public function __construct(){

        date_default_timezone_set('Europe/London');

        $services = new ServiceLoader(new ServiceFactory());
        $this->userService          = $services->load(Constants::USER_SERVICE);
        $this->webService           = $services->load(Constants::WEB_SERVICE);
        $this->statusService        = $services->load(Constants::STATUS_SERVICE);
    }
}
