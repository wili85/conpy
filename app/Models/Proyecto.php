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
	
}
