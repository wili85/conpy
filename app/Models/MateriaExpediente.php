<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class MateriaExpediente extends Model
{
    use HasFactory;
	
	function getMateria(){

        $cad = "select id,nombre_materia
from materia_expedientes where estado='A'";
    
		$data = DB::select($cad);
        return $data;
    }
	
}
