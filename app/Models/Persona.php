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
	
}
