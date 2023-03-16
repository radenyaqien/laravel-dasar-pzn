<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RedirectController extends Controller
{
    public function redirectTo(): string
    {
        return "redirect to";
    }
    public function redirectFrom(): RedirectResponse
    {
        return redirect("/redirect/to");
    }

    public function redirectHello(string $name): string
    {
        return "hello $name";
    }

    public function redirectName(): RedirectResponse
    {

        return redirect()->route("redirect-hello", [
            "name" => "Eko"
        ]);
    }

    public function redirectAction(): RedirectResponse
    {
        return redirect()->action([
            RedirectController::class, "redirectHello"
        ], [
            "name" => "Eko"
        ]);
    }
    public function redirectAway(): RedirectResponse
    {
        return redirect()->away("https://youtube.com");
    }
}
