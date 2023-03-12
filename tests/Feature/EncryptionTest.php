<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Crypt;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class EncryptionTest extends TestCase
{
    public function testEncryption()
    {
        $encrypted = Crypt::encrypt("Muhammad Ainul Yaqin");
        $decrypted = Crypt::decrypt($encrypted);
print_r($encrypted);
        assertEquals(
            "Muhammad Ainul Yaqin", $decrypted
        );
    }
}
