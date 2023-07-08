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
		
}
