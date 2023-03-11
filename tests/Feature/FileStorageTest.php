<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class FileStorageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testStorage()
    {

        $fileSystem = Storage::disk("local");

        $fileSystem->put("file.txt","Muhammad Ainul Yaqin");

        $content = $fileSystem->get("file.txt");

        assertEquals("Muhammad Ainul Yaqin",$content);
    } 
    
    public function testPublic()
    {

        $fileSystem = Storage::disk("public");

        $fileSystem->put("file.txt","Muhammad Ainul Yaqin");

        $content = $fileSystem->get("file.txt");

        assertEquals("Muhammad Ainul Yaqin",$content);
    }
}
