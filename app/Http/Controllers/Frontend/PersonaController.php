<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\TipoDocumento;
use Auth;

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
	
	public function index () {
	
		return view('frontend.persona.all');
	
	}
	
	public function listar_persona_ajax(Request $request) {
	
		$persona_model = new Persona;
		$p[]=$request->numero_documento;
		$p[]=$request->persona;
		$p[]=$request->estado;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $persona_model->listar_persona_ajax($p);
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
	
	
	public function modal_persona($id){
		$id_user = Auth::user()->id;
		$persona = new Persona;
		$tipoDocumento = TipoDocumento::all();
		if($id>0){
			$persona = Persona::find($id);
			
		} else {
			$persona = new Persona;
		}
        //print ("hola");exit();
		return view('frontend.persona.modal_persona',compact('id','persona','tipoDocumento'));

	}
	
	public function send_persona(Request $request){

        $sw = true;
		$msg = "";
		$id_user = Auth::user()->id;

		if($request->img_foto!=""){
			$filepath_tmp = public_path('img/frontend/tmp/');
			$filepath_nuevo = public_path('img/dni_asociados/');
			if (file_exists($filepath_tmp.$request->img_foto)) {
				copy($filepath_tmp.$request->img_foto, $filepath_nuevo.$request->img_foto);
			}
		}

		if($request->img_foto=="")$request->img_foto="ruta";

		if($request->id == 0){
            $buscapersona = Persona::where("documento", $request->numero_documento)->where("estado", "1")->get();

            if ($buscapersona->count()==0){

                $codigo=$request->codigo;
                $telefono = $request->telefono;
                $email = $request->email;
                
                $persona = new Persona;
                $persona->id_tipo_documento = $request->tipo_documento;
                $persona->documento = $request->numero_documento;
                $persona->a_paterno = $request->apellido_paterno;
                $persona->a_materno = $request->apellido_materno;
                $persona->nombres = $request->nombres;
                //$persona->fecha_nacimiento = "1990-01-01";
                //$persona->sexo = "M";
                $persona->telefono = $telefono;
                $persona->email = $email;
                $persona->foto = $request->img_foto;
                $persona->estado = "1";
				$persona->id_usuario_inserta = $id_user;
				$persona->id_usuario_actualiza = $id_user;
                $persona->save();
            }
            else{
                $sw = false;
                $msg = "El DNI ingresado ya existe !!!";
            }


		}else{
            
			$persona = Persona::find($request->id);
			$persona->id_tipo_documento = $request->tipo_documento;
			$persona->documento = $request->numero_documento;
			$persona->a_paterno = $request->apellido_paterno;
			$persona->a_materno = $request->apellido_materno;
			$persona->nombres = $request->nombres;
			$persona->telefono = $request->telefono;
			$persona->email = $request->email;
			$persona->foto = $request->img_foto;
			$persona->id_usuario_inserta = $id_user;
			$persona->id_usuario_actualiza = $id_user;
            $persona->save();

        }

        $array["sw"] = $sw;
        $array["msg"] = $msg;
        echo json_encode($array);

    }

	public function eliminar_persona($id,$estado)
    {
		$persona = Persona::find($id);
		$persona->estado = $estado;
		$persona->save();

		echo $persona->id;

    }
	
	public function upload(Request $request){

    	$filepath = public_path('img/frontend/tmp/');
		move_uploaded_file($_FILES["file"]["tmp_name"], $filepath.$_FILES["file"]["name"]);
		echo $_FILES['file']['name'];
	}
	
	
	
}
