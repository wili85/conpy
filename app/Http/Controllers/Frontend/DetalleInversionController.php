<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetalleInversione;

class DetalleInversionController extends Controller
{
    
	public function send_detalle_inversiones(Request $request){
		
		if($request->id == 0){	
			$detalleInversion = new DetalleInversione;
			$detalleInversion->id_inversionista = $request->id_inversionista;
			$detalleInversion->id_tipo_moneda = $request->id_tipo_moneda;
			$detalleInversion->monto = $request->monto;
			$detalleInversion->id_tipo_sustento = $request->id_tipo_sustento;
			$detalleInversion->fecha_sustento = $request->fecha_sustento;
			$detalleInversion->descripcion = $request->descripcion;
			$detalleInversion->estado = "1";
			$detalleInversion->save();
		}else{
			$detalleInversion = DetalleInversione::find($request->id);
			$detalleInversion->id_inversionista = $request->id_inversionista;
			$detalleInversion->id_tipo_moneda = $request->id_tipo_moneda;
			$detalleInversion->monto = $request->monto;
			$detalleInversion->id_tipo_sustento = $request->id_tipo_sustento;
			$detalleInversion->fecha_sustento = $request->fecha_sustento;
			$detalleInversion->descripcion = $request->descripcion;
			$detalleInversion->estado = "1";
			$detalleInversion->save();
		}
    }
}
