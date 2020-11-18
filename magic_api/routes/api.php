<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\api\StaffTypesController;

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

// Route::apiResource('funcionarioTipos','api/StaffTypesController');

// Pega os tipos de funcionário
Route::get('/tiposfuncionarios',[StaffTypesController::class, 'index']);
// Pega um tipo de funcionário por meio do Id
Route::get('tiposfuncionarios/{id}',[StaffTypesController::class, 'show']);
// Cria um funcionário passando os valores com form-data
Route::post('/tiposfuncionarios',[StaffTypesController::class, 'store']);
// Atualiza um tipo de funcionário passando os valores com form-data
Route::put('/tiposfuncionarios',[StaffTypesController::class, 'update']);
// Deleta um tipo de funcionário
Route::delete('/tiposfuncionarios',[StaffTypesController::class, 'destroy']);
