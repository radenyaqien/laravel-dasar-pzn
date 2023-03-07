<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InputController extends Controller
{
    public function hello(Request $request): string
    {
        $name = $request->input("name");
        return "Hello $name";
    }

    public function helloFirstName(Request $request): string
    {
        $firstName = $request->input("name.first");

        return "Hello $firstName";
    }

    public function helloInput(Request $request): string
    {
        $input = $request->input();
        return json_encode($input);
    }

    public function helloArray(Request $request): string
    {
        //mengambil semua product name dalam array
        $input = $request->input("product.*.name");
        return json_encode($input);
    }

    public function inputType(Request $request): string
    {

        $name = $request->input("name");
        $isMarried = $request->boolean("ismarried");
        $birtDate = $request->date("birtdate", "Y-m-d");

        return json_encode(
            [
                "name" => $name,
                "isMarried" => $isMarried,
                "birthdate" => $birtDate->format("Y-m-d")
            ]
        );
    }

    public function filterOnly(Request $request): string
    {
        $name = $request->only("name.first", "name.last");
        return json_encode($name);
    }

    public function filterExcept(Request $request): string
    {
        $admin = $request->except("admin");
        return json_encode($admin);
    }

    public function filterMerge(Request $request): string
    {
        $request->merge(["admin"=> false]);
        $user = $request->input();
        return json_encode($user);
    }
}
