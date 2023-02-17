<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertEqualsWithDelta;

class EnvironmentTest extends TestCase
{
    public function testGetEnvironment()
    {
        
        $yotube = env("APP_NAME");

        self::assertEquals("Laravel",$yotube);

    }

    public function testDefaultEnv(){

        $appName = env("LINUX","linux");

        assertEquals("linux",$appName);

    }
}
