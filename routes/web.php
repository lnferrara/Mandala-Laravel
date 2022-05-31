<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function(){ return view('dashboard');})->name('dashboard');
/* Route::get('/dashboard', [ProfesionalController::class, 'birthday'])->middleware(['auth'])->name('dashboard'); */


//seccion empresas:

Route::get('/empresas', [EmpresaController::class, 'index'])
    ->middleware(['auth'])
    ->name('empresas');
Route::get('/ingresarEmpresa', [EmpresaController::class, 'create'])->middleware(['auth']);
Route::post('/ingresarEmpresa', [EmpresaController::class, 'store'])->middleware(['auth']);
Route::get('/modificarEmpresa/{id}', [EmpresaController::class, 'edit'])->middleware(['auth']);
Route::put('/modificarEmpresa', [EmpresaController::class, 'update'])->middleware(['auth']);
Route::get('/eliminarEmpresa/{id}', [EmpresaController::class, 'confirmDelete'])->middleware(['auth']);
Route::delete('/eliminarEmpresa', [EmpresaController::class, 'destroy'])->middleware(['auth']);



//seccion profesionales

Route::get('/profesionales', [ProfesionalController::class, 'index'])
    ->middleware(['auth'])
    ->name('profesionales');
Route::get('/ingresarProfesional', [ProfesionalController::class, 'create'])->middleware(['auth']);
Route::post('/ingresarProfesional', [ProfesionalController::class, 'store'])->middleware(['auth']);
Route::get('/modificarProfesional/{id}', [ProfesionalController::class, 'edit'])->middleware(['auth']);
Route::put('/modificarProfesional', [ProfesionalController::class, 'update'])->middleware(['auth']);
Route::get('/eliminarProfesional/{id}', [ProfesionalController::class, 'confirmDelete'])->middleware(['auth']);
Route::delete('/eliminarProfesional', [ProfesionalController::class, 'destroy'])->middleware(['auth']);
Route::get('/fichaProfesional/{id}', [ProfesionalController::class, 'show'])->middleware(['auth']);
Route::put('/fichaProfesional', [ProfesionalController::class, 'updateObs'])->middleware(['auth']);





require __DIR__ . '/auth.php';
