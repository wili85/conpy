<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    
	public function index(){
	
		return view('frontend.proyecto.all');
	
	}
	
	
	public function modal($id){
		
		//$id_user = Auth::user()->id;
		/*
		$persona = new Persona;
		$negativo = "";
		if($id>0){
			$persona = Persona::find($id);
			$negativo = Negativo::where('persona_id',$id)->orderBy('id', 'desc')->first();
		} else {
			$persona = new Persona;
		}
        */
		
		return view('frontend.proyecto.modal',compact('id'/*,'persona','negativo'*/));

	}
	
}
