<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CreatEventController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/user_register',[AuthController::class,'user_register']);
Route::post('/user_login',[AuthController::class,'user_login']);
Route::post('/admin_login',[AuthController::class,'admin_login']);


Route::group(['prefix'=>'user','middleware'=>['auth:user-api','scopes:user']],function (){
    Route::post('/user_logout',[AuthController::class,'user_logout']);
    Route::get('/user_profile',[AuthController::class,'user_profile']);
    Route::get('/type_event',[EventController::class,"type_event"]);
    Route::post('/gettown',[CreatEventController::class,"gettown"]);
    Route::post('/getarea',[CreatEventController::class,"getarea"]);
    Route::post('/getbudget',[CreatEventController::class,"getbudget"]);
    Route::post('/gethall',[CreatEventController::class,"gethall"]);
});
Route::group(['prefix'=>'admin','middleware'=>['auth:admin-api','scopes:admin']],function (){
    
    Route::post('/admin_logout',[AuthController::class,'admin_logout']);
    Route::get('/admin_profile',[AuthController::class,'admin_profile']);
    
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});





//Route::post('/GovernorateById',[EventController::class,"GovernorateById"]);
Route::post('/placeById',[EventController::class,"placeById"]);
Route::post('/GovernorateById',[CreatEventController::class,"GovernorateById"]); 
Route::post('/typeeventId',[CreatEventController::class,"typeeventId"]); 
Route::post('/gethall',[CreatEventController::class,"gethall"]);