<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CookiesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCookies()
    {
        $response = $this->get('/cookie/set');

        $response->assertCookie("User-Id", "khannedy");
        $response->assertCookie("Is-Member", true);
    }

    public function testGetCookie()
    {
        $this
            ->withCookie("User-Id", "khannedy")
            ->withCookie("Is-Member", "true")
            ->get("/cookie/get")
            ->assertJson([
                "userID" => "khannedy",
                "isMember" => "true"
            ]);
    }
}
