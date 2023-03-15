<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookiesController extends Controller
{

    public function createCookies(Request $request): Response
    {
        return response("hello cookie")
            ->cookie("User-Id", "khannedy", 1000, "/")
            ->cookie("Is-Member", "true", 1000, "/");
    }

    public function getCookie(Request $request): JsonResponse
    {

        return response()->json(
            [
                "userID" => $request->cookie("User-Id", "guest"),
                "isMember" => $request->cookie("Is-Member", "false")
            ]
        );
    }

    public function clearCookie(Request $request): Response
    {

        return response("Clear cookie")
            ->withoutCookie("Is-Member")
            ->withoutCookie("User_Id");
    }
}
