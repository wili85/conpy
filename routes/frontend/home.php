<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\TermsController;
use Tabuna\Breadcrumbs\Trail;


use App\Http\Controllers\Frontend\ProyectoController;
use App\Http\Controllers\Frontend\ExpedienteController;
use App\Http\Controllers\Frontend\InversionistaController;
use App\Http\Controllers\Frontend\IngresosGastoController;
use App\Http\Controllers\Frontend\ConsultaController;
use App\Http\Controllers\Frontend\ReporteController;
use App\Http\Controllers\Frontend\MantenimientoController;
use App\Http\Controllers\Frontend\PersonaController;
use App\Http\Controllers\Frontend\EmpresaController;
use App\Http\Controllers\Frontend\DetalleInversionController;
use App\Http\Controllers\Frontend\IngresoGastoController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('frontend.index'));
    });

Route::get('terms', [TermsController::class, 'index'])
    ->name('pages.terms')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('frontend.index')
            ->push(__('Terms & Conditions'), route('frontend.pages.terms'));
    });


Route::get('proyecto', [ProyectoController::class, 'index'])->name('proyecto');
Route::get('proyecto/modal/{id}', [ProyectoController::class, 'modal'])->name('proyecto.modal');
Route::post('proyecto/upload', [ProyectoController::class, 'upload'])->name('proyecto.upload');
Route::get('proyecto/obtener_provincia/{id}', [ProyectoController::class, 'obtener_provincia'])->name('proyecto.obtener_provincia');
Route::get('proyecto/obtener_distrito/{id}', [ProyectoController::class, 'obtener_distrito'])->name('proyecto.obtener_distrito');
Route::post('proyecto/send', [ProyectoController::class, 'send'])->name('proyecto.send');
Route::post('proyecto/listar_proyecto_ajax', [ProyectoController::class, 'listar_proyecto_ajax'])->name('proyecto.listar_proyecto_ajax');
Route::get('proyecto/obtener_proyecto/{id}', [ProyectoController::class, 'obtener_proyecto'])->name('proyecto.obtener_proyecto');

Route::get('inversiones', [InversionistaController::class, 'index'])->name('inversiones');
Route::get('inversiones/obtener_inversionista/{id}', [InversionistaController::class, 'obtener_inversionista'])->name('inversiones.obtener_inversionista');
Route::get('inversiones/obtener_detalle_inversionista/{id}', [InversionistaController::class, 'obtener_detalle_inversionista'])->name('inversiones.obtener_detalle_inversionista');
Route::get('inversiones/modal_inversionista/{id}', [InversionistaController::class, 'modal_inversionista'])->name('inversiones.modal_inversionista');
Route::post('inversiones/send_inversionista', [InversionistaController::class, 'send_inversionista'])->name('inversiones.send_inversionista');
Route::get('inversiones/modal_inversion/{id}', [InversionistaController::class, 'modal_inversion'])->name('inversiones.modal_inversion');
Route::get('inversiones/obtener_inversionista_all/{id}', [InversionistaController::class, 'obtener_inversionista_all'])->name('inversiones.obtener_inversionista_all');

Route::get('persona/list_persona/{id}', [PersonaController::class, 'list_persona'])->name('persona.list_persona');
Route::get('persona/obtener_persona_empresa/{id_proyecto}', [PersonaController::class, 'obtener_persona_empresa'])->name('persona.obtener_persona_empresa');

Route::get('empresa/list_empresa/{id}', [EmpresaController::class, 'list_empresa'])->name('empresa.list_empresa');

Route::post('detalle_inversiones/send_detalle_inversiones', [DetalleInversionController::class, 'send_detalle_inversiones'])->name('inversiones.send_detalle_inversiones');

Route::get('ingresos_gastos', [IngresoGastoController::class, 'index'])->name('ingresos_gastos');









