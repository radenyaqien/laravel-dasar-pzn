<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testinputRequest()
    {
        $this->get("/input/hello?name=Eko")->assertSeeText("Hello Eko");
        $this->post("/input/hello", [
            "name" => "Eko"
        ])->assertSeeText("Hello Eko");
    }

    public function testNestedInput()
    {
        $this->post("/input/hello/first", [
            "name" => [
                "first" => "Eko"
            ]
        ])->assertSeeText("Hello Eko");
    }

    public function testInputAll()
    {
        $this->post("/input/hello/input", [
            "name" => [
                "first" => "Eko"
            ]
        ])->assertSeeText("name")
            ->assertSeeText("first")
            ->assertSeeText("Eko");
    }

    public function testInputArray()
    {
        $this->post("/input/hello/array", [
            "product" => [
                ["name" => "Eko"],
                ["name" => "Hadi"],
                ["name" => "samsung"],
            ]
        ])->assertSeeText("Eko")
            ->assertSeeText("Hadi")->assertSeeText("samsung");
    }

    public function testInputType()
    {
        $this->post("/input/type", [
           
                ["name" => "Eko"],
                ["isMarried" => "true"],
                ["birthdate" => "2022-09-01"],
            
        ])->assertSeeText("Eko")
            ->assertSeeText("true")->assertSeeText("2022-09-01");
    }
}
