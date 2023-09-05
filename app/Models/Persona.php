<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Persona extends Model
{
    use HasFactory;
	
	function getPersonaBuscar($term){

        $cad = "select id,documento||' - '||nombres||' '||a_paterno||' '||a_materno persona
		from personas
		where estado='1'
		and nombres||' '||a_paterno||' '||a_materno ilike '%".$term."%' ";

		$data = DB::select($cad);
        return $data;
    }
	
			
	function getPersonaEmpresa($id_proyecto){

        $cad = "select t1.id,t1.nombres,t1.apellido_paterno,t1.apellido_materno,t1.titular_id,t2.tipo_documento tipo_documento_titular,t2.numero_documento numero_documento_titular,t1.flag_negativo, t1.nro_brevete
		from personas t1
		left join personas t2 on t1.titular_id=t2.id
		Where t1.tipo_documento='".$tipo_documento."' And t1.numero_documento='".$numero_documento."'";
		//echo $cad;
		$data = DB::select($cad);
        if(isset($data[0]))return $data[0];

    }
	
	public function listar_persona_ajax($p){
		return $this->readFunctionPostgres('sp_listar_persona_paginado',$p);
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
