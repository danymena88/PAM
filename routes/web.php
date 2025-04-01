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
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'admin'])->middleware('auth');

Route::get('/admin/add-usuarios', [AdminController::class, 'addUsuarios'])->middleware('auth');
Route::post('/admin/adduser', [AdminController::class, 'addUser'])->middleware('auth');
Route::get('admin/search', [AdminController::class, 'search']);

Route::get('/admin/mod-user', [AdminController::class, 'modUser'])->middleware('auth');
Route::get('admin/search-user', [AdminController::class, 'busquedaParaUsuario']);
Route::get('/admin/mod-user/mod/{id}', [AdminController::class, 'modUserMod'])->middleware('auth');
Route::post('/admin/mod-user/mod/modificadoUser', [AdminController::class, 'modificadoUser'])->middleware('auth');

Route::get('/admin/grupos', [AdminController::class, 'addGrupos'])->middleware('auth');
Route::post('/admin/addgrupo', [AdminController::class, 'nuevoGrupo'])->middleware('auth');
Route::get('/admin/eliminar-grupo/{id}', [AdminController::class, 'eliminarGrupo'])->middleware('auth');
Route::get('/admin/modificar-grupo/{id}', [AdminController::class, 'modificarGrupo'])->middleware('auth');
Route::post('/admin/modificar-grupo/updategrupo', [AdminController::class, 'updateGrupo'])->middleware('auth');
Route::get('/admin/search-g', [AdminController::class, 'searchg']);

Route::get('/admin/envio', [AdminController::class, 'envio'])->middleware('auth');
Route::get('/admin/mis-envios', [AdminController::class, 'misEnvios'])->middleware('auth');
Route::get('/admin/envio-anular-u', [AdminController::class, 'envioUsuarioAnular']);
Route::get('/admin/anular-envio', [AdminController::class, 'envioUsuarioConfirmacion'])->middleware('auth');
Route::get('/admin/envio-anulado', [AdminController::class, 'envioAnulado'])->middleware('auth');
Route::get('admin/search-envio', [AdminController::class, 'busquedaParaEnvio']);
Route::get('admin/search-modenvio', [AdminController::class, 'busquedaParaModEnvio']);
Route::get('admin/envio-usuario', [AdminController::class, 'envioUsuario']);
Route::get('admin/enviado',[AdminController::class, 'enviadoPaquete']);

Route::get('/admin/modificar-envio', [AdminController::class, 'modEnvio'])->middleware('auth');

Route::get('/admin/glob-stats', [AdminController::class, 'globStats'])->middleware('auth');

Route::get('/admin/gest-paquete', [AdminController::class, 'gestPaquete'])->middleware('auth');
Route::get('admin/get-descripcion', [AdminController::class, 'getDescripcion']);
Route::get('/admin/get-anular', [AdminController::class, 'getAnular']);
Route::get('/admin/envio-aprobsal', [AdminController::class, 'envioAprob'])->middleware('auth');
Route::get('admin/get-entrante', [AdminController::class, 'gestEntrante']);
Route::get('admin/get-entrante2', [AdminController::class, 'gestEntrante2']);
Route::get('/admin/envio-aprobent', [AdminController::class, 'envioAprobent'])->middleware('auth');
Route::get('/admin/recibido', [AdminController::class, 'envioRecibido'])->middleware('auth');
Route::get('/admin/cambio-destinatario/{id_envio}', [AdminController::class, 'modDestinatario'])->middleware('auth');

Route::get('/admin/codigos', [AdminController::class, 'codigos'])->middleware('auth');
Route::get('/admin/impresion-codigos', [AdminController::class, 'impresionCodigos'])->middleware('auth');
Route::get('admin/search-codigos', [AdminController::class, 'searchCodigos']);
Route::get('/admin/ya-impresos', [AdminController::class, 'yaImpresos'])->middleware('auth');

Route::post('/admin/verif-contra', [AdminController::class, 'verifContra'])->middleware('auth');
Route::get('/admin/cambio-contra', [AdminController::class, 'cambioContra'])->middleware('auth');

Route::get('/admin/busquedas', [AdminController::class, 'misBusquedas'])->middleware('auth');

Route::get('admin/search-busquedas', [AdminController::class, 'busquedaParaBusquedas']);
Route::get('admin/search-resultados', [AdminController::class, 'busquedaParaResultados']);
Route::get('admin/get-descripcion2', [AdminController::class, 'getDescripcion2']);

Route::get('/admin/search-saliente', [AdminController::class, 'searchSaliente'])->middleware('auth');
Route::get('/admin/search-entrante', [AdminController::class, 'searchEntrante'])->middleware('auth');






