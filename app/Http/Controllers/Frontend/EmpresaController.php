<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    
	public function list_empresa($term)
    {
		$empresa_model = new Empresa;
		$empresa = $empresa_model->getEmpresaBuscar($term);
		return response()->json($empresa);
    }
	
}
