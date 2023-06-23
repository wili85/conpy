<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    
	public function index(){
		
		$proyecto_model = new Proyecto;
		$departamento = $proyecto_model->getDepartamento();
		//print_r($departamento);
		
		return view('frontend.proyecto.create',compact('departamento'));
	
	}
	
	public function obtener_provincia($idDepartamento){
		
		$proyecto_model = new Proyecto;
		$provincia = $proyecto_model->getProvincia($idDepartamento);
		echo json_encode($provincia);
	}
	
	public function obtener_distrito($idProvincia){
		
		$proyecto_model = new Proyecto;
		$distrito = $proyecto_model->getDistrito($idProvincia);
		echo json_encode($distrito);
	}
	
	public function upload(Request $request){

    	$filepath = public_path('img/proyecto/tmp/');
		move_uploaded_file($_FILES["file"]["tmp_name"], $filepath.$_FILES["file"]["name"]);
		echo $_FILES['file']['name'];
	}
	
	
	public function modal($id){
		
		//$id_user = Auth::user()->id;
		/*
		$persona = new Persona;
		$negativo = "";
		if($id>0){
			$persona = Persona::find($id);
			$negativo = Negativo::where('persona_id',$id)->orderBy('id', 'desc')->first();
		} else {
			$persona = new Persona;
		}
        */
		
		return view('frontend.proyecto.modal',compact('id'/*,'persona','negativo'*/));

	}
	
}
