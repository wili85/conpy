<link rel="stylesheet" href="<?php echo URL::to('/') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
@stack('before-scripts')
@stack('after-scripts')

<style>
.dataTables_filter {
   display: none;
}
.table.dataTable{
	border-collapse:collapse!important;
}

.form-control-sm{
	padding:0.35rem 0.5rem 0 0.5rem!important;
}

label{
	margin-bottom:0px !important;
}

</style>
@extends('frontend.layouts.app')

@section('title', ' | ' . __('labels.frontend.afiliacion.box_title'))

@section('breadcrumb')
<ol class="breadcrumb" style="padding-left:130px;margin-top:0px;background-color:#283659">
        <li class="breadcrumb-item text-primary">Inicio</li>
            <li class="breadcrumb-item active">Nuevo Ingreso</li>
        </li>
    </ol>
@endsection

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

        <div class="card">

            <div class="card-body" style="padding-top:0px">

        	<div class="row justify-content-center">

        	<div class="col col-sm-12 align-self-center">
			
			
			<div class="row" id="divSolicitud">
						
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					
					<div class="card">
						<div class="card-header" style="padding-top:2px;padding-bottom:2px">
							<div id="" class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<strong style="font-size:20px">
										Registro de Proyecto
									</strong>
									
								</div>
							</div>
						</div>

						<div class="card-body" style="margin-top:0px;margin-bottom:10px;padding-top:0px;padding-bottom:0px">
						
							<div style="clear:both"></div>
							<div class="row" style="paddin-top:0px;paddin-bottom:0px">
							
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									<label class="form-control-sm">Id Proyecto</label>
									<input type="text" name="id_proyecto" id="id_proyecto"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
								
								<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
									<label class="form-control-sm">Nombre del Proyecto</label>
									<input type="text" name="nombre_py" id="nombre_py"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
								
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<label class="form-control-sm">Estado Proyecto</label>
									<input type="text" name="nombre_estado_py" id="nombre_estado_py"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
												
							</div>
							
							<div class="row">
							
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
										<label class="form-control-sm">Detalle del Proyecto</label>
										<textarea type="text" name="detalle_py" id="detalle_py" rows="2"
										placeholder="" readonly="readonly" class="form-control form-control-sm"></textarea>
								</div>
								
								<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
									<label class="form-control-sm">Total Inversi&oacute;n</label>
									<div class="row">
										<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
											<input type="text" name="total_inversion" id="total_inversion"
											value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
										</div>
										<label class="form-control-sm col-lg-2">100%</label>
									</div>
								</div>
								
							</div>
							
							<div class="row" style="paddin-top:0px;paddin-bottom:0px">

								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									<label class="form-control-sm">Departamento</label>
									<input type="text" name="departamento" id="departamento"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
								
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									<label class="form-control-sm">Provincia</label>
									<input type="text" name="provincia" id="provincia"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
								
								<div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
									<label class="form-control-sm">Distrito</label>
									<input type="text" name="distrito" id="distrito"
										value="" readonly="readonly" placeholder="" class="form-control form-control-sm" >
								</div>
								
								<div class="col-xl-6 text-right" style="padding-top:15px">
														
									<input class="btn btn-primary btn-sm float-rigth" value="Registrar Inversionista" type="button" id="btnNuevo" style="padding-left:20px;padding-right:20px;font-size:20px"/>
									
									<input class="btn btn-sm btn-success float-rigth" value="Agregar Inversi&oacute;n" name="guardar" type="button" id="btnNuevoInversion" style="margin-left:10px;font-size:20px" />									
									
								</div>
								
								
							</div>
							

						</div>
						<!--card-body-->
					</div>
					<!--card-->
					
					
				</div>
				
			</div>

            <div class="row">

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding-right:4px!important">
					
					<div class="col-md-12" style="padding-top:8px">
						<input class="form-control form-control-sm" id="system-search-proyecto" name="q" placeholder="Buscar Proyecto">
					</div>
					
					<div class="table-responsive">
						<table id="tblValorizacion" class="table table-sm">
							<thead>
								<tr>
									<th>Id</th>
									<th>Proyecto</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($proyecto as $row){
									$clase = "bg-primary";
									if($row->existe==0)$clase = "bg-danger";
								?>
								<tr id="fila_area_<?php echo $row->id?>" class="<?php echo $clase?> text-white" clase="<?php echo $clase?> text-white" onclick="obtenerInversionista(<?php echo $row->id?>)" >
									<td align="center"><?php echo $row->id?></td>
									<td><?php echo $row->nombre_py?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding-right:2px!important;padding-left:2px">
				
					<div class="col-md-12" style="padding-top:8px">
						<input class="form-control form-control-sm" id="system-search-inversionista" name="q" placeholder="Buscar Inversionista">
						<input type="hidden" name="cadena_inversionista" id="cadena_inversionista" />
					</div>
					
					<div class="table-responsive">
						<table id="tblPlan" class="table table-sm">
							<thead>
								<tr>
									<!--<th>Proyecto</th>-->
									<th width="20%">Num. Doc</th>
									<th width="70%">Inversionista</th>
									<th width="10%">Porcentaje</th>
								</tr>
                        	</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding-left:4px">
				
					<div class="col-md-12" style="padding-top:8px">
						<input class="form-control form-control-sm" id="system-search-inversionista-detalle" name="q" placeholder="Buscar Detalle de Inversi&oacute;n">
					</div>

					<div class="table-responsive">
						<table id="tblPlanDetalle" class="table table-sm">
							<thead>
								<tr>
									<!--<th>Proyecto</th>-->
									<th>Fecha Sust.</th>
									<th width="35%">Tipo Sustento</th>
									<th>Moneda</th>
									<th>Monto</th>
								</tr>
                        	</thead>
							<tbody></tbody>
						</table>
					</div>
					
				</div>

            </div>

        </div><!--col-->

        </form>


		

    </div><!--row-->
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

<script src="{{ asset('js/inversiones/create.js') }}"></script>
    
@endpush