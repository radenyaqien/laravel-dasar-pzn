<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class FileControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUpload()
    {
        $picture = UploadedFile::fake()->image("kannedy.png");
        

        $this->post("/file/upload", [
            "picture" => $picture
        ])->assertSeeText("OK : kannedy.png");
    }
    
    public function testUploadLocal()
    {
        $picture = UploadedFile::fake()->image("kannedy.png");
        

        $this->post("/file/uploadlocal", [
            "picture" => $picture
        ])->assertSeeText("OK : kannedy.png");
    }
}
