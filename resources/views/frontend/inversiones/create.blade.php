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

            <div class="card-body">

        	<div class="row justify-content-center">

        	<div class="col col-sm-12 align-self-center">

            <div class="row">

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
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
									$clase = "bg-success";
									if($row->existe==0)$clase = "bg-danger";
								?>
								<tr id="fila_area_<?php echo $row->id?>" class="<?php echo $clase?> text-white" clase="<?php echo $clase?> text-white" onclick="obtenerPlan(<?php echo $row->id?>)">
									<td align="center"><?php echo $row->id?></td>
									<td><?php echo $row->nombre_py?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="padding:0px">
				<!--
				<div class="col-md-12" style="padding-top:10px">
					<input class="form-control" id="system-search" name="q" placeholder="Buscar ...">
				</div>
				-->
					<div class="table-responsive" style="overflow-y: visible; height:470px;width:100%">
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

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="table-responsive" style="overflow-y: visible; height:470px;width:100%">
						<table id="tblPlanDetalle" class="table table-sm">
							<thead>
								<tr>
									<!--<th>Proyecto</th>-->
									<th>Fecha Sustento</th>
									<th>Tipo Sustento</th>
									<th>Tipo Moneda</th>
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

@push('after-scripts')

<script src="{{ asset('js/inversiones/create.js') }}"></script>
    
@endpush
