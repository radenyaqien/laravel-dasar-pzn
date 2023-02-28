<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testController()
    {
        $response = $this->get('/controller/hello/Eko');

        $response->assertStatus(200);
        $response->assertSeeText("hello Eko");
    }
}
