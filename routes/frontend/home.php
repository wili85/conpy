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









