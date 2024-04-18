<?php

namespace App\Controller;

// Pages
use App\Model\Pages\{
    Home
};

class ControllerPage
{

    public function __construct()
    {
    }

    public function home()
    {
        $home = new Home();
        $home->render();
    }
}
