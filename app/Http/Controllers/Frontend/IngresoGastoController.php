<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inversionista;
use App\Models\Proyecto;
use App\Models\TablaMaestra;
use App\Models\Persona;

class IngresoGastoController extends Controller
{

    public function index(){
		
		$proyecto_model = new Proyecto;
		$proyecto = $proyecto_model->getProyecto();
		/*
		$tablaMaestra_model = new TablaMaestra;
		$departamento = $proyecto_model->getDepartamento();
		$estado_proyecto = $tablaMaestra_model->getMaestroByTipo("EST_PY");
		*/
		return view('frontend.gastos.create',compact('proyecto'));
	
	}
}
