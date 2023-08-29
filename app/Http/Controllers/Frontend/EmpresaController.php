<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;
use Auth;

class EmpresaController extends Controller
{
    
	public function list_empresa($term)
    {
		$empresa_model = new Empresa;
		$empresa = $empresa_model->getEmpresaBuscar($term);
		return response()->json($empresa);
    }
	
	public function index(){
	
		return view('frontend.empresa.all');
	
	}
	
	public function listar_empresa_ajax(Request $request){
	
		$empresa_model = new Empresa;
		$p[]=$request->nombre;
		$p[]=$request->ruc;
		$p[]=$request->estado;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $empresa_model->listar_empresa_ajax($p);
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
	
	public function modal_empresa($id){
		
		$id_user = Auth::user()->id;
		$empresa = new Empresa;
		if($id>0)$empresa = Empresa::find($id);
		else $empresa = new Empresa;
		
		return view('frontend.empresa.modal_empresa',compact('id','empresa'));
	
	}
	
	public function consultaRucWS($ruc){
    
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apiperu.dev/api/ruc/'.$ruc,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 20b6666ddda099db4204cf53854f8ca04d950a4eead89029e77999b0726181cb'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;

    }
	
	public function send_empresa(Request $request){
		
		$sw = true;
		$msg = "";

        $validaRuc = $this->consultaRucWS($request->ruc);
	
		if($request->id == 0){
			
			$empresaExiste = Empresa::where("ruc",$request->ruc)->get();
			if(count($empresaExiste)==0){
				$empresa = new Empresa;
				$empresa->ruc = $request->ruc;
				$empresa->nombre = $request->nombre;
				$empresa->direccion = $request->direccion;
				$empresa->email = $request->email;
				$empresa->telefono = $request->telefono;
				$empresa->save();
			}else{
				$sw = false;
				$msg = "El Ruc ingresado ya existe !!!";
			}
			
		}else{
			$empresaExiste = Empresa::where('ruc', '=', trim($request->ruc))->where('estado', '1')->where('id', '!=', $request->id)->get();
			if(count($empresaExiste)==0){
				$empresa = Empresa::find($request->id);
				$empresa->ruc = $request->ruc;
				$empresa->nombre = $request->nombre;
				$empresa->direccion = $request->direccion;
				$empresa->email = $request->email;
				$empresa->telefono = $request->telefono;
				$empresa->save();
			}else{
				$sw = false;
				$msg = "El Ruc ingresado ya existe !!!";
			}
			
		}
		
		$array["sw"] = $sw;
        $array["msg"] = $msg;
        echo json_encode($array);
		
		
    }
	
	public function eliminar_empresa($id,$estado)
    {
		$empresa = Empresa::find($id);
		$empresa->estado = $estado;
		$empresa->save();

		echo $empresa->id;

    }
	
	
		
}
