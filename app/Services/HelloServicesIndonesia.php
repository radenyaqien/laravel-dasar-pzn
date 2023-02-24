<?php

namespace App\Services;

use App\Services\HelloService;

class HelloServicesIndonesia implements HelloService
{

    function hello(string $name): String
    {
        return "hello $name";
    }

}
