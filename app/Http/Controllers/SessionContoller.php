<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionContoller extends Controller
{
    public function createSession(Request $request): string
    {

        $request->session()->put("userId", "yaqin");
        $request->session()->put("isMember", true);
        return "ok";
    }
    public function getSession(Request $request): string
    {

        $userId = $request->session()->get("userId");
        $isMember = $request->session()->get("isMember");
        return "User Id : $userId, Is Member : $isMember";
    }
}
