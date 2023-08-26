<!--<link rel="stylesheet" href="<?php //echo URL::to('/') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<style type="text/css">

.row_selected{
	background:#CAE983 !important
}

.table td.verde{
	background:#CAE983 !important
}

body {
    background-color: #bdc3c7;
}

.table-fixed {
    width: 100%;
    background-color: #f3f3f3;
}

.table-fixed tbody {
    height: 200px;
    overflow-y: auto;
    width: 100%;
}

.table-fixed thead,
.table-fixed tbody,
.table-fixed tr,
.table-fixed td,
.table-fixed th {
    display: block;
}

.table-fixed tbody td {
    float: left;
}

.table-fixed thead tr th {
    float: left;
    background-color: #f39c12;
    border-color: #e67e22;
}

/* Begin - Overriding styles for this page */
.card-body {
    padding: 0 1.25rem !important;
}

.form-control-sm {
    line-height: 1.1 !important;
    margin: 0 !important;
}

.form-group {
    margin-bottom: 0.5rem !important;
}

.breadcrumb {
    padding: 0.2rem 2rem !important;
    margin-bottom: 0 !important;
}

.card-header {
    padding: 0.2rem 1.25rem !important;
}

.pesajeIngreso {
    line-height: 2.8;
}

.fecha_ingreso_salida {
    color: blue;
    font-size: 14px;
    font-style: italic;
	float:left
}

br {
    line-height: 30px;
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}

ul.ui-autocomplete {
    z-index: 1100;
}

.btn-xsm {
    font-size: 11px !important;
}

/* End - Overriding styles for this page */
/*********************************************************/
.switch {
  position: relative;
  display: inline-block;
  width: 42px;
  height: 24px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 18px;
  width: 18px;
  left: 0px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.no {padding-right:3px;padding-left:0px;display:block;width:20px;float:left;font-size:11px;text-align:right;padding-top:5px}
.si {padding-right:0px;padding-left:3px;display:block;width:20px;float:left;font-size:11px;text-align:left;padding-top:5px}

.flotante {
    display:inline;
        position:fixed;
        bottom:0px;
        right:0px;
		z-index:1000
}
.flotanteC {
    display:inline;
        position:fixed;
        bottom:65px;
        right:0px;
}

label.form-control-sm{
	padding-left:0px!important;
	padding-right:0px;
	padding-top:5px!important;
	height:25px!important;
	/*line-height:10px!important*/
}

.loader {
	width: 100%;
	height: 100%;
	/*height: 1500px;*/
	overflow: hidden; 
	top: 0px;
	left: 0px;
	z-index: 10000;
	text-align: center;
	position:absolute; 
	background-color: #000;
	opacity:0.6;
	filter:alpha(opacity=40);
	display:none;
}

.dataTables_processing {
	position: absolute;
	top: 50%;
	left: 50%;
	width: 500px!important;
	font-size: 1.7em;
	border: 0px;
	margin-left: -17%!important;
	text-align: center;
	background: #3c8dbc;
	color: #FFFFFF;
}

.btn-file {
  position: relative;
  overflow: hidden;
}
.btn-file input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  min-width: 100%;
  min-height: 100%;
  font-size: 100px;
  text-align: right;
  filter: alpha(opacity=0);
  opacity: 0;
  outline: none;
  background: white;
  cursor: inherit;
  display: block;
}

.wrapper { 
	/*background:#EFEFEF; */
	/*box-shadow: 1px 1px 10px #999; */
	margin: auto; 
	text-align: center; 
	position: relative;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	margin-bottom: 20px !important;
	width: 800px;
	padding-top: 5px;
}
.scrolls { 
	overflow-x: scroll;
	overflow-y: hidden;
	height: 200px;
	white-space:nowrap
} 
.imageDiv img { 
	box-shadow: 1px 1px 10px #999; 
	margin: 2px;
	max-height: 50px;
	cursor: pointer;
	display:inline-block;
	*display:inline;
	*zoom:1;
	vertical-align:top;
}


.img_ruta{
	position:relative;
	float:left
}

.delete_ruta{
	background-image:url(img/delete.png);
	top:0px;
	left:110px;
	background-size: 100%;
	position:absolute;
	display:block;
	width:30px;
	height:30px;
	cursor:pointer
}

</style>



@stack('before-scripts')
@stack('after-scripts')

@extends('frontend.layouts.app')

@section('title', ' | ' . __('labels.frontend.afiliacion.box_title'))

@section('breadcrumb')
<ol class="breadcrumb" style="padding-left:130px;margin-top:0px;background-color:#283659">
    <li class="breadcrumb-item text-primary">Inicio</li>
    <li class="breadcrumb-item active">Registro de Solicitud</li>
    </li>
</ol>

@endsection

<div class="loader"></div>

@section('content')
<!--
    <ol class="breadcrumb" style="padding-left:120px;margin-top:0px;background-color:#355C9D">
        <li class="breadcrumb-item text-primary">Inicio</li>
            <li class="breadcrumb-item active">Nueva Asistencia</li>
        </li>
    </ol>
    -->

<div class="justify-content-center">
    <!--<div class="container-fluid">-->
	
	<a href="javascript:void(0)" onclick="ocultar_solicitud()"><i class="fa fa-bars fa-lg" style="position:absolute;right:50%;top:-24px;color:#FFFFFF"></i></a>
	
    <div class="card">

        <div class="card-body">

            <form class="form-horizontal" method="post" action="" id="frmExpediente" autocomplete="off">
				<!--
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12" style="margin-top:15px">
                        <h4 class="card-title mb-0 text-primary" style="font-size:22px">
                            Registro Solicitudes
                        </h4>
                    </div>
                </div>
				-->
                <div class="row justify-content-center" style="margin-top:15px">
					
                    <input type="hidden" name="flag_ocultar" id="flag_ocultar" value="0">
					
					<div class="col col-sm-12 align-self-center">


                        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="id_expediente" id="id_expediente" value="">
						
                        <div class="row" id="divSolicitud">
							
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div id="" class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <div id="" class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <strong>
                                                            Registro de Ingresos Y Gastos
                                                        </strong>
														
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="margin-top:15px;margin-bottom:15px">
											
												<div style="clear:both"></div>
                                                

                                            

					
					<div style="clear:both;padding-top:15px"></div>
					
					<div class="card">
					
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							
							<a
								class="nav-link active"
								id="two-factor-authentication-tab_"
								data-toggle="pill"
								href="#two-factor-authentication_"
								role="tab"
								aria-controls="two-factor-authentication_"
								aria-selected="true"
								onclick="datatable_proy()"
								>Proyectos</a>
							
							<a
								class="nav-link"
								id="my-profile-tab"
								data-toggle="pill"
								href="#my-profile"
								role="tab"
								aria-controls="my-profile"
								aria-selected="false"
								onclick="datatable_exp()"
								>Expedientes</a>

							<a
								class="nav-link"
								id="information-tab"
								data-toggle="pill"
								href="#information"
								role="tab"
								aria-controls="information"
								aria-selected="false"
								onclick="datatable_ingreso_gastos()"
								>Ingresos</a>
							
							<a
								class="nav-link"
								id="seguimiento-tab"
								data-toggle="pill"
								href="#seguimiento"
								role="tab"
								aria-controls="seguimiento"
								aria-selected="false"
								onclick="datatable_seg()"
								>Gastos</a>

						</div>
					</nav>
									
					<div class="tab-content" id="my-profile-tabsContent">
						<div class="tab-pane fade pt-3" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab" style="padding-top:0px!important">
							
							<div class="row" style="padding-top:0px">

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
								<div class="row col align-self-center" style="padding:10px 20px 10px 20px;">
							
									<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="nombre_py_bus" name="nombre_py_bus" placeholder="Nombre del Proyecto">
									</div>
									
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
										<input class="form-control form-control-sm" id="detalle_py_bus" name="detalle_py_bus" placeholder="Detalle del Proyecto">
									</div>
									
									<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
										<select name="estado_py_bus" id="estado_py_bus" class="form-control form-control-sm" onchange="">
											<option value="">ESTADO EXPEDIENTE</option>
											<?php
											//foreach ($estado_expediente as $row) {?>
											<option value="<?php //echo $row->codigo?>"><?php //echo $row->denominacion?></option>
											<?php 
											//}
											?>
										</select>
									</div>
									
									<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
										<select name="estado" id="estado" class="form-control form-control-sm" onchange="">
											<option value="">ESTADO</option>
											<option value="1">ACTIVO</option>
											<option value="0">INACTIVO</option>
										</select>
									</div>
									
									<div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
										<input class="btn btn-warning btn-sm pull-rigth" value="Buscar" type="button" id="btnBuscar" />
									</div>
									
								</div>
								
								<div class="card-body">
									
									<div class="table-responsive">
									<!--table-hover-grid-->
									<table id="tblSolicitud" class="table table-hover table-sm">
									<thead>
									<tr style="font-size:13px">
										<th>Numero</th>
										<th>A&ntilde;o</th>
										<th>Glosa</th>
										<th>Descripci&oacute;n</th>
										<th>Departamento</th>
										<th>Provincia</th>
										<th>Distrito</th>
										<th>Distrito Judicial</th>
										<th>Organo Jurisdiccional</th>
										<th>Materia</th>
										<th>Estado</th>
										<th>Proyecto</th>
									</tr>
									</thead>
									<tbody style="font-size:13px">
									</tbody>
									</table>
									
									</div>
								
							</div>
		
						</div>
						
						</div>
							
						</div>

						<div class="tab-pane fade pt-3" id="information" role="tabpanel" aria-labelledby="information-tab">
							
							<div class="row" style="padding-top:0px">

								<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
		
									<div class="card-body">
									
										<div class="table-responsive">
											<input type="hidden" name="idIngreso" id="idIngreso" value="0">
											<table id="tblIngreso" class="table table-hover table-sm">
											<thead>
											<tr style="font-size:13px">
												<th>Tipo Gasto</th>
												<th>Moneda</th>
												<th>Monto</th>
												<th>Fecha Vencimiento</th>
												<th>Fecha Pago</th>
												<th>Tipo Sustento</th>
												<th>Distrito Judicial</th>
												<th>Organo Jurisdiccional</th>
												<th>Estado</th>
											</tr>
											</thead>
											<tbody style="font-size:13px">
											</tbody>
											</table>
											
										</div>
								
									</div>
								</div>
								
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									
									<input class="btn btn-success btn-sm float-right" value="NUEVO" type="button" id="btnNuevoIngreso" style="width:120px;margin-right:15px"/>
									
									<br />
												
									<input class="btn btn-sm btn-danger float-right" value="ELIMINAR" name="guardar" type="button" id="btnEliminarIng" style="width:120px;margin-top:20px;margin-right:15px" />
												
								</div>
								
							
							</div>
							
						</div>
						
						<div class="tab-pane fade pt-3" id="seguimiento" role="tabpanel" aria-labelledby="information-tab">
						 
						 	<div class="row" style="padding-top:0px">

								<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
		
									<div class="card-body">
									
										<div class="table-responsive">
											<input type="hidden" name="idSeguimiento" id="idSeguimiento" value="0">
											<table id="tblSeguimiento" class="table table-hover table-sm">
											<thead>
											<tr style="font-size:13px">
												<th>Fecha seguimiento</th>
												<th>Observaci&oacute;n</th>
												<th>Fecha proximo seguimiento</th>
												<th>Estado</th>
											</tr>
											</thead>
											<tbody style="font-size:13px">
											</tbody>
											</table>
											
										</div>
								
									</div>
								</div>
								
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									
									<input class="btn btn-success btn-sm float-right" value="NUEVO" type="button" id="btnNuevoSeg" style="width:120px;margin-right:15px"/>
									
									<br />
												
									<input class="btn btn-sm btn-danger float-right" value="ELIMINAR" name="guardar" type="button" id="btnEliminarSeg" style="width:120px;margin-top:20px;margin-right:15px" />
												
								</div>
								
							
							</div>
							
						 
						</div>

						<div class="tab-pane fade pt-3 show active" id="two-factor-authentication_" role="tabpanel" aria-labelledby="two-factor-authentication-tab_">
							
							<div class="row" style="padding-top:0px">

								<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
		
									<div class="card-body">
									
										<div class="table-responsive">
											<input type="hidden" name="idLitigante" id="idLitigante" value="0">
											<table id="tblProyecto" class="table table-hover table-sm">
											<thead>
											<tr style="font-size:13px">
												<th>Id</th>
												<th>Nombre Proyecto</th>
												<th>Detalle Proyecto</th>
												<th>Departamento</th>
												<th>Provincia</th>
												<th>Distrito</th>
												<th>Estado Proyecto</th>
												<th>Estado</th>
											</tr>
											</thead>
											<tbody style="font-size:13px">
											</tbody>
											</table>
											
										</div>
								
									</div>
								</div>
								
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									
									<input class="btn btn-success btn-sm float-right" value="NUEVO" type="button" id="btnNuevoLit" style="width:120px;margin-right:15px"/>
									
									<br />
												
									<input class="btn btn-sm btn-danger float-right" value="ELIMINAR" name="guardar" type="button" id="btnEliminarLit" style="width:120px;margin-top:20px;margin-right:15px" />
												
								</div>
							
							</div>
							
						</div>
						
					</div>
				
					
						
					
					
					</div>
                                            <!--card-body-->
                                        </div>
                                        <!--card-->
																				
                                    </div>
									
                                </div>

                            </div>
                        </div>
					
					



        </div>
        <!--col-->

        </form>

        

    </div>
    <!--row-->
    @endsection

	<div id="openOverlayOpc" class="modal fade" role="dialog">
	  <div class="modal-dialog" >
	
		<div id="id_content_OverlayoneOpc" class="modal-content" style="padding: 0px;margin: 0px">
		
		  <div class="modal-body" style="padding: 0px;margin: 0px">
	
				<div id="diveditpregOpc"></div>
	
		  </div>
		
		</div>
	
	  </div>
		
	</div>

    @push('after-scripts')
    
	
	<script src="{{ asset('js/gastos/create.js') }}"></script>
	
	@endpush