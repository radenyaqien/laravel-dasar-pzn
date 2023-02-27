<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertSame;

class FooBarServiceProviderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testServiceProvider()
    {


        $foo1 = $this->app->make(Foo::class);
        $foo2 = $this->app->make(Foo::class);

        assertSame($foo1,$foo2);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        assertSame($bar1,$bar2);
        assertSame($foo1,$bar1->foo);
        assertSame($foo2,$bar2->foo);

    }

    public function testPropertySingleton()
    {
        
        $helloService = $this->app->make(HelloService::class);
        $helloService1 = $this->app->make(HelloService::class);

        assertSame($helloService,$helloService1);

    }
}
