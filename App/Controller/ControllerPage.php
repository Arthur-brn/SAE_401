<?php

namespace App\Controller;

// Controllers datas
use App\Controller\{
    ControllerReview
};

// Pages
use App\Model\Pages\{
    Home,
    Error404
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
