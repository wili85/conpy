<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class DistritoJudiciale extends Model
{
    use HasFactory;
	
	function getDistritoJudicial(){

        $cad = "select id,nombre
from distrito_judiciales where estado='1'";
    
		$data = DB::select($cad);
        return $data;
    }
	
}
