<?php

use App\Http\Controllers\api\StaffMembersController;
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
Route::get('/tiposfuncionarios', [StaffTypesController::class, 'index']);
// Pega um tipo de funcionário por meio do Id
Route::get('tiposfuncionarios/{id}', [StaffTypesController::class, 'show']);
// Cria um funcionário passando os valores com form-data
Route::post('/tiposfuncionarios', [StaffTypesController::class, 'store']);
// Atualiza um tipo de funcionário passando os valores com form-data
Route::put('/tiposfuncionarios', [StaffTypesController::class, 'update']);
// Deleta um tipo de funcionário
Route::delete('/tiposfuncionarios', [StaffTypesController::class, 'destroy']);


// ------------------------------------------------------
// -------------------- Staff Members -------------------
// ------------------------------------------------------

// Pega todos funcionários
Route::get('/funcionarios', [StaffMembersController::class, 'index']);
// Pega um funcionário por meio do Id
Route::get('/funcionario/{id}', [StaffMembersController::class, 'show']);
// Criar um novo funcionário
Route::post('/funcionarios', [StaffMembersController::class, 'store']);
// Atualiza um tipo de funcionário passando os valores com form-data
Route::put('/funcionarios', [StaffMembersController::class, 'update']);
// Deleta um tipo de funcionário
Route::delete('/funcionarios', [StaffMembersController::class, 'destroy']);
