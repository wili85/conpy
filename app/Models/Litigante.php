<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Litigante extends Model
{
    use HasFactory;
	
	function getLitiganteById($id){

        $cad = "select i.id,id_tipo_litigante,id_persona,id_empresa,i.estado,id_expediente,estado_lit,
case 
	when i.id_persona>0 then p.documento 
	else e.ruc 
end numero_documento,
case 
	when i.id_persona>0 then p.a_paterno||' '||p.a_materno||' '||p.nombres
	else e.nombre
end litigante
from litigantes i
left join personas p on i.id_persona=p.id  
left join empresas e on i.id_empresa=e.id ";

		if($id > 0)$cad .= " Where i.id=".$id;
		
		$data = DB::select($cad);
        return $data[0];
    }
	
}
