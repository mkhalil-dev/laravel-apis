<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TestController extends Controller
{
    function getUsers($name ="john"){
        $name = str_split($name);
        usort($name, 'strnatcasecmp');
        $name = join($name);
        return response()->json([
            "status" => "Success",
            "message" => $name
        ]);
    }
}
