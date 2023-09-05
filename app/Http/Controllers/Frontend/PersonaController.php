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

        //$validaDni = $this -> consultaDniWS($request->numero_documento);
        //print_r ($validaDni);
        //exit();

        
        //print_r($buscapersona->count());
        //exit();

        //if ($buscapersona)

        //$id_r =  $request->id;

		if($request->img_foto!=""){
			$filepath_tmp = public_path('img/frontend/tmp/');
			$filepath_nuevo = public_path('img/dni_asociados/');
			if (file_exists($filepath_tmp.$request->img_foto)) {
				copy($filepath_tmp.$request->img_foto, $filepath_nuevo.$request->img_foto);
			}
		}

		if($request->img_foto=="")$request->img_foto="ruta";

		if($request->id == 0){
            $buscapersona = Persona::where("numero_documento", $request->numero_documento)->where("estado", "1")->get();

            if ($buscapersona->count()==0){

                $codigo=$request->codigo;
                $telefono = $request->telefono;
                $email = $request->email;

                if($codigo==""){
                    $array_tipo_documento = array('DNI' => 'DNI','CARNET_EXTRANJERIA' => 'CE','PASAPORTE' => 'PAS','RUC' => 'RUC','CEDULA' => 'CED','PTP/PTEP' => 'PTP/PTEP', 'CPP/CSR' => 'CPP/CSR');
                    $codigo = $array_tipo_documento[$request->tipo_documento]."-".$request->numero_documento;
                }
                if($telefono=="")$telefono="999999999";
                if($email=="")$email="mail@mail.com";

                $persona = new Persona;
                $persona->tipo_documento = $request->tipo_documento;
                $persona->numero_documento = $request->numero_documento;
                $persona->apellido_paterno = $request->apellido_paterno;
                $persona->apellido_materno = $request->apellido_materno;
                $persona->nombres = $request->nombres;
                $persona->codigo = $codigo;
                $persona->ocupacion = $request->ocupacion;
                $persona->fecha_nacimiento = "1990-01-01";
                $persona->sexo = "M";
                //$persona->telefono = "999999999";
                $persona->telefono = $telefono;
                //$persona->email = "mail@mail.com";
                $persona->email = $email;
                //$persona->foto = "mail@mail.com";
                $persona->foto = $request->img_foto;
                $persona->estado = "1";
                $persona->ruc = $request->ruc;
                $persona->flag_negativo = $request->flag_negativo;
                $persona->save();

                $negativo = new Negativo;
                $negativo->persona_id = $persona->id;
                $negativo->flag_negativo = $request->flag_negativo;
                $negativo->observacion = $request->observacion;
                $negativo->fecha = Carbon::now()->format('Y-m-d');
            }
            else{
                $sw = false;
                $msg = "El DNI ingresado ya existe !!!";
            }


		}else{
            
            //$buscapersona = Persona::where("numero_documento", $request->numero_documento)->where("estado", "1")->get();
            //echo $buscapersona[0]->id;
            //exit();
            //$request->id = $buscapersona[0]->id;

			$persona = Persona::find($request->id);
			$persona->tipo_documento = $request->tipo_documento;
			$persona->numero_documento = $request->numero_documento;
			$persona->apellido_paterno = $request->apellido_paterno;
			$persona->apellido_materno = $request->apellido_materno;
			$persona->nombres = $request->nombres;
			$persona->codigo = $request->codigo;			
            $persona->ocupacion = $request->ocupacion; 
			$persona->telefono = $request->telefono;
			$persona->email = $request->email;
			$persona->foto = $request->img_foto;
            $persona->ruc = $request->ruc;
			$flag_negativo = $persona->flag_negativo;
			
            $persona->flag_negativo = $request->flag_negativo;
            //print ($persona->ruc);exit();
			$persona->save();

            
            if($flag_negativo!=$request->flag_negativo){
                $negativo = new Negativo;
                $negativo->persona_id = $persona->id;
                $negativo->flag_negativo = $request->flag_negativo;
                $negativo->observacion = $request->observacion;
                $negativo->fecha = Carbon::now()->format('Y-m-d');
                $negativo->save();
            }else{
                $negativo = Negativo::where('persona_id',$persona->id)->orderBy('id', 'desc')->first();
                if($negativo && $negativo->observacion=="" && $request->observacion!=""){
                    $negativo->observacion = $request->observacion;
                    $negativo->save();
                }
             }
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

	
}
