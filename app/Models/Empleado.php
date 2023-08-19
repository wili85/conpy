<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Empleado extends Model
{
    use HasFactory;
	
	function getEmpleado(){

        $cad = "select e.id,p.a_paterno||' '||p.a_materno||' '||p.nombres empleado 
from empleados e
inner join personas p on e.id_persona=p.id 
where e.estado='1' ";

		$data = DB::select($cad);
        return $data;
    }
	
}
