<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use App\Http\Controllers\RouterController;
 
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
//login via passport (Oauth2)
Route::post('login', [AccessTokenController::class, 'issueToken'])->middleware(['api-login', 'throttle','cors']);
//add new router via UI (privided react UI in saprate folder with ajax and other layouts,including authorization)
Route::middleware(['auth:api','cors'])->post('/add-router', [RouterController::class,'addRouter']);
//get router via hostid
Route::middleware(['auth:api','cors'])->get('/get-router/{hostid}', [RouterController::class,'getRouter']);
//update  router via hostid
Route::middleware(['auth:api','cors'])->put('/update-router/{hostid}', [RouterController::class,'updateRouter']);
//delete router via hostid
Route::middleware(['auth:api','cors'])->delete('/update-router/{hostid}', [RouterController::class,'deleteRouter']);