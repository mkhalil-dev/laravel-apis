<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'assignement'], function(){
    Route::get("/sort/{string}", [TestController::class, 'sortString']);
    Route::get("/part/{num}", [TestController::class, 'partitionNumber']);
    Route::get("/binary/{string}", [TestController::class, 'binarySwitch']);
    Route::get("/prefixcalc/{string}", [TestController::class, 'prefixCalc']);
});