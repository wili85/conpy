<title>Sistema de Conpy</title>

<style>
/*
.datepicker {
  z-index: 1600 !important; 
}
*/
/*.datepicker{ z-index:99999 !important; }*/

.datepicker,
.table-condensed {
  width: 250px;
  height:250px;
}


.modal-dialog {
	width: 100%;
	max-width:40%!important
  }
  
#tablemodal{
    border-spacing: 0;
    display: flex;/*Se ajuste dinamicamente al tamano del dispositivo**/
    max-height: 80vh; /*El alto que necesitemos**/
    overflow-y: auto; /**El scroll verticalmente cuando sea necesario*/
    overflow-x: hidden;/*Sin scroll horizontal*/
    table-layout: fixed;/**Forzamos a que las filas tenga el mismo ancho**/
    width: 98vw; /*El ancho que necesitemos*/
    border:1px solid #c4c0c9;
}

#tablemodal thead{
    background-color: #e2e3e5;
    position: fixed !important;
}


#tablemodal th{
    border-bottom: 1px solid #c4c0c9;
    border-right: 1px solid #c4c0c9;
}

#tablemodal th{
    font-weight: normal;
    margin: 0;
    max-width: 9.5vw; 
    min-width: 9.5vw;
    word-wrap: break-word;
    font-size: 10px;
	font-weight:bold;
    height: 3.5vh !important;
	line-height:12px;
	vertical-align:middle;
	/*height:20px;*/
    padding: 4px;
    border-right: 1px solid #c4c0c9;
}

#tablemodal td{
    font-weight: normal;
    margin: 0;
    max-width: 9.5vw; 
    min-width: 9.5vw;
    word-wrap: break-word;
    font-size: 11px;
    height: 3.5vh !important;
    padding: 4px;
    border-right: 1px solid #c4c0c9;
}

#tablemodal tbody tr:hover td, #tablemodal tbody tr:hover th {
  /*background-color: red!important;*/
  font-weight:bold;
  /*mix-blend-mode: difference;*/
  
}

#tablemodalm{
	
}

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
  background-color: #337ab7;
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
  background-color: #4cae4c;
}

input:focus + .slider {
  box-shadow: 0 0 1px #4cae4c;
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

.no {padding-right:3px;padding-left:0px;display:block;width:100px;float:left;font-size:14px;text-align:right;padding-top:5px}
.si {padding-right:0px;padding-left:3px;display:block;width:100px;float:left;font-size:14px;text-align:left;padding-top:5px}

</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />

<script type="text/javascript">

$('#openOverlayOpc').on('shown.bs.modal', function() {
     
	 $('#fecha_vencimiento').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		container: '#openOverlayOpc modal-body'
     });
	 
	 $('#fecha_pago').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		container: '#openOverlayOpc modal-body'
     });
	 
	 
});

$(document).ready(function() {
	 
	 

});

function validacion(){
    
    var msg = "";
    var cobservaciones=$("#frmComentar #cobservaciones").val();
    
    if(cobservaciones==""){msg+="Debe ingresar una Observacion <br>";}
    
    if(msg!=""){
        bootbox.alert(msg); 
        return false;
    }
}

function guardarCita__(){
	alert("fdssf");
}

function guardarCita(id_medico,fecha_cita){
    
    var msg = "";
    var id_ipress = $('#id_ipress').val();
    var id_consultorio = $('#id_consultorio').val();
    var fecha_atencion = $('#fecha_atencion').val();
    var dni_beneficiario = $("#dni_beneficiario").val();
	//alert(id_ipress);
	if(dni_beneficiario == "")msg += "Debe ingresar el numero de documento <br>";
    if(id_ipress==""){msg+="Debe ingresar una Ipress<br>";}
    if(id_consultorio==""){msg+="Debe ingresar un Consultorio<br>";}
    if(fecha_atencion==""){msg+="Debe ingresar una fecha de atencion<br>";}
   
    if(msg!=""){
        bootbox.alert(msg); 
        return false;
    }
    else{
        fn_save_cita(id_medico,fecha_cita);
    }
}

function fn_save_ingreso_gasto(){
    
	var _token = $('#_token').val();
	var id = $('#id').val();
	var id_proyecto = $('#idProyecto').val();
	var id_expediente = $('#idExpediente').val();
	var id_tipo_gasto = $('#id_tipo_gasto').val();
	var id_tipo_moneda = $('#id_tipo_moneda').val();
	var monto = $('#monto').val();
	var fecha_vencimiento = $('#fecha_vencimiento').val();
	var fecha_pago = $('#fecha_pago').val();
	var id_dist_judicial = $('#id_dist_judicial').val();
	var id_org_juris = $('#id_org_juris').val();
	var estado_pago = $('#estado_pago').val();
	var id_tipo_sustento = $('#id_tipo_sustento').val();
	var id_tipo = $('#id_tipo').val();
	
    $.ajax({
			url: "/ingreso_gasto/send_ingreso_gasto",
            type: "POST",
            data : {_token:_token,id:id,id_tipo:id_tipo,id_proyecto:id_proyecto,id_expediente:id_expediente,id_tipo_gasto:id_tipo_gasto,id_tipo_moneda:id_tipo_moneda,monto:monto,fecha_vencimiento:fecha_vencimiento,fecha_pago:fecha_pago,id_dist_judicial:id_dist_judicial,id_org_juris:id_org_juris,estado_pago:estado_pago,id_tipo_sustento:id_tipo_sustento},
            success: function (result) {
				
				$('#openOverlayOpc').modal('hide');
				//window.location.reload();
				datatable_ingreso_gastos();
				
				/*
				$('#openOverlayOpc').modal('hide');
				if(result==1){
					bootbox.alert("La persona o empresa ya se encuentra registrado");
				}else{
					window.location.reload();
				}
				*/
            }
    });
}

function fn_liberar(id){
    
	//var id_estacionamiento = $('#id_estacionamiento').val();
	var _token = $('#_token').val();
	
    $.ajax({
			url: "/estacionamiento/liberar_asignacion_estacionamiento_vehiculo",
            type: "POST",
            data : {_token:_token,id:id},
            success: function (result) {
				$('#openOverlayOpc').modal('hide');
				cargarAsignarEstacionamiento();
            }
    });
}


function validarLiquidacion() {
	
	var msg = "";
	var sw = true;
	
	var saldo_liquidado = $('#saldo_liquidado').val();
	var estado = $('#estado').val();
	
	if(saldo_liquidado == "")msg += "Debe ingresar un saldo liquidado <br>";
	if(estado == "")msg += "Debe ingresar una observacion <br>";
	
	if(msg!=""){
		bootbox.alert(msg);
		//return false;
	} else {
		//submitFrm();
		document.frmLiquidacion.submit();
	}
	return false;
}


function obtenerVehiculo(id,obj){
	
	//$("#tblPlan tbody text-white").attr('class','bg-primary text-white');
	if(obj!=undefined){
		$("#tblSinReservaEstacionamiento tbody tr").each(function (ii, oo) {
			var clase = $(this).attr("clase");
			$(this).attr('class',clase);
		});
		
		$(obj).attr('class','bg-success text-white');
	}
	//$('#tblPlanDetalle tbody').html("");
	$('#id_empresa').val(id);
	var id_estacionamiento = $('#id_estacionamiento').val();
	$.ajax({
		url: '/estacionamiento/obtener_vehiculo/'+id+'/'+id_estacionamiento,
		dataType: "json",
		success: function(result){
			
			var newRow = "";
			$('#tblPlanDetalle').dataTable().fnDestroy(); //la destruimos
			$('#tblPlanDetalle tbody').html("");
			$(result).each(function (ii, oo) {
				newRow += "<tr class='normal'><td>"+oo.placa+"</td>";
				newRow += '<td class="text-left" style="padding:0px!important;margin:0px!important">';
				newRow += '<div class="btn-group btn-group-sm" role="group" aria-label="Log Viewer Actions">';
				newRow += '<a href="javascript:void(0)" onClick=fn_save("'+oo.id_vehiculo+'") class="btn btn-sm btn-normal">';
				newRow += '<i class="fa fa-2x fa-check" style="color:green"></i></a></a></div></td></tr>';
			});
			$('#tblPlanDetalle tbody').html(newRow);
			
			$('#tblPlanDetalle').DataTable({
				//"sPaginationType": "full_numbers",
				"paging":false,
				"dom": '<"top">rt<"bottom"flpi><"clear">',
				"language": {"url": "/js/Spanish.json"},
			});
			
			$("#system-search2").keyup(function() {
				var dataTable = $('#tblPlanDetalle').dataTable();
			   dataTable.fnFilter(this.value);
			});
			
		}
		
	});
	
}

function cargar_tipo_proveedor(){
	
	var tipo_proveedor = 0;
	if($('#tipo_proveedor_').is(":checked"))tipo_proveedor = 1;
	
	$("#divPersona").hide();
	$("#divEmpresa").hide();
	
	$("#empresa_").val("");
	$("#persona_").val("");
	
	$("#id_empresa").val("");
	$("#id_persona").val("");
	
	if(tipo_proveedor==0)$("#divPersona").show();
	if(tipo_proveedor==1)$("#divEmpresa").show();
	
}

/*
$('#fecha_solicitud').datepicker({
	autoclose: true,
	dateFormat: 'dd-mm-yy',
	changeMonth: true,
	changeYear: true,
	container: '#openOverlayOpc modal-body'
});
*/
/*
$('#fecha_solicitud').datepicker({
	format: "dd/mm/yyyy",
	startDate: "01-01-2015",
	endDate: "01-01-2020",
	todayBtn: "linked",
	autoclose: true,
	todayHighlight: true,
	container: '#openOverlayOpc modal-body'
});
*/

/*				
format: "dd/mm/yyyy",
startDate: "01-01-2015",
endDate: "01-01-2020",
todayBtn: "linked",
autoclose: true,
todayHighlight: true,
container: '#myModal modal-body'
*/	
</script>


<body class="hold-transition skin-blue sidebar-mini">

    <div>
		<!--
        <section class="content-header">
          <h1>
            <small style="font-size: 20px">Programados del Medicos del dia <?php //echo $fecha_atencion?></small>
          </h1>
        </section>
		-->
		<div class="justify-content-center">		

		<div class="card">
			
			<div class="card-header" style="padding:5px!important;padding-left:20px!important">
				Registro Ingresos - Gastos
			</div>
			
            <div class="card-body">

			<div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-top:5px;padding-bottom:20px">
					
					<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="id" id="id" value="<?php echo $id?>">
					
					
					<div class="row" style="padding-left:10px">
						
						<?php if($proyecto->nombre_py!=""){?>
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Proyecto</label>
								<input type="text" value="<?php echo $proyecto->nombre_py?>" class="form-control form-control-sm" readonly="readonly" >
							</div>
						</div>
						<?php }?>
						
						<?php if($expediente->descripcion!=""){?>
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Expediente</label>
								<input type="text" value="<?php echo $expediente->descripcion?>" class="form-control form-control-sm" readonly="readonly" >
							</div>
						</div>
						<?php }?>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Tipo</label>
								<select name="id_tipo" id="id_tipo" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<option value="1" <?php if(1==$ingresosGasto->id_tipo)echo "selected='selected'"?> >Ingreso</option>
									<option value="2" <?php if(2==$ingresosGasto->id_tipo)echo "selected='selected'"?> >Gasto</option>
								</select>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Concepto</label>
								<select name="id_tipo_gasto" id="id_tipo_gasto" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($tipo_gasto as $row) {?>
									<option value="<?php echo $row->codigo?>" <?php if($row->codigo==$ingresosGasto->id_tipo_gasto)echo "selected='selected'"?> ><?php echo $row->denominacion?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label form-control-sm">Moneda</label>
								<select name="id_tipo_moneda" id="id_tipo_moneda" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($moneda as $row) {?>
									<option value="<?php echo $row->codigo?>" <?php if($row->codigo==$ingresosGasto->id_tipo_moneda)echo "selected='selected'"?> ><?php echo $row->denominacion?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label form-control-sm">Monto</label>
								<input type="text" name="monto" id="monto"
								value="<?php echo $ingresosGasto->monto?>" placeholder="" class="form-control form-control-sm" >
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label form-control-sm">Fecha Vencimiento</label>
								<input type="text" name="fecha_vencimiento" id="fecha_vencimiento"
								value="<?php if(isset($ingresosGasto->fecha_vencimiento))echo date("d-m-Y", strtotime($ingresosGasto->fecha_vencimiento))?>" placeholder="" class="form-control form-control-sm" >
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label form-control-sm">Fecha Pago</label>
								<input type="text" name="fecha_pago" id="fecha_pago"
								value="<?php if(isset($ingresosGasto->fecha_pago))echo date("d-m-Y", strtotime($ingresosGasto->fecha_pago))?>" placeholder="" class="form-control form-control-sm" >
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="form-group">
								<label class="control-label form-control-sm">Tipo Sustento</label>
								<select name="id_tipo_sustento" id="id_tipo_sustento" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($tipo_sustento as $row) {?>
									<option value="<?php echo $row->codigo?>" <?php if($row->codigo==$ingresosGasto->id_tipo_sustento)echo "selected='selected'"?> ><?php echo $row->denominacion?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Distrito Judicial</label>
								<select name="id_dist_judicial" id="id_dist_judicial" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($distrito_judicial as $row) {?>
									<option value="<?php echo $row->id?>" <?php if($row->id==$ingresosGasto->id_dist_judicial)echo "selected='selected'"?> ><?php echo $row->nombre?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Organo Jurisdiccional</label>
								<select name="id_org_juris" id="id_org_juris" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($organo as $row) {?>
									<option value="<?php echo $row->id?>" <?php if($row->id==$ingresosGasto->id_org_juris)echo "selected='selected'"?> ><?php echo $row->nombre?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label form-control-sm">Estado</label>
								<select name="estado_pago" id="estado_pago" class="form-control form-control-sm" onChange="">
									<option value="">--Seleccionar--</option>
									<?php
									foreach ($estado_ingreso_gasto as $row) {?>
									<option value="<?php echo $row->codigo?>" <?php if($row->codigo==$ingresosGasto->estado_pago)echo "selected='selected'"?>><?php echo $row->denominacion?></option>
									<?php 
									}
									?>
								</select>
							</div>
						</div>
						
					</div>
					
					
					
					<div style="margin-top:15px" class="form-group">
						<div class="col-sm-12 controls">
							<div class="btn-group btn-group-sm float-right" role="group" aria-label="Log Viewer Actions">
								<a href="javascript:void(0)" onClick="fn_save_ingreso_gasto()" class="btn btn-sm btn-success">Guardar</a>
							</div>
												
						</div>
					</div> 
					
              </div>
			  
              
          </div>
          <!-- /.box -->
          

        </div>
        <!--/.col (left) -->
            
     
          </div>
          <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
<script type="text/javascript">
$(document).ready(function () {
	
	
	$('#tblReservaEstacionamiento').DataTable({
		"dom": '<"top">rt<"bottom"flpi><"clear">'
		});
	$("#system-search").keyup(function() {
		var dataTable = $('#tblReservaEstacionamiento').dataTable();
		dataTable.fnFilter(this.value);
	}); 
	
	$('#tblReservaEstacionamientoPreferente').DataTable({
		"dom": '<"top">rt<"bottom"flpi><"clear">'
		});
	$("#system-searchp").keyup(function() {
		var dataTable = $('#tblReservaEstacionamientoPreferente').dataTable();
		dataTable.fnFilter(this.value);
	});
	
	$('#tblSinReservaEstacionamiento').DataTable({
		"dom": '<"top">rt<"bottom"flpi><"clear">'
		});
	$("#system-search2").keyup(function() {
		var dataTable = $('#tblSinReservaEstacionamiento').dataTable();
		dataTable.fnFilter(this.value);
	}); 
	
	
});

</script>

<script type="text/javascript">
$(document).ready(function() {
	
	$('#persona_').keyup(function() {
		this.value = this.value.toLocaleUpperCase();
	});
		
	$('#persona_').focusin(function() { $('#persona_').select(); });
	/*
	$('#usuario_').autocomplete({
		appendTo: "#usuario_busqueda",
		source: function(request, response) {
			$.ajax({
			url: '/empresa/list_usuario/'+$('#usuario_').val(),
			dataType: "json",
			success: function(data){
			   var resp = $.map(data,function(obj){
					var hash = {key: obj.id, value: obj.usuario};
					return hash;
			   }); 
			   response(resp);
			},
			error: function() {
			}
		});
		},
		select: function (event, ui) {
			$("#user_id").val(ui.item.key);
		},
			minLength: 2,
			delay: 100
	  });
	*/
	
	$('#empresa_').keyup(function() {
		this.value = this.value.toLocaleUpperCase();
	});
		
	$('#empresa_').focusin(function() { $('#empresa_').select(); });
	
	$('#empresa_').autocomplete({
		appendTo: "#empresa_busqueda",
		source: function(request, response) {
			$.ajax({
			url: '/empresa/list_empresa/'+$('#empresa_').val(),
			dataType: "json",
			success: function(data){
			   var resp = $.map(data,function(obj){
					var hash = {key: obj.id, value: obj.razon_social, ruc: obj.ruc};
					return hash;
			   }); 
			   response(resp);
			},
			error: function() {
			}
		});
		},
		select: function (event, ui) {
			$("#id_empresa").val(ui.item.key);
		},
			minLength: 1,
			delay: 100
	  });
	  
	  $('#persona_').autocomplete({
		appendTo: "#persona_busqueda",
		source: function(request, response) {
			$.ajax({
			url: '/persona/list_persona/'+$('#persona_').val(),
			dataType: "json",
			success: function(data){
			   var resp = $.map(data,function(obj){
					var hash = {key: obj.id, value: obj.persona};
					return hash;
			   }); 
			   response(resp);
			},
			error: function() {
			}
		});
		},
		select: function (event, ui) {
			$("#id_persona").val(ui.item.key);
		},
			minLength: 1,
			delay: 100
	  });
	  
	
});

</script>

