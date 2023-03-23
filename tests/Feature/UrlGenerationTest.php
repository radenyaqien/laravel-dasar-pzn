<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlGenerationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testurlCurrent()
    {
        $response = $this->get('/url/current?name=Eko');

        $response->assertStatus(200)->assertSeeText("/url/current?name=Eko");
    }

    public function testRedirectUrl()
    {
        $this->get("redirect/named")->assertSeeText("/redirect/name/EKO");
    }
    public function testAction()
    {
        $this->get("/url/action")->assertSeeText("/form");
    }
}
