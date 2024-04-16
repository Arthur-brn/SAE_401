<?php

namespace App;

// Router
use App\Router;

// Helpers
use App\Helpers\{
    RedirectHelper as Redirect
};

class Application
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();
        $this->configureGetRoutes();
        $this->configurePostRoutes();
    }

    public function run()
    {
        $this->router->processRequest();
    }

    private function configureGetRoutes()
    {
    }

    private function configurePostRoutes()
    {
    }
}
