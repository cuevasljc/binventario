<?php

use App\Http\Controllers\CdetalleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\SucursalstockController;
use App\Http\Controllers\TraspasoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\RecursosController;
use App\Models\Vdetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::group(['middleware' => ['auth:api']], function(){
    Route::apiResource('/client',ClientController::class);
    Route::apiResource('/cdetalle',CdetalleController::class);
    Route::apiResource('/compra',CompraController::class);
    Route::apiResource('/item',ItemController::class);
    Route::apiResource('/sucursal',SucursalController::class);
    Route::apiResource('/sucursalstock',SucursalstockController::class);
    Route::apiResource('/traspaso',TraspasoController::class);
    Route::apiResource('/user',UserController::class);
    Route::apiResource('/vdetalle',Vdetalle::class);
    Route::apiResource('/vendor',VendorController::class);
    Route::apiResource('/venta',VentaController::class);

    Route::get('/itemone', [RecursosController::class, 'itemone']);
    Route::get('/clientone', [RecursosController::class, 'clientone']);
});

