<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{

    public function testGet()
    {

        $this->get("/pzn")
            ->assertStatus(200)
            ->assertSeeText("warjoe");
    }

    public function testRedirect()
    {
        $this->get("/yt")
            ->assertRedirect("/pzn");
    }

    public function testFallback()
    {
        $this->get("/tidak ada")
            ->assertSeeText("404");
    }

    function testRoutingParameter()
    {

        $this->get("/product/1")
            ->assertSeeText("Product 1");

        $this->get("/product/1/items/2")
            ->assertSeeText("Product 1 Item 2");
    }
    public function testParameterRegex()
    {
        $this->get("/categories/1")
            ->assertSeeText("Category 1");


        $this->get("/categories/eko")
            ->assertSeeText("404");
    }

    public function testRouteOptionalParameter()
    {

        $this->get("/users/1")
            ->assertSeeText("User 1");

        $this->get("/users/")
            ->assertSeeText("User 404");
    }

    public function testRouteConflictParameter()
    {
        $this->get("/conflict/Yaqin")
            ->assertSeeText("User Yaqin");

        $this->get("/conflict/eko")
            ->assertSeeText("User Eko");
            
    }

    public function testNamedRoute()
    {
        
        $this->get("produk/1")->assertSeeText("Link http://localhost/product/1");
        $this->get("produk-redirect/123")->assertRedirect("/product/123");
    }
}
