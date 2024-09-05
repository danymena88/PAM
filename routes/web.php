<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LineaProduccionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\VentasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'loginGet']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerGet']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth');
Route::get('/admin/add-usuarios', [AdminController::class, 'addUsuarios'])->middleware('auth');
Route::get('/admin/grupos', [AdminController::class, 'addGrupos'])->middleware('auth');
Route::post('/admin/addgrupo', [AdminController::class, 'nuevoGrupo'])->middleware('auth');
Route::get('/admin/eliminar-grupo/{id}', [AdminController::class, 'eliminarGrupo'])->middleware('auth');

Route::get('/admin/ver-cursos', [AdminController::class, 'vercursos'])->middleware('auth');
Route::get('/admin/acciones-cursos', [AdminController::class, 'accionescursos'])->middleware('auth');
Route::post('/admin/acciones-cursos', [AdminController::class, 'accionescursosPost']);
Route::post('/admin/eliminar-curso', [AdminController::class, 'eliminarCurso']);
Route::get('/admin/usuarios-acciones', [AdminController::class, 'accionesusuarios'])->middleware('auth');
Route::get('admin/search', [AdminController::class, 'search']);
Route::get('/admin/usuarios-acciones/{id}', [AdminController::class, 'accionesId'])->middleware('auth');
Route::get('/admin/usuarios-acciones/{id}/eliminar', [AdminController::class, 'eliminarUserId'])->middleware('auth');
Route::post('/admin/usuarios-acciones/{id}/update', [AdminController::class, 'updateUserId'])->middleware('auth');
Route::get('/admin/capitulos-acciones', [AdminController::class, 'accionescapitulos'])->middleware('auth');
Route::post('/admin/capitulos-acciones', [AdminController::class, 'accionescapitulosPost'])->middleware('auth');
Route::get('/cursos/{curso}', [GeneralController::class, 'getCurso']);
Route::get('/cursos/suscripcion/{id_curso}', [VentasController::class, 'suscripcion'])->middleware('auth');
Route::get('/cursos/{curso}/{num}', [VentasController::class, 'verCapitulos'])->middleware('auth');
Route::get('/admin/capitulos-acciones/{id}/eliminar', [AdminController::class, 'eliminarcapitulo'])->middleware('auth');
Route::get('/cursos', [GeneralController::class, 'getCursos']);





Route::get('/linea_produccion/lista', [LineaProduccionController::class, 'index'])->middleware('auth');

Route::get('/linea_produccion/nuevo', [LineaProduccionController::class, 'create']);
Route::post('/linea_produccion/nuevo', [LineaProduccionController::class, 'store']);
Route::get('/linea_produccion/eliminar/{id}', [LineaProduccionController::class, 'destroy']);
Route::get('/linea_produccion/actualizar/{id}', [LineaProduccionController::class, 'edit']);
Route::post('/linea_produccion/actualizar/{id}', [LineaProduccionController::class, 'update']);

Route::get('/producto/lista', [ProductoController::class, 'index']);
Route::get('/producto/nuevo', [ProductoController::class, 'create']);
Route::post('/producto/nuevo', [ProductoController::class, 'store']);