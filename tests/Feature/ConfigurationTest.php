<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class ConfigurationTest extends TestCase
{
    
    public function testConfig()
    {
        
        $firstName = config("contoh.author.first");
        $lastName = config("contoh.author.last");
        $email = config("contoh.email");
        $web = config("contoh.web");

        assertEquals("MUHAMMAD",$firstName);
        assertEquals("YAQIN",$lastName);
        assertEquals("myaqien27@gmail.com",$email);
        assertEquals("www.radenyaqien.com",$web);

    }
}
