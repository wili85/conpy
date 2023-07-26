<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\TablaMaestra;
use App\Models\MateriaExpediente;
use App\Models\OrganoJurisdiccionale;
use App\Models\DistritoJudiciale;

class ExpedienteController extends Controller
{
    public function index(){
		
		$proyecto_model = new Proyecto;
		$tablaMaestra_model = new TablaMaestra;
		$materiaExpediente_model = new MateriaExpediente;
		$organoJurisdiccionale_model = new OrganoJurisdiccionale;
		$distritoJudiciale_model = new DistritoJudiciale;
		
		$departamento = $proyecto_model->getDepartamento();
		$estado_expediente = $tablaMaestra_model->getMaestroByTipo("EST_EXP");
		$materia = $materiaExpediente_model->getMateria();
		$organo = $organoJurisdiccionale_model->getOrgano();
		$distrito_judicial = $distritoJudiciale_model->getDistritoJudicial();
		$proyecto = $proyecto_model->getProyecto();
		
		return view('frontend.expediente.create',compact('departamento','estado_expediente','materia','organo','distrito_judicial','proyecto'));
	
	}
	
	public function obtener_proyecto($id){
		
		$proyecto_model = new Proyecto;
		$proyecto = $proyecto_model->getProyectoById($id);
		//$proyecto_imagen = $proyecto_model->getProyectoImagenById($id);
		$array["proyecto"] = $proyecto;
		//$array["proyecto_imagen"] = $proyecto_imagen;
		echo json_encode($array);
	}
	
	
}
