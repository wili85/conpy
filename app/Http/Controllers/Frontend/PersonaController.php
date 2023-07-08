<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    
	public function list_persona($term)
    {
		$persona_model = new Persona;
		$persona = $persona_model->getPersonaBuscar($term);
		return response()->json($persona);
    }
	
	public function obtener_persona_empresa($id_proyecto){
		$persona_model = new Persona;
		//$persona_empresa = $persona_model->getPlanSupervision($id_proyecto);
		//echo json_encode($persona_empresa);
	}
	
}
