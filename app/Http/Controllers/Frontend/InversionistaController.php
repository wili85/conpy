<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inversionista;
use App\Models\Proyecto;
use App\Models\TablaMaestra;
use App\Models\Persona;

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
	
	public function modal_inversionista($id){
		
		$proyecto_model = new Proyecto;
		$proyecto = $proyecto_model->getProyecto();
		/*
		$proveedor_model = new Proveedore;
		if($id>0)$proveedor = $proveedor_model->getProveedorById($id);
		else $proveedor = new Proveedore;
		*/
		return view('frontend.inversiones.modal_inversionista',compact('id','proyecto'));
	
	}
	
	public function send_inversionista(Request $request){
		
		$id_persona = 0;
		$id_empresa = 0;
		
		if($request->id_persona!="")$id_persona=$request->id_persona;
		if($request->id_empresa!="")$id_empresa=$request->id_empresa;
		
		if($request->id == 0){	
			$inversionista = new Inversionista;
			$inversionista->id_proyecto = $request->id_proyecto;
			$inversionista->id_persona = $id_persona;
			$inversionista->id_empresa = $id_empresa;
			$inversionista->estado = "1";
			$inversionista->save();
		}else{
			$inversionista = Inversionista::find($request->id);
			$inversionista->id_proyecto = $request->id_proyecto;
			$inversionista->id_persona = $id_persona;
			$inversionista->id_empresa = $id_empresa;
			$inversionista->estado = "1";
			$inversionista->save();
		}
    }
	
	public function modal_inversion($id){
		
		$proyecto_model = new Proyecto;
		$proyecto = $proyecto_model->getProyecto();
		
		$tablaMaestra_model = new TablaMaestra;
		$tipo_moneda = $tablaMaestra_model->getMaestroByTipo("MONEDA");
		$tipo_sustento = $tablaMaestra_model->getMaestroByTipo("SUSTENTO");
		/*
		$proveedor_model = new Proveedore;
		if($id>0)$proveedor = $proveedor_model->getProveedorById($id);
		else $proveedor = new Proveedore;
		*/
		return view('frontend.inversiones.modal_inversion',compact('id','proyecto','tipo_moneda','tipo_sustento'));
	
	}
	
	
	public function obtener_inversionista_all($id){
		
		$inversionista_model = new Inversionista;
		$inversionista = $inversionista_model->getInversionistaByProyecto($id);
		echo json_encode($inversionista);
	}
		
		
	
	
		
}
