<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TestController extends Controller
{
    function getUsers($string ="john"){
        $string = str_split($string);
        usort($string, 'strnatcasecmp');
        $sorted_string = join($string);
        return response()->json([
            "status" => "Success",
            "new_string" => $sorted_string
        ]);
    }
}
