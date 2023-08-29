<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Empresa extends Model
{
    use HasFactory;
	
	function getEmpresaBuscar($term){

        $cad = "select t1.id,ruc||' - '||nombre as razon_social,t1.ruc,t1.direccion 
		from empresas t1
		where t1.estado='1'  
		and nombre ilike '%".$term."%' ";
    
		$data = DB::select($cad);
        return $data;
    }
	
	public function listar_empresa_ajax($p){
		return $this->readFunctionPostgres('sp_listar_empresa_paginado',$p);
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
