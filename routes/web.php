<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\IngresoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 Route::get('/dashboard', [ProfesionalController::class, 'birthday'])->middleware(['auth'])->name('dashboard');


//seccion empresas:

Route::get('/empresas', [EmpresaController::class, 'index'])
    ->middleware(['auth'])
    ->name('empresas');
/* Route::get('/ingresarEmpresa', [EmpresaController::class, 'create'])->middleware(['auth']); */
Route::post('/empresas', [EmpresaController::class, 'store'])->middleware(['auth']);
Route::put('/empresas', [EmpresaController::class, 'update'])->middleware(['auth']);
Route::delete('/empresas', [EmpresaController::class, 'destroy'])->middleware(['auth']);



//seccion profesionales

Route::get('/profesionales', [ProfesionalController::class, 'index'])
    ->middleware(['auth'])
    ->name('profesionales');

Route::get('/ingresarProfesional', [ProfesionalController::class, 'create'])->middleware(['auth']);
Route::post('/ingresarProfesional', [ProfesionalController::class, 'store'])->middleware(['auth']);
/* Route::get('/modificarProfesional/{id}', [ProfesionalController::class, 'edit'])->middleware(['auth']); */
Route::put('/profesionales', [ProfesionalController::class, 'update'])->middleware(['auth']);
/* Route::get('/eliminarProfesional/{id}', [ProfesionalController::class, 'confirmDelete'])->middleware(['auth']); */
Route::delete('/profesionales', [ProfesionalController::class, 'destroy'])->middleware(['auth']);
Route::post('/profesionales', [ProfesionalController::class, 'updateObs'])->middleware(['auth']);

//seccion gastos

Route::get('/gastos', [GastoController::class, 'index'])
    ->middleware(['auth'])
    ->name('gastos');
Route::get('/ingresoGastos', [GastoController::class, 'create'])
    ->middleware(['auth'])
    ->name('ingresoGastos');
Route::post('/ingresoGastos', [GastoController::class, 'store'])->middleware(['auth']);

Route::get('/ingresoDinero', [IngresoController::class, 'create'])
    ->middleware(['auth'])
    ->name('ingresos');

Route::post('/ingresoDinero', [IngresoController::class, 'store'])->middleware(['auth']);

Route::get('/editarImporte/{id}', [IngresoController::class, 'edit'])->middleware(['auth']);
Route::put('/editarImporte', [IngresoController::class, 'update'])->middleware(['auth']);
Route::get('/editarGasto/{id}', [GastoController::class, 'edit'])->middleware(['auth']);
Route::put('/editarGasto', [GastoController::class, 'update'])->middleware(['auth']);

Route::get('/eliminarGasto/{id}', [GastoController::class, 'destroy'])->middleware(['auth']);
Route::get('/eliminarImporte/{id}', [IngresoController::class, 'destroy'])->middleware(['auth']);


require __DIR__ . '/auth.php';
