<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewTest extends TestCase
{
    public function testView()
    {
        $response = $this->get('/hello');

        $response->assertSeeText("Hello Yaqin");

        $this->get("/hello-again")->assertSeeText("Hello Eko");
    }

    public function testNestedView()
    {
        $response = $this->get('/hello-world');

        $response->assertSeeText("World Eko");
        
    }

    public function testTemplateOnly(){

        $this->view("hello",["name"=> "Eko"])->assertSeeText("Hello Eko");
        $this->view("hello.world",["name"=> "Eko"])->assertSeeText("World Eko");

    }
}
