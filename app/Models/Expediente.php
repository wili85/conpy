<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Expediente extends Model
{
    use HasFactory;
	
	function getExpedienteById($id){

        $cad = "select numero,anio,glosa,descripcion,cod_ubigeo,id_dist_judicial,id_org_juris,id_materia,estado_exp,id_proyecto 
from expedientes e
where e.id=".$id; 
    
		$data = DB::select($cad);
        return $data[0];
    }
	
	public function listar_expediente_ajax($p){
		return $this->readFunctionPostgres('sp_listar_expediente_paginado',$p);
    }
	
	public function listar_expediente_movimiento_ajax($p){
		return $this->readFunctionPostgres('sp_listar_expediente_movimiento_paginado',$p);
    }
	
	public function listar_expediente_movimiento_seguimiento_ajax($p){
		return $this->readFunctionPostgres('sp_listar_expediente_movimiento_seguimiento_paginado',$p);
    }
	
	public function listar_expediente_litigante_ajax($p){
		return $this->readFunctionPostgres('sp_listar_expediente_litigante_paginado',$p);
    }
	
	public function readFunctionPostgres($function, $parameters = null){

      $_parameters = '';
      if (count($parameters) > 0) {
          $_parameters = implode("','", $parameters);
          $_parameters = "'" . $_parameters . "',";
      }
	  $data = DB::select("BEGIN;");
	  $cad = "select " . $function . "(" . $_parameters . "'ref_cursor');";
	  //echo $cad;
	  $data = DB::select($cad);
	  $cad = "FETCH ALL IN ref_cursor;";
	  $data = DB::select($cad);
      return $data;
   }
   
   public function readFunctionPostgresTransaction($function, $parameters = null){
	
      $_parameters = '';
      if (count($parameters) > 0) {
	  		
			foreach($parameters as $par){
				if(is_string($par))$_parameters .= "'" . $par . "',";
				else $_parameters .= "" . $par . ",";
		  	}
			if(strlen($_parameters)>1)$_parameters= substr($_parameters,0,-1);
			
      }

	  $cad = "select " . $function . "(" . $_parameters . ");";
	  $data = DB::select($cad);
	  return $data[0]->$function;
   }
   
}
