<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ProyectoImagene;
use Auth;

class ProyectoController extends Controller
{
    
	public function index(){
		
		$proyecto_model = new Proyecto;
		$departamento = $proyecto_model->getDepartamento();
		//print_r($departamento);
		
		return view('frontend.proyecto.create',compact('departamento'));
	
	}
	
	public function send(Request $request){

        $sw = true;
		$msg = "";
		$id_user = Auth::user()->id;
		$img_foto = $request->img_foto;
		
		$proyecto = new Proyecto;
		//$proyecto->id_persona = $request->id_persona;
		$proyecto->nombre_py = $request->nombre_py;
		$proyecto->detalle_py = $request->detalle_py;
		$proyecto->cod_ubigeo = $request->ubigeodireccionprincipal;
		$proyecto->estado = 1;
		$proyecto->save();
		
		$id_proyecto = $proyecto->id;
		
		foreach($img_foto as $row){
			
			if($row!=""){
				$filepath_tmp = public_path('img/proyecto/tmp/');
				$filepath_nuevo = public_path('img/proyecto/definitivo/');
				if (file_exists($filepath_tmp.$row)) {
					copy($filepath_tmp.$row, $filepath_nuevo.$row);
				}
				
				$proyectoImagen = new ProyectoImagene;
				$proyectoImagen->id_proyecto = $id_proyecto;
				$proyectoImagen->ruta = "img/proyecto/definitivo/".$row;
				$proyectoImagen->estado = 1;
				$proyectoImagen->id_usuario_created = $id_user;
				$proyectoImagen->id_usuario_updated = $id_user;
				$proyectoImagen->save();
			}
			
		}
		
		
	}
	
	
	public function listar_proyecto_ajax(Request $request){

		$proyecto_model = new Proyecto;
		$p[]=$request->nombre_py_bus;
		$p[]=$request->detalle_py_bus;
		$p[]=$request->estado;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $proyecto_model->listar_proyecto_ajax($p);
		$iTotalDisplayRecords = isset($data[0]->totalrows)?$data[0]->totalrows:0;

		$result["PageStart"] = $request->NumeroPagina;
		$result["pageSize"] = $request->NumeroRegistros;
		$result["SearchText"] = "";
		$result["ShowChildren"] = true;
		$result["iTotalRecords"] = $iTotalDisplayRecords;
		$result["iTotalDisplayRecords"] = $iTotalDisplayRecords;
		$result["aaData"] = $data;

		echo json_encode($result);

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
