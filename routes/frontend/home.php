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

Route::get('expediente', [ExpedienteController::class, 'index'])->name('expediente');
Route::get('expediente/obtener_proyecto/{id}', [ExpedienteController::class, 'obtener_proyecto'])->name('expediente.obtener_proyecto');
Route::post('expediente/listar_expediente_ajax', [ExpedienteController::class, 'listar_expediente_ajax'])->name('expediente.listar_expediente_ajax');
Route::post('expediente/send', [ExpedienteController::class, 'send'])->name('expediente.send');
Route::get('expediente/obtener_expediente/{id}', [ExpedienteController::class, 'obtener_expediente'])->name('expediente.obtener_expediente');
Route::post('expediente/listar_expediente_movimiento_ajax', [ExpedienteController::class, 'listar_expediente_movimiento_ajax'])->name('expediente.listar_expediente_movimiento_ajax');
Route::post('expediente/listar_expediente_litigante_ajax', [ExpedienteController::class, 'listar_expediente_litigante_ajax'])->name('expediente.listar_expediente_litigante_ajax');
Route::get('expediente/modal_expediente_litigante/{id}', [ExpedienteController::class, 'modal_expediente_litigante'])->name('expediente.modal_expediente_litigante');
Route::post('expediente/send_litigante', [ExpedienteController::class, 'send_litigante'])->name('expediente.send_litigante');
Route::get('expediente/modal_expediente_movimiento/{id}', [ExpedienteController::class, 'modal_expediente_movimiento'])->name('expediente.modal_expediente_movimiento');
Route::post('expediente/send_movimiento', [ExpedienteController::class, 'send_movimiento'])->name('expediente.send_movimiento');
Route::post('expediente/listar_expediente_movimiento_seguimiento_ajax', [ExpedienteController::class, 'listar_expediente_movimiento_seguimiento_ajax'])->name('expediente.listar_expediente_movimiento_seguimiento_ajax');
Route::get('expediente/modal_expediente_seguimiento/{id}', [ExpedienteController::class, 'modal_expediente_seguimiento'])->name('expediente.modal_expediente_seguimiento');
Route::post('expediente/send_seguimiento', [ExpedienteController::class, 'send_seguimiento'])->name('expediente.send_seguimiento');
Route::get('expediente/eliminar_litigante/{id}', [ExpedienteController::class, 'eliminar_litigante'])->name('expediente.eliminar_litigante');
Route::get('expediente/eliminar_movimiento/{id}', [ExpedienteController::class, 'eliminar_movimiento'])->name('expediente.eliminar_movimiento');
Route::get('expediente/eliminar_seguimiento/{id}', [ExpedienteController::class, 'eliminar_seguimiento'])->name('expediente.eliminar_seguimiento');

Route::post('ingreso_gasto/listar_ingreso_gasto_ajax', [IngresoGastoController::class, 'listar_ingreso_gasto_ajax'])->name('ingreso_gasto.listar_ingreso_gasto_ajax');
Route::get('ingreso_gasto/modal_ingreso_gasto/{id}', [IngresoGastoController::class, 'modal_ingreso_gasto'])->name('ingreso_gasto.modal_ingreso_gasto');
Route::post('ingreso_gasto/send_ingreso_gasto', [IngresoGastoController::class, 'send_ingreso_gasto'])->name('ingreso_gasto.send_ingreso_gasto');
Route::get('ingreso_gasto/eliminar_ingreso_gasto/{id}', [IngresoGastoController::class, 'eliminar_ingreso_gasto'])->name('ingreso_gasto.eliminar_ingreso_gasto');


Route::get('empresa', [EmpresaController::class, 'index'])->name('empresa');
Route::post('empresa/listar_empresa_ajax', [EmpresaController::class, 'listar_empresa_ajax'])->name('empresa.listar_empresa_ajax');
Route::get('empresa/modal_empresa/{id}', [EmpresaController::class, 'modal_empresa'])->name('empresa.modal_empresa');
Route::post('empresa/send_empresa', [EmpresaController::class, 'send_empresa'])->name('empresa.send_empresa');

Route::get('empresa/eliminar_empresa/{id}/{estado}', [EmpresaController::class, 'eliminar_empresa'])->name('empresa.eliminar_empresa');


