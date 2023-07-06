<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inversionista;
use App\Models\Proyecto;

class InversionistaController extends Controller
{
    
	public function index(){
		
		$proyecto_model = new Proyecto;
		$proyecto = $proyecto_model->getProyecto();
		/*
		$tablaMaestra_model = new TablaMaestra;
		$departamento = $proyecto_model->getDepartamento();
		$estado_proyecto = $tablaMaestra_model->getMaestroByTipo("EST_PY");
		*/
		return view('frontend.inversiones.create',compact('proyecto'));
	
	}
	
	public function obtener_inversionista($id){
		$inversionista_model = new Inversionista;
		$proyecto_model = new Proyecto;
		$proyecto = null;
		$inversionista = $inversionista_model->getInversionistaByProyecto($id);
		if($id>0)$proyecto = $proyecto_model->getProyectoById($id);
		$data["inversionista"]=$inversionista;
		$data["proyecto"]=$proyecto;
		echo json_encode($data);
	}
	
	public function obtener_detalle_inversionista($id){
		$inversionista_model = new Inversionista;
		$detalle_inversionista = $inversionista_model->getDetalleInversionistaByInversionista($id);
		echo json_encode($detalle_inversionista);
	}
	
}
