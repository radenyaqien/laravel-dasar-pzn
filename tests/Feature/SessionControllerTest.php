<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{

    public function testCreateSession()
    {

        $this->get("/session/create")
            ->assertSeeText("ok")
            ->assertSessionHas("userId", "yaqin")
            ->assertSessionHas("isMember", true);
    }

    public function testGetSession()
    {

        $this->withSession([
            "userId" => "yaqin",
            "isMember" => true
        ])->get("/session/get")
            ->assertSeeText("yaqin")
            ->assertSeeText(true);
    }
}
