<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlapanyagController;
use App\Http\Controllers\ItalController;
use App\Http\Controllers\KoktelController;
use App\Http\Controllers\TipusController;
use App\Http\Controllers\ReceptController;
use App\Http\Controllers\Auth\AuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addAlapanyag', [AlapanyagController::class, 'addAlapanyag']);
Route::get('/getAlapanyag', [AlapanyagController::class, 'getAlapanyag']);
Route::get('/getAlapanyagok', [AlapanyagController::class, 'getAlapanyagok']);
Route::post('/addItal', [ItalController::class, 'addItal']);
Route::get('/getItal', [ItalController::class, 'getItal']);
Route::get('/getItalok', [ItalController::class, 'getItalok']);
Route::get('/getReceptek', [KoktelController::class, 'getReceptek']);
Route::get('/getReceptByName', [KoktelController::class, 'getReceptByName']);
Route::get('/getTipus', [TipusController::class, 'getTipus']);
Route::get('/getTipusok', [TipusController::class, 'getTipusok']);
Route::post('/addTipus', [TipusController::class, 'addTipus']);
Route::post('/addRecept', [ReceptController::class, 'addRecept']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);