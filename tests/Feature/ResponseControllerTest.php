<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ResponseControllerTest extends TestCase
{
    public function testResponse()
    {
        $this->get("/response/hello")
            ->assertSeeText("hello response")
            ->assertStatus(200);
    }

    public function testHeader()
    {
        $this->get("/response/header")
            ->assertSeeText("Ainul")
            ->assertSeeText("Yaqin")
            ->assertStatus(200)
            ->assertHeader("Content-Type", "Application/json")
            ->assertHeader("App", "Belajar Laravel")
            ->assertHeader("Author", "radenyaqien");
    }

    public function testResponseView()
    {
        $this->get("/response/type/view")
            ->assertSeeText("Hello Yaqin")
            ->assertStatus(200);
    }  
    
    public function testResponseJson()
    {
        $this->get("/response/type/json")
            ->assertJson([
                "firstName" => "Ainul",
                "lastName" => "Yaqin"
            ])
            ->assertStatus(200);
    }

    public function testResponseFile()
    {
        $this->get("/response/type/file")
            ->assertHeader("Content-Type","image/png")
            ->assertStatus(200);
    }
    public function testResponseDownload()
    {
        $this->get("/response/type/download")
            ->assertDownload("kannedy.png")
            ->assertStatus(200);
    }
}
