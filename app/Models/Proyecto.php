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
	
	function getProyectoById($id){

        $cad = "select p.id,p.nombre_py,p.detalle_py,p.cod_ubigeo,u.departamento,u.provincia,u.distrito,p.estado,p.estado_py 
from proyectos p
inner join ubigeos u on p.cod_ubigeo=u.id_reniec
where p.id=".$id;
    
		$data = DB::select($cad);
        return $data[0];
    }
	
	function getProyecto(){

        $cad = "select p.id,p.nombre_py,
(select count(*) from inversionistas i where i.id_proyecto=p.id and i.estado='1')existe 
from proyectos p where estado='1'";
    
		$data = DB::select($cad);
        return $data;
    }
	
	function getProyectoImagenById($id){

        $cad = "select id,id_proyecto,ruta  
from proyecto_imagenes pi2 
where estado='1'
and id_proyecto=".$id;

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
