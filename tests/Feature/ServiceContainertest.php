<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use App\Data\Person;
use App\Services\HelloServicesIndonesia;
use App\Services\HelloService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotSame;
use function PHPUnit\Framework\assertSame;

class ServiceContainertest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testServiceContainer()
    {

        $foo = $this->app->make(Foo::class); // new Foo()
        $foo2 = $this->app->make(Foo::class); // new Foo()

        assertEquals("Foo", $foo->foo());
        assertEquals("Foo", $foo2->foo());
        assertNotSame($foo, $foo2);
    }

    function testBind()
    {

        $this->app->bind(Person::class, function ($app) {
            return new Person("Muhammad", "Yaaqin");
        });

        $person = $this->app->make(Person::class);
        $person1 = $this->app->make(Person::class);

        assertEquals("Muhammad", $person->firstName);
        assertEquals("Muhammad", $person->firstName);
        assertNotSame($person, $person1);
    }

    function testSingleton()
    {

        $this->app->singleton(Person::class, function ($app) {
            return new Person("Muhammad", "Yaaqin");
        });

        $person = $this->app->make(Person::class);
        $person1 = $this->app->make(Person::class);

        assertEquals("Muhammad", $person->firstName);
        assertEquals("Muhammad", $person->firstName);
        assertSame($person, $person1);
    }

    function testInstance()
    {

        $person = new Person("Muhammad", "Jaya");

        $this->app->instance(Person::class, $person);

        $person2 = $this->app->make(Person::class);
        $person1 = $this->app->make(Person::class);

        assertEquals("Muhammad", $person->firstName);
        assertEquals("Muhammad", $person->firstName);
        assertSame($person, $person1);
        assertSame($person, $person2);
    }


    public function testDependency()
    {
        //tell laravel to create foo object singleton
        $this->app->singleton(Foo::class, function ($app) {
            return new Foo();
        });
        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);

        assertSame($foo, $bar->foo);
    }

    function testInterfaceToClass()
    {
        $this->app->singleton(HelloService::class, HelloServicesIndonesia::class);
        

        //alternatif using closure
       // $this->app->singleton(HelloService::class, function($app){
        //     return new HelloServicesIndonesia();
        // });

        $helloService = $this->app->make(HelloService::class);

        assertEquals("hello Eko",$helloService->hello("Eko"));
    }
}
