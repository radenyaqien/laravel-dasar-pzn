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
}
