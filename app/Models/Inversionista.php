<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Inversionista extends Model
{
    use HasFactory;
	
	function getInversionistaByProyecto($id=0){

        $cad = "select i.id,p2.nombre_py,
case 
	when i.id_persona>0 then p.documento 
	else e.ruc 
end numero_documento,
case 
	when i.id_persona>0 then p.a_paterno||' '||p.a_materno||' '||p.nombres
	else e.nombre
end inversionista,
i.porcentaje  
from inversionistas i
inner join proyectos p2 on i.id_proyecto=p2.id  
left join personas p on i.id_persona=p.id  
left join empresas e on i.id_empresa=e.id 
where i.estado='1'";

		if($id > 0)$cad .= " And i.id_proyecto=".$id;
		//$cad .= " Order by p.plan_denominacion asc";
		$data = DB::select($cad);
        return $data;
    }
	
	function getDetalleInversionistaByInversionista($id=0){

        $cad = "select p2.nombre_py,
case 
	when i.id_persona>0 then p.documento 
	else e.ruc 
end numero_documento,
case 
	when i.id_persona>0 then p.a_paterno||' '||p.a_materno||' '||p.nombres
	else e.nombre
end inversionista,i.porcentaje,
di.fecha_sustento,ts.denominacion tipo_sustento,tm.denominacion tipo_moneda,di.monto  
from detalle_inversiones di 
inner join inversionistas i on di.id_inversionista=i.id 
inner join tabla_maestras tm on di.id_tipo_moneda=tm.codigo::int and tm.tipo='MONEDA'
inner join tabla_maestras ts on di.id_tipo_sustento=ts.codigo::int and ts.tipo='SUSTENTO'
inner join proyectos p2 on i.id_proyecto=p2.id  
left join personas p on i.id_persona=p.id  
left join empresas e on i.id_empresa=e.id 
where di.estado='1'";

		//if($id > 0)$cad .= " And di.id_inversionista=".$id;
		if($id > 0)$cad .= " And di.id_inversionista in(".$id.")";
		
		//$cad .= " Order by p.plan_denominacion asc";
		$data = DB::select($cad);
        return $data;
    }
	
	
}
