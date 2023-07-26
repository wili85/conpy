<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class OrganoJurisdiccionale extends Model
{
    use HasFactory;
	
	function getOrgano(){

        $cad = "select id,nombre
from organo_jurisdiccionales where estado='1'";
    
		$data = DB::select($cad);
        return $data;
    }
	
}
