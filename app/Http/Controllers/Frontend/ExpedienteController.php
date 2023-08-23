<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Expediente;
use App\Models\TablaMaestra;
use App\Models\MateriaExpediente;
use App\Models\OrganoJurisdiccionale;
use App\Models\DistritoJudiciale;
use App\Models\Litigante;
use App\Models\Empleado;
use App\Models\MovExpediente;
use App\Models\Seguimiento;
use Auth;

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
	
	public function listar_expediente_ajax(Request $request){

		$expediente_model = new Expediente;
		$p[]=$request->nombre_py_bus;
		$p[]=$request->detalle_py_bus;
		$p[]=$request->estado;
		$p[]=$request->estado_py;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $expediente_model->listar_expediente_ajax($p);
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
	
	public function send(Request $request){

        $sw = true;
		$msg = "";
		$id_user = Auth::user()->id;
		
		$id_expediente = $request->id_expediente;
		
		if($id_expediente > 0){
			$expediente = Expediente::find($id_expediente);
			$expediente->estado_exp = $request->estado_exp;
		}else{
			$expediente = new Expediente;
			$expediente->estado_exp = 1;	
		}
		
		$expediente->numero = $request->numero;
		$expediente->anio = $request->anio;
		$expediente->glosa = $request->glosa;
		$expediente->descripcion = $request->descripcion;
		$expediente->cod_ubigeo = $request->ubigeodireccionprincipal;
		$expediente->id_dist_judicial = $request->id_dist_judicial;
		$expediente->id_org_juris = $request->id_org_juris;
		$expediente->id_materia = $request->id_materia;
		$expediente->id_proyecto = $request->id_proyecto;
		$expediente->estado = 1;
		$expediente->id_litigante=0;
		$expediente->id_exp_digital=0;
		$expediente->save();
		
	}
	
	public function obtener_expediente($id){
		
		$expediente_model = new Expediente;
		$proyecto_model = new Proyecto;
		$expediente = $expediente_model->getExpedienteById($id);
		$proyecto = NULL;
		if(isset($expediente->id_proyecto) && $expediente->id_proyecto>0){
			$proyecto = $proyecto_model->getProyectoById($expediente->id_proyecto);
		}
		$array["expediente"] = $expediente;
		$array["proyecto"] = $proyecto;
		echo json_encode($array);
	}
	
	public function listar_expediente_movimiento_ajax(Request $request){

		$expediente_model = new Expediente;
		$p[]=4;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $expediente_model->listar_expediente_movimiento_ajax($p);
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
	
	public function listar_expediente_movimiento_seguimiento_ajax(Request $request){

		$expediente_model = new Expediente;
		$p[]=1;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $expediente_model->listar_expediente_movimiento_seguimiento_ajax($p);
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
	
	public function listar_expediente_litigante_ajax(Request $request){

		$expediente_model = new Expediente;
		$p[]=4;
		$p[]=$request->NumeroPagina;
		$p[]=$request->NumeroRegistros;
		$data = $expediente_model->listar_expediente_litigante_ajax($p);
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
	
	public function modal_expediente_litigante($id){
		
		if($id>0){
			$litigante_model = new Litigante;
			$litigante = $litigante_model->getLitiganteById($id);
		}else{
			$litigante = new Litigante;
		}
		
		$tablaMaestra_model = new TablaMaestra;
		$tipo_litigante = $tablaMaestra_model->getMaestroByTipo("TIPO_LIT");
		$estado_litigante = $tablaMaestra_model->getMaestroByTipo("EST_LIT");
		
		return view('frontend.expediente.modal_litigante',compact('id','litigante','tipo_litigante','estado_litigante'));
	
	}
	
	public function modal_expediente_movimiento($id){
		
		$organoJurisdiccionale_model = new OrganoJurisdiccionale;
		$distritoJudiciale_model = new DistritoJudiciale;
		$empleado_model = new Empleado;
		$tablaMaestra_model = new TablaMaestra;
		
		if($id>0){
			$movExpediente = MovExpediente::find($id);
		}else{
			$movExpediente = new MovExpediente;
		}
		
		$organo = $organoJurisdiccionale_model->getOrgano();
		$distrito_judicial = $distritoJudiciale_model->getDistritoJudicial();
		$empleado = $empleado_model->getEmpleado();
		$estado_movimiento = $tablaMaestra_model->getMaestroByTipo("EST_MOV");
		
		return view('frontend.expediente.modal_movimiento',compact('id','movExpediente','organo','distrito_judicial','empleado','estado_movimiento'));
	
	}
	
	public function modal_expediente_seguimiento($id){
		
		$tablaMaestra_model = new TablaMaestra;
		if($id>0){
			$seguimiento = Seguimiento::find($id);
		}else{
			$seguimiento = new Seguimiento;
		}
		
		$estado_seguimiento = $tablaMaestra_model->getMaestroByTipo("EST_SEG");
		
		return view('frontend.expediente.modal_seguimiento',compact('id','seguimiento','estado_seguimiento'));
	
	}
	
	public function send_litigante(Request $request){
		
		$id_persona = 0;
		$id_empresa = 0;
		
		if($request->id_persona!=""){
			$id_persona=$request->id_persona;
			$cantidad = Litigante::where("id_persona",$id_persona)->where("estado",1)->count();
		}
		if($request->id_empresa!=""){
			$id_empresa=$request->id_empresa;
			$cantidad = Litigante::where("id_empresa",$id_empresa)->where("estado",1)->count();
		}
		
		if($request->id == 0){
			if($cantidad == 0){	
				$litigante = new Litigante;
				$litigante->id_expediente = 4;
				$litigante->id_tipo_litigante = $request->id_tipo_litigante;
				$litigante->estado_lit = $request->estado_lit;
				$litigante->id_persona = $id_persona;
				$litigante->id_empresa = $id_empresa;
				$litigante->estado = "1";
				$litigante->save();
			}
			echo $cantidad;
			
		}else{
			$litigante = Litigante::find($request->id);
			$litigante->id_expediente = 4;
			$litigante->id_tipo_litigante = $request->id_tipo_litigante;
			$litigante->estado_lit = $request->estado_lit;
			$litigante->id_persona = $id_persona;
			$litigante->id_empresa = $id_empresa;
			$litigante->estado = "1";
			$litigante->save();
		}
		
		
    }
	
	public function send_movimiento(Request $request){
		
		if($request->id == 0){
			$movExpediente = new MovExpediente;
			$movExpediente->id_expediente = 4;
			$movExpediente->id_dist_judicial = $request->id_dist_judicial;
			$movExpediente->id_org_juris = $request->id_org_juris;
			$movExpediente->id_empleado = $request->id_empleado;
			$movExpediente->estado_mov = $request->estado_mov;
			$movExpediente->estado = "1";
			$movExpediente->id_exp_digital=0;
			$movExpediente->detalle = $request->detalle;
			$movExpediente->save();		
		}else{
			$movExpediente = MovExpediente::find($request->id);
			$movExpediente->id_expediente = 4;
			$movExpediente->id_dist_judicial = $request->id_dist_judicial;
			$movExpediente->id_org_juris = $request->id_org_juris;
			$movExpediente->id_empleado = $request->id_empleado;
			$movExpediente->estado_mov = $request->estado_mov;
			$movExpediente->estado = "1";
			$movExpediente->id_exp_digital=0;
			$movExpediente->detalle = $request->detalle;
			$movExpediente->save();
		}
			
    }
	
	public function send_seguimiento(Request $request){
		
		if($request->id == 0){
			$seguimiento = new Seguimiento;
			$seguimiento->id_mov_expediente = 1;
			$seguimiento->fecha_seguimiento = $request->fecha_seguimiento;
			$seguimiento->estado_proceso = $request->estado_proceso;
			$seguimiento->Observacion = $request->Observacion;
			$seguimiento->fecha_proximo_seguimiento = $request->fecha_proximo_seguimiento;
			$seguimiento->estado = "1";
			$seguimiento->save();		
		}else{
			$seguimiento = Seguimiento::find($request->id);
			$seguimiento->id_mov_expediente = 1;
			$seguimiento->fecha_seguimiento = $request->fecha_seguimiento;
			$seguimiento->estado_proceso = $request->estado_proceso;
			$seguimiento->Observacion = $request->Observacion;
			$seguimiento->fecha_proximo_seguimiento = $request->fecha_proximo_seguimiento;
			$seguimiento->estado = "1";
			$seguimiento->save();
		}
			
    }
	
	public function eliminar_litigante($id){

		$litigante = Litigante::find($id);
		$litigante->estado= "0";
		$litigante->save();
		
		echo "success";

    }
	
	public function eliminar_movimiento($id){

		$movExpediente = MovExpediente::find($id);
		$movExpediente->estado= "0";
		$movExpediente->save();
		
		echo "success";

    }
	
	public function eliminar_seguimiento($id){

		$seguimiento = Seguimiento::find($id);
		$seguimiento->estado= "0";
		$seguimiento->save();
		
		echo "success";

    }
		
}
