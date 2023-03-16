<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContohMiddlewareTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testInvalidMiddleware()
    {
        $response = $this->get('/middleware/api');

        $response->assertStatus(401)
            ->assertSeeText("Access Denied");
    }
    public function testValidMiddleware()
    {
        $response = $this->withHeader("X-API-KEY", "PZN")->get('/middleware/api');

        $response->assertStatus(200)
            ->assertSeeText("api");
    }
    public function testInvalidMiddlewareGroup()
    {
        $response = $this->get('/middleware/group');

        $response->assertStatus(401)
            ->assertSeeText("Access Denied");
    }
    public function testValidMiddlewareGroup()
    {
        $response = $this->withHeader("X-API-KEY", "PZN")->get('/middleware/group');

        $response->assertStatus(200)
            ->assertSeeText("group");
    }
}
