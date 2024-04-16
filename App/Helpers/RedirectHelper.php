<?php

namespace App\Helpers;

class RedirectHelper
{
    // URL
    public const HOME_URL = '/';

    public static function redirectTo($location)
    {
        header("Location: $location");
        exit;
    }
}
