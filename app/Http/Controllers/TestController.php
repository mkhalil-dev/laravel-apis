<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TestController extends Controller
{
    function sortString($string){
        $string = str_split($string);
        usort($string, 'strnatcasecmp');
        $sorted_string = join($string);
        return response()->json([
            "status" => "Success",
            "new_string" => $sorted_string
        ]);
    }

    function partitionNumber($num){
        if(!is_numeric($num)){
            return response()->json([
                "status" => "failed",
                "message" => "Not a number"
            ]);
        }
        $num = str_split($num);
        for ($i = 0; $i < sizeof($num); $i++){
            $x = $num[sizeof($num)-$i-1];
            $num[sizeof($num)-$i-1] = $x*(10**$i);
        }
        return response()->json([
            "status" => "Success",
            "new_string" => $num
        ]);
    }

    function binarySwitch($string){
        $string = str_split($string);
        $binary = [];;
        $num_hold = 0;
        for ($i = 0; $i < sizeof($string); $i++){
            if(is_numeric($string[$i])){
                $num_hold .= $string[$i];
            } else {
                if($num_hold){
                    array_push($binary, decbin($num_hold));
                    $num_hold = 0;
                }
                array_push($binary, $string[$i]);
            }
        }
        if($num_hold){
            array_push($binary, decbin($num_hold));
        }
        return response()->json([
            "status" => "Success",
            "binary_string" => join($binary)
        ]);
    }

    function prefixCalc($num){
        $num = explode(" ", $num);
        if($num[0][0] == '"'){
            $num[0] = $num[0][1];
            $num[sizeof($num)-1] = substr(end($num), 0, -1);
        }
        if(sizeof($num) < 3){
            return response()->json([
                "status" => "failed",
                "message" => "wrong format"
            ]);
        }
        $operator = $num[0];
        switch($operator){
            case '+':
                $p=0;
                for($i = 1; $i<sizeof($num) ;$i++){
                    $p += $num[$i];
                }
                break;
            case '-':
                $p=0;
                for($i = 1; $i<sizeof($num) ;$i++){
                    $p -= $num[$i];
                }
                break;
            case '*':
                $p=1;
                for($i = 1; $i<sizeof($num) ;$i++){
                    $p *= $num[$i];
                }
                break;
            default:
            return response()->json([
                "status" => "failed",
                "message" => "operator not supported"
            ]);
        }

        return response()->json([
            "status" => "Success",
            "result" => $p
        ]);
    }

}
