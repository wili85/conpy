<!--<link rel="stylesheet" href="<?php //echo URL::to('/') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">-->
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<style type="text/css">

.table td.verde{
	background:#CAE983  !important
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
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">

                                        <div class="card">
                                            <div class="card-header">
                                                <div id="" class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <strong>
                                                            <!--@lang('labels.frontend.asistencia.box_asistencia')-->
                                                            Registro de Expediente
                                                        </strong>
														
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body" style="margin-top:15px;margin-bottom:15px">
											
												<div style="clear:both"></div>
                                                <div class="row">
												
													<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">N&uacute;mero Expediente</label>
														<input type="text" name="numero" id="numero"
															value="" placeholder="" class="form-control form-control-sm" >
													</div>
													
													<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">A&ntilde;o</label>
														<input type="text" name="anio" id="anio"
															value="" placeholder="" class="form-control form-control-sm" >
													</div>
													
													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Glosa</label>
														<input type="text" name="glosa" id="glosa"
															value="" placeholder="" class="form-control form-control-sm" >
													</div>
													
													<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
														<label class="form-control-sm">Estado Expediente</label>
														<select name="estado_exp" id="estado_exp" class="form-control form-control-sm" onchange="">
															<option value="">ESTADO EXPEDIENTE</option>
															<?php
															foreach ($estado_expediente as $row) {?>
															<option value="<?php echo $row->codigo?>"><?php echo $row->denominacion?></option>
															<?php 
															}
															?>
														</select>
													</div>
																	
                                                </div>
												
												<div class="row">
												
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label class="form-control-sm">Descripci&oacute;n</label>
															<textarea type="text" name="descripcion" id="descripcion" rows="2"
															placeholder="" class="form-control form-control-sm"></textarea>
														</div>
													</div>
													
												</div>
												
												<div style="clear:both"></div>
												<div class="row">

													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Departamento</label>
														
														<?php 										
														$idDepartamento = 0;
														$idProvincia = 0;
														$idDistrito = 0;
														
													?>
													<select class="form-control form-control-sm" id="txtIdUbiDepar" name="txtIdUbiDepar" onChange="obtenerProvincia();">
														<option value="">- Seleccione -</option>
														<?php 
														if($departamento!=""){
															foreach ($departamento as $row) {?>
																<option value="<?php echo $row->id?>"><?php echo $row->nombre?></option>
														<?php 
															}
														} 
														?>
													</select>
														
													</div>
													
													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Provincia</label>
														<select class="form-control form-control-sm" id="txtIdUbiProv" name="txtIdUbiProv" onChange="obtenerDistrito()">
															<option value="">- Seleccione -</option>
														</select>
													</div>
													
													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Distrito</label>
														<select class="form-control form-control-sm" id="ubigeodireccionprincipal" name="ubigeodireccionprincipal">
															<option value="">- Seleccione -</option>
														</select>
													</div>
													
                                                </div>
												
												<div style="clear:both"></div>
												<div class="row">

													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Dist. Judicial</label>
														
														<select class="form-control form-control-sm" id="id_dist_judicial" name="id_dist_judicial">
															<option value="">- Seleccione -</option>
															<?php foreach ($distrito_judicial as $row) {?>
																<option value="<?php echo $row->id?>"><?php echo $row->nombre?></option>
															<?php } ?>
														</select>
														
													</div>
													
													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Org. Jurisdico</label>
														<select class="form-control form-control-sm" id="id_org_juris" name="id_org_juris">
															<option value="">- Seleccione -</option>
															<?php foreach ($organo as $row) {?>
																<option value="<?php echo $row->id?>"><?php echo $row->nombre?></option>
															<?php } ?>
														</select>
													</div>
													
													<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Materia</label>
														<select class="form-control form-control-sm" id="id_materia" name="id_materia">
															<option value="">- Seleccione -</option>
															<?php foreach ($materia as $row) {?>
																<option value="<?php echo $row->id?>"><?php echo $row->nombre_materia?></option>
															<?php } ?>
														</select>
													</div>
													
                                                </div>
												

                                            </div>
                                            <!--card-body-->
                                        </div>
                                        <!--card-->
										
										
                                    </div>
									
									<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">

                                        
                                        <div class="card" style="min-height:140px;padding-bottom:15px">
                                            <div class="card-header">
                                                <strong>
                                                    Informaci&oacute;n del proyecto
                                                </strong>
                                            </div>

                                            <div class="card-body">

												<div style="clear:both"></div>
                                                <div class="row">
												
													<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Id Proyecto</label>
														<input type="text" name="id_proyecto_info" id="id_proyecto_info"
															value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
													</div>
													
													<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Nombre Proyecto</label>
														<select name="id_proyecto" id="id_proyecto" class="form-control form-control-sm" onchange="obtenerProyecto()">
															<option value="">PROYECTO</option>
															<?php
															foreach ($proyecto as $row) {?>
															<option value="<?php echo $row->id?>"><?php echo $row->nombre_py?></option>
															<?php 
															}
															?>
														</select>
													</div>
																		
                                                </div>
												
												<div style="clear:both"></div>
												<div class="row">
												
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														<div class="form-group">
															<label class="form-control-sm">Descripci&oacute;n</label>
															<textarea type="text" name="detalle_py_info" id="detalle_py_info" rows="2"
															placeholder="" readonly="readonly" class="form-control form-control-sm"></textarea>
														</div>
													</div>
													
												</div>
												
												<div style="clear:both"></div>
                                                <div class="row">
												
													<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
														<label class="form-control-sm">Estado Proyecto</label>
														<input type="text" name="estado_py_info" id="estado_py_info"
															value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
													</div>
																	
                                                </div>
												

                                            </div>
                                            <!--card-body-->
											
											
                                        </div>
                                        <!--card-->
										
										<div style="clear:both"></div>
										<div class="row">
													
											<div class="col-xl-12 text-right" style="padding-top:15px;">
												
												<input class="btn btn-success btn-sm float-rigth" value="NUEVO" type="button" id="btnNuevo" style="padding-left:30px;padding-right:30px"/>
												
												<input class="btn btn-sm btn-warning float-rigth" value="GUARDAR" name="guardar" type="button" id="btnGuardar" style="padding-left:25px;padding-right:25px;margin-left:10px" />
												
												<input class="btn btn-sm btn-danger float-rigth" value="ELIMINAR" name="guardar" type="button" id="btnEliminar" style="padding-left:20px;padding-right:20px;margin-left:10px" />
												
												
												
											</div>
											
										</div>
										
										
                                    </div>
                                    <!--card-->
									
									
                                </div>


                            </div>
                        </div>

					
					<div style="clear:both;padding-top:15px"></div>
					
					<div class="card">
					
					<nav>
						<div class="nav nav-tabs" id="nav-tab" role="tablist">
							<a
								class="nav-link active"
								id="my-profile-tab"
								data-toggle="pill"
								href="#my-profile"
								role="tab"
								aria-controls="my-profile"
								aria-selected="true">Expedientes</a>
								
							<a
								class="nav-link"
								id="two-factor-authentication-tab_"
								data-toggle="pill"
								href="#two-factor-authentication_"
								role="tab"
								aria-controls="two-factor-authentication_"
								aria-selected="false"
								onclick="datatable_lit()"
								>Litigantes</a>

							<a
								class="nav-link"
								id="information-tab"
								data-toggle="pill"
								href="#information"
								role="tab"
								aria-controls="information"
								aria-selected="false"
								onclick="datatable_mov()"
								>Movimientos</a>
							
							<a
								class="nav-link"
								id="seguimiento-tab"
								data-toggle="pill"
								href="#seguimiento"
								role="tab"
								aria-controls="seguimiento"
								aria-selected="false"
								onclick="datatable_mov___()"
								>Seguimiento</a>

							<a
								class="nav-link"
								id="two-factor-authentication-tab"
								data-toggle="pill"
								href="#two-factor-authentication"
								role="tab"
								aria-controls="two-factor-authentication"
								aria-selected="false">Exp. Digital</a>
							
						</div>
					</nav>
									
					<div class="tab-content" id="my-profile-tabsContent">
						<div class="tab-pane fade pt-3 show active" id="my-profile" role="tabpanel" aria-labelledby="my-profile-tab" style="padding-top:0px!important">
							
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
											foreach ($estado_expediente as $row) {?>
											<option value="<?php echo $row->codigo?>"><?php echo $row->denominacion?></option>
											<?php 
											}
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

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		
									<div class="card-body">
									
										<div class="table-responsive">
											<table id="tblMovimiento" class="table table-hover table-sm">
											<thead>
											<tr style="font-size:13px">
												<th>Distrito Judicial</th>
												<th>Organo Jurisdiccional</th>
												<th>Responsable</th>
												<th>Estado</th>
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
						
						<div class="tab-pane fade pt-3" id="seguimiento" role="tabpanel" aria-labelledby="information-tab">
						 seguimiento
						</div>

						<div class="tab-pane fade pt-3" id="two-factor-authentication" role="tabpanel" aria-labelledby="two-factor-authentication-tab">
							3333333333333333333333333333333
						</div>
						
						<div class="tab-pane fade pt-3" id="two-factor-authentication_" role="tabpanel" aria-labelledby="two-factor-authentication-tab_">
							
							<div class="row" style="padding-top:0px">

								<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
		
									<div class="card-body">
									
										<div class="table-responsive">
											<table id="tblLitigante" class="table table-hover table-sm">
											<thead>
											<tr style="font-size:13px">
												<th>Documento</th>
												<th>Litigante</th>
												<th>Tipo Litigante</th>
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
    
	
	<script src="{{ asset('js/expediente/create.js') }}"></script>
	
	@endpush