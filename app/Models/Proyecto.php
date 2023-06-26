<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Proyecto extends Model
{
    use HasFactory;
	
	public function getDepartamento(){
		
		$cad = "select distinct substring(id_reniec,1,2) as id, departamento as nombre from ubigeos where cast(substring(id_reniec,1,2) as int)<90 order by 2";
		$data = DB::select($cad);
        return $data;
	}
	
	public function getProvincia($par){
	
		$cad = "select distinct substring(id_reniec,1,4) as id, provincia as nombre from ubigeos where substring(id_reniec,1,2)='" . $par . "' order by 2";
		$data = DB::select($cad);
        return $data;
	}
	
	public function getDistrito($par){
		
		$cad = "select id_reniec as id, distrito as nombre from ubigeos where substring(id_reniec,1,4)='" . $par . "' order by 2";
		$data = DB::select($cad);
        return $data;
	}
	
	public function listar_proyecto_ajax($p){
		return $this->readFunctionPostgres('sp_listar_proyecto_paginado',$p);
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
