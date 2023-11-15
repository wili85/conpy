<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inversionista;
use App\Models\Proyecto;
use App\Models\Expediente;
use App\Models\TablaMaestra;
use App\Models\Persona;
use App\Models\IngresosGasto;
use App\Models\OrganoJurisdiccionale;
use App\Models\DistritoJudiciale;

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
	
	public function listar_ingreso_gasto_ajax(Request $request){

		$ingresosGasto_model = new IngresosGasto;
		$p[]=$request->id_proyecto;
		$p[]="";
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $ingresosGasto_model->listar_ingreso_gasto_ajax($p);
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
	
	public function modal_ingreso_gasto($id_proyecto,$id_expediente,$id){
	
		$tablaMaestra_model = new TablaMaestra;
		$organoJurisdiccionale_model = new OrganoJurisdiccionale;
		$distritoJudiciale_model = new DistritoJudiciale;
		
		$proyecto = new Proyecto();
		$expediente = new Expediente();
		if($id_proyecto>0)$proyecto = Proyecto::find($id_proyecto);
		if($id_expediente>0)$expediente = Expediente::find($id_expediente);
		
		if($id>0){
			$ingresosGasto = IngresosGasto::find($id);
		}else{
			$ingresosGasto = new IngresosGasto;
		}
		
		$organo = $organoJurisdiccionale_model->getOrgano();
		$distrito_judicial = $distritoJudiciale_model->getDistritoJudicial();
		$estado_ingreso_gasto = $tablaMaestra_model->getMaestroByTipo("EST_PAG");
		$tipo_gasto = $tablaMaestra_model->getMaestroByTipo("TIP_GAS");
		$moneda = $tablaMaestra_model->getMaestroByTipo("MONEDA");
		$tipo_sustento = $tablaMaestra_model->getMaestroByTipo("SUSTENTO");
		
		return view('frontend.gastos.modal_ingreso_gasto',compact('id','ingresosGasto','tipo_gasto','moneda','organo','distrito_judicial','estado_ingreso_gasto','tipo_sustento','proyecto','expediente'));
	
	}
	
	public function send_ingreso_gasto(Request $request){
		
		if($request->id == 0){
			$ingresosGasto = new IngresosGasto;
			$ingresosGasto->id_tipo = $request->id_tipo;
			$ingresosGasto->id_expediente = $request->id_expediente;
			$ingresosGasto->id_proyecto = $request->id_proyecto;
			$ingresosGasto->id_tipo_gasto = $request->id_tipo_gasto;
			$ingresosGasto->id_tipo_moneda = $request->id_tipo_moneda;
			$ingresosGasto->monto = $request->monto;
			$ingresosGasto->fecha_vencimiento = $request->fecha_vencimiento;
			$ingresosGasto->fecha_pago = $request->fecha_pago;
			$ingresosGasto->id_dist_judicial = $request->id_dist_judicial;
			$ingresosGasto->id_org_juris = $request->id_org_juris;
			$ingresosGasto->estado_pago = $request->estado_pago;
			$ingresosGasto->id_tipo_sustento = $request->id_tipo_sustento;
			$ingresosGasto->estado = "1";
			$ingresosGasto->id_exp_digital = 0;
			$ingresosGasto->save();		
		}else{
			$ingresosGasto = IngresosGasto::find($request->id);
			$ingresosGasto->id_expediente = $request->id_expediente;
			$ingresosGasto->id_proyecto = $request->id_proyecto;
			$ingresosGasto->id_tipo_gasto = $request->id_tipo_gasto;
			$ingresosGasto->id_tipo_moneda = $request->id_tipo_moneda;
			$ingresosGasto->monto = $request->monto;
			$ingresosGasto->fecha_vencimiento = $request->fecha_vencimiento;
			$ingresosGasto->fecha_pago = $request->fecha_pago;
			$ingresosGasto->id_dist_judicial = $request->id_dist_judicial;
			$ingresosGasto->id_org_juris = $request->id_org_juris;
			$ingresosGasto->estado_pago = $request->estado_pago;
			$ingresosGasto->id_tipo_sustento = $request->id_tipo_sustento;
			$ingresosGasto->estado = "1";
			$ingresosGasto->id_exp_digital = 0;
			$ingresosGasto->save();
		}
			
    }
	
	public function eliminar_ingreso_gasto($id){

		$ingresosGasto = IngresosGasto::find($id);
		$ingresosGasto->estado= "0";
		$ingresosGasto->save();
		
		echo "success";

    }
			
	
}
