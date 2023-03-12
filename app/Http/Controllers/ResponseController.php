<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ResponseController extends Controller
{
    public function response(Request $request): Response
    {
        return response("hello response");
    }

    public function header(Request $request): Response
    {

        $data = [
            "firstName" => "Ainul",
            "lastName" => "Yaqin"
        ];
        return response(
            json_encode($data),
            200
        )->header("Content-Type", "Application/json")
            ->withHeaders(
                [
                    "Author" => "radenyaqien",
                    "App" => "Belajar Laravel"
                ]
            );
    }

    public function responseView(Request $request): Response
    {
        return response()
            ->view(
                "hello",
                ["name" => "Yaqin"]
            );
    }

    public function responseJson(Request $request): JsonResponse
    {

        $data = [
            "firstName" => "Ainul",
            "lastName" => "Yaqin"
        ];
        return response()->json(
            $data
        );
    }

    public function responseFile(Request $request): BinaryFileResponse
    {
        return response()->file(
            storage_path("app/public/pictures/kannedy.png")
        );
    }
    public function responseDownload(Request $request): BinaryFileResponse
    {
        return response()->download(
            storage_path("app/public/pictures/kannedy.png")
        );
    }

}
