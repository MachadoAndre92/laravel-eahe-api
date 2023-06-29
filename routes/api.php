<?php

use App\Http\Controllers\LeituraController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZonaController;
use App\Http\Controllers\VentoinhaController;
use App\Http\Controllers\ConfigController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Protected Routes
Route::group(['middleware' =>['auth:sanctum']], function(){
    //Route::get('/leituras',[LeituraController::class, 'index']);
    Route::post('/logout',[UserController::class, 'logout']);
    Route::get('/users',[UserController::class, 'index']);
});


//User
Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);



############################Leituras##########################


//Rotas get Leituras
Route::get('/leituras',[LeituraController::class, 'index']);
Route::get('/leituras/{id}',[LeituraController::class, 'show']);
Route::get('/leituras/sensor/{sensor_id}',[LeituraController::class, 'show_by_sensor']);
Route::get('/leituras/zona/{zona_id}',[LeituraController::class, 'show_by_zona']);

//Rotas POST Leituras
Route::post('/leituras',[LeituraController::class,'store']);

//Rotas PUT Leituras
Route::put('/leituras/{id}',[LeituraController::class,'update']);

//Rotas DELETE Leituras
Route::delete('/leituras/{id}',[LeituraController::class,'destroy']);


############################Sensores##########################

//Rotas Get Sensor
Route::get('/sensores',[SensorController::class, 'index']);
Route::get('/sensores/{id}', [SensorController::class, 'show']);

//Rotas POST Sensor
Route::post('/sensores',[SensorController::class, 'store']);

//Rotas PUT Sensor
Route::put('/sensores/{id}',[SensorController::class,'update']);

//Rotas DELETE Sensor
Route::delete('/sensores/{id}',[SensorController::class,'destroy']);

############################Zonas##########################

//Rotas GET Zonas
Route::get('/zonas',[ZonaController::class, 'index']);
Route::get('/zonas/{id}', [ZonaController::class, 'show']);

//Rotas POST Zonas
Route::post('zonas', [ZonaController::class, 'store']);

//Rotas PUT Zonas
Route::put('/zonas/{id}',[ZonaController::class,'update']);
Route::put('/zonas/{id}/ar',[ZonaController::class,'update_ar']);

//Rotas DELETE Zonas
Route::delete('/zonas/{id}',[ZonaController::class,'destroy']);

############################Ventoinhas##########################

//Rotas GET Ventoinhas
Route::get('/ventoinhas',[VentoinhaController::class, 'index']);
Route::get('/ventoinhas/{id}', [VentoinhaController::class, 'show']);

//Rotas POST Ventoinhas
Route::post('ventoinhas', [VentoinhaController::class, 'store']);

//Rotas PUT Ventoinhas
Route::put('/ventoinhas/{id}',[VentoinhaController::class,'update']);

//Rotas DELETE Ventoinhas
Route::delete('/ventoinhas/{id}',[VentoinhaController::class,'destroy']);

############################Config##########################

//Rotas GET Config
Route::get('/config',[ConfigController::class, 'index']);
Route::get('/config/{id}', [ConfigController::class, 'show']);
Route::get('/config/zona/{zona_id}', [ConfigController::class, 'showByZona']);

//Rotas POST Config
Route::post('config', [ConfigController::class, 'store']);

//Rotas PUT Config
Route::put('/config/{id}',[ConfigController::class,'update']);

//Rotas DELETE Config
Route::delete('/config/{id}',[ConfigController::class,'destroy']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
