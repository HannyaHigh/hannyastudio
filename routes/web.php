<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\contactoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\GaleriaController;


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


Route::get('/dashboard', function () {
    return view('dashboard');
});

/* ROUTE FOR USERS AND SAVING DATES */

//route::post('saveusers', [usersController::class, 'saveusers'])->name('saveusers');
route::post('guardarusuarios', [usuariosController::class, 'guardarusuarios'])->name('guardarusuarios');
route::get('users', [usuariosController::class, 'users'])->name('users');

//route::get('eloquent', [usersController::class, 'eloquent'])->name('eloquent');
route::get('usersreports', [usuariosController::class, 'usersreports'])->name('usersreports');
route::get('blockusers/{idusuaio}', [usuariosController::class, 'blockusers'])->name('blockusers');
route::get('reactiveusers/{idusuaio}', [usuariosController::class, 'reactiveusers'])->name('reactiveusers');
route::get('deleteusers/{idusuaio}', [usuariosController::class, 'deleteusers'])->name('deleteusers');

route::get('modifyusers/{idusuaio}', [usuariosController::class, 'modifyusers'])->name('modifyusers');
route::post('savechanges', [usuariosController::class, 'savechanges'])->name('savechanges');



// Routes for contact and clients
route::get('cliente',[ClienteController::class, 'cliente'])->name('cliente');
route::post('guardarcliente',[ClienteController::class, 'guardarcliente'])->name('guardarcliente');
route::get('reportecliente',[ClienteController::class, 'reportecliente'])->name('reportecliente');
route::get('desactivacliente/{idcliente}',[ClienteController::class, 'desactivacliente'])->name('desactivacliente');
route::get('activarcliente/{idcliente}',[ClienteController::class, 'activarcliente'])->name('activarcliente');
route::get('borracliente/{idcliente}',[ClienteController::class, 'borracliente'])->name('borracliente');
route::get('modificacliente/{idcliente}',[ClienteController::class, 'modificacliente'])->name('modificacliente');
route::post('guardarcambiocliente',[ClienteController::class, 'guardarcambiocliente'])->name('guardarcambiocliente');


route::get('contacto',[contactoController::class, 'contacto'])->name('contacto');
route::post('guardarcontacto',[contactoController::class, 'guardarcontacto'])->name('guardarcontacto');
route::get('reportecontacto',[contactoController::class, 'reportecontacto'])->name('reportecontacto');
route::get('desactivacontacto/{idcontacto}',[contactoController::class, 'desactivacontacto'])->name('desactivacontacto');
route::get('activarcontacto/{idcontacto}',[contactoController::class, 'activarcontacto'])->name('activarcontacto');
route::get('borracontacto/{idcontacto}',[contactoController::class, 'borracontacto'])->name('borracontacto');
route::get('modificacontacto/{idcontacto}',[contactoController::class, 'modificacontacto'])->name('modificacontacto');
route::post('guardarcambiocontacto',[contactoController::class, 'guardarcambiocontacto'])->name('guardarcambiocontacto');



// routes for service and galery


route::get('servicio',[ServicioController::class, 'servicio'])->name('servicio');
route::post('guardarservicio',[ServicioController::class, 'guardarservicio'])->name('guardarservicio');
route::get('reporteservicio',[ServicioController::class, 'reporteservicio'])->name('reporteservicio');
route::get('desactivaservicio/{idservicio}',[ServicioController::class, 'desactivaservicio'])->name('desactivaservicio');
route::get('activarservicio/{idservicio}',[ServicioController::class, 'activarservicio'])->name('activarservicio');
route::get('borraservicio/{idservicio}',[ServicioController::class, 'borraservicio'])->name('borraservicio');
route::get('modificaservicio/{idservicio}',[ServicioController::class, 'modificaservicio'])->name('modificaservicio');
route::post('guardacambioservicio',[ServicioController::class, 'guardacambioservicio'])->name('guardacambioservicio');



route::get('galeria',[GaleriaController::class, 'galeria'])->name('galeria');
route::post('guardargaleria',[GaleriaController::class, 'guardargaleria'])->name('guardargaleria');
route::get('reportegaleria',[GaleriaController::class, 'reportegaleria'])->name('reportegaleria');
route::get('desactivagaleria/{idgaleria}',[GaleriaController::class, 'desactivagaleria'])->name('desactivagaleria');
route::get('activargaleria/{idgaleria}',[GaleriaController::class, 'activargaleria'])->name('activargaleria');
route::get('borragaleria/{idgaleria}',[GaleriaController::class, 'borragaleria'])->name('borragaleria');
route::get('modificagaleria/{idgaleria}',[GaleriaController::class, 'modificagaleria'])->name('modificagaleria');
route::post('guardacambiogaleria',[GaleriaController::class, 'guardacambiogaleria'])->name('guardacambiogaleria');



Route::get('/', function () {
    return view('welcome');
});
