<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FacadesTest extends TestCase
{
   
    public function testConfigFacade()
    {
        
        $config = config("contoh.author.first");
        $config2 = Config::get("contoh.author.first");


        assertEquals($config,$config2);
        var_dump(Config::all());

    }
    
    public function testConfigDependency()
    {
        
        $config = $this->app->make("config");
        $firstname = config("contoh.author.first");
        $firstname2 = Config::get("contoh.author.first");
        $firstname3 = $config->get("contoh.author.first");


        assertEquals($firstname,$firstname2);
        assertEquals($firstname,$firstname3);
        var_dump(Config::all());

    }

    public function testMockingFacades(){


        Config::shouldReceive("get")
            ->with("contoh.author.first")
            ->andReturn("EKO");
          $firstname=  Config::get("contoh.author.first");
    
          assertEquals("EKO",$firstname);

        }

}
