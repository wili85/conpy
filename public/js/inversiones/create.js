//alert("ok");
//jQuery.noConflict(true);

$(document).ready(function () {
	
	var otable = $('#tblValorizacion').DataTable({
		"filter": true,
        "searching": true,
		"paging":false,
		//"dom": '<"top">rt<"bottom"flpi><"clear">',
		"language": {"url": "/js/Spanish.json"},
	});
	
	$("#system-search-proyecto").keyup(function() {
		var dataTable = $('#tblValorizacion').dataTable();
	   dataTable.fnFilter(this.value);
	});
	
	$("#system-search-proyecto").click(function() {
		obtenerInversionista(0);
		obtenerDetalleInversionista(0);	
	});

	obtenerInversionista(0);
	obtenerDetalleInversionista(0);
	
	//$("#plan_id").select2();
	//$("#ubicacion_id").select2();
	
	//$("#id_servicio").select2();
	/*
	$('#fecha_inicio').datepicker({
        autoclose: true,
		dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true,
    });
	
	$('#fecha_vencimiento').datepicker({
        autoclose: true,
        dateFormat: 'dd/mm/yy',
		changeMonth: true,
		changeYear: true,
    });
	*/
	/*
    $('#tblAlquiler').dataTable({
    	"language": {
    	"emptyTable": "No se encontraron resultados"
    	}
	});
	*/
	/*
	$('#tblAlquiler').dataTable( {
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningun dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "ultimo",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                },
                "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        } );
	*/


	$(function() {
		$('#modalPersonaForm #apellido_paterno').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	$(function() {
		$('#modalPersonaForm #apellido_materno').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	$(function() {
		$('#modalPersonaForm #nombres').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});


	$(function() {
		$('#modalPersonaTitularForm #apellido_paterno').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	$(function() {
		$('#modalPersonaTitularForm #apellido_materno').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
	$(function() {
		$('#modalPersonaTitularForm #nombres').keyup(function() {
			this.value = this.value.toLocaleUpperCase();
		});
	});
});


function habiliarTitular(){
	/*
	$('#divTitular').hide();
	if(!$("#chkTitular").is(':checked')) {
    	$('#divTitular').show();
	}
	*/
}

function guardarAfiliacion(){
    
    var msg = "";
    var persona_id = $('#persona_id').val();
    var titular_id = $('#titular_id').val();
	var plan_id = $('#plan_id').val();
	var fecha_inicio = $('#fecha_inicio').val();
	var fecha_vencimiento = $('#fecha_vencimiento').val();
	
    if(msg!=""){
        bootbox.alert(msg); 
        return false;
    }
    else{
        fn_save();
	}
	
}

function fn_save(){
    
	var id_plan = $('#id_plan').val();
	
    $.ajax({
			url: "/afiliacion/send_afiliado",
            type: "POST",
            //data : $("#frmCita").serialize()+"&id_medico="+id_medico+"&fecha_cita="+fecha_cita,
            data : $("#frmAfiliado").serialize()+"&id_plan="+id_plan,
            success: function (result) {
					//location.href="/afiliacion";
					obtenerPlanDetalle(id_plan);
            }
    });
}

function guardarDetallePlan(){
    
    var msg = "";
    //var persona_id = $('#persona_id').val();
    //var titular_id = $('#titular_id').val();
	//var plan_id = $('#plan_id').val();
	//var fecha_inicio = $('#fecha_inicio').val();
	//var fecha_vencimiento = $('#fecha_vencimiento').val();
	/*
	if(persona_id == "")msg += "Debe ingresar el Numero de Documento <br>";
	if(!$("#chkTitular").is(':checked')) {
    	if(titular_id == "")msg += "Debe ingresar el Numero de Documento del Titular<br>";
	}
    if(plan_id == "0")msg+="Debe seleccionar un Plan/Tarifario <br>";
	if(fecha_inicio == "")msg += "Debe ingresar la fecha de inicio de la afiliacion <br>";
	if(fecha_vencimiento == "")msg += "Debe ingresar la fecha de fin de la afiliacion <br>";
	*/
    if(msg!=""){
        bootbox.alert(msg); 
        return false;
    }
    else{
        fn_save_detalle_plan();
	}
	
	//fn_save();
}

function fn_save_detalle_plan(){
    
    //var fecha_atencion_original = $('#fecha_atencion').val();
	var id_plan = $('#id_plan').val();
	
    $.ajax({
			url: "/afiliacion/send_detalle_plan",
            type: "POST",
            //data : $("#frmCita").serialize()+"&id_medico="+id_medico+"&fecha_cita="+fecha_cita,
            data : $("#frmDetallePlan").serialize(),
            success: function (result) {
					//location.href="/afiliacion";
					obtenerPlanDetalle(id_plan);
            }
    });
}


function validaTipoDocumento(){
	var tipo_documento = $("#tipo_documento").val();
	$('#nombre_afiliado').val("");
	$('#empresa_afiliado').val("");
	$('#empresa_direccion').val("");
	$('#empresa_representante').val("");
	$('#codigo_afiliado').val("");	
	$('#fecha_afiliado').val("");
				
	if(tipo_documento == "RUC"){
		$('#divNombreApellido').hide();
		$('#divCodigoAfliado').hide();
		$('#divFechaAfliado').hide();
		$('#divDireccionEmpresa').show();
		$('#divRepresentanteEmpresa').show();
	}else{
		$('#divNombreApellido').show();
		$('#divCodigoAfliado').show();
		$('#divFechaAfliado').show();
		$('#divDireccionEmpresa').hide();
		$('#divRepresentanteEmpresa').hide();
	}
}

function obtenerPersona(){
		
	var tipo_documento = $("#tipo_documento").val();
	var numero_documento = $("#numero_documento").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	//$('#empresa_id').val("");
	$('#persona_id').val("");
	
	$.ajax({
		url: '/persona/obtener_persona/' + tipo_documento + '/' + numero_documento,
		dataType: "json",
		success: function(result){
			var nombre_persona= result.persona.apellido_paterno+" "+result.persona.apellido_materno+", "+result.persona.nombres;
			
			if (typeof result.persona.flag_negativo != "undefined" && result.persona.flag_negativo=="1") {
				bootbox.alert("La persona se encuentra en la lista de negativos, no puede realizar ningun movimiento"); 
				return false;
			}
			
			$('#nombre_persona').val(nombre_persona);
			$('#persona_id').val(result.persona.id);
			if(result.persona.titular_id > 0){
				$("#chkTitular").attr("checked",false);
				$("#numero_documento_tit").val(result.persona.numero_documento_titular);
				obtenerTitularActual(result.persona.tipo_documento_titular,result.persona.numero_documento_titular);
			}
			if(result.persona.titular_id == 0){
				$("#chkTitular").attr("checked",true);
				$("#numero_documento_tit").val(numero_documento);
				obtenerTitularActual(tipo_documento,numero_documento);
			}
		},
		error: function(data) {
			alert("Persona no encontrada en la Base de Datos.");
			$('#personaModal').modal('show');
		}
		
	});
	
}

function obtenerTitularActual(tipo_documento,numero_documento){
		
	//var tipo_documento = $("#tipo_documento_tit").val();
	//var numero_documento = $("#numero_documento_tit").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	//$('#empresa_id').val("");
	$('#titular_id').val("");
	
	$.ajax({
		url: '/persona/obtener_persona/' + tipo_documento + '/' + numero_documento,
		dataType: "json",
		success: function(result){
			var nombre_titular = result.persona.apellido_paterno+" "+result.persona.apellido_materno+", "+result.persona.nombres;
			$('#nombre_titular').html(nombre_titular);
			$('#titular_id').val(result.persona.id);
		},
		error: function(data) {
			alert("Persona no encontrada en la Base de Datos.");
			$('#personaTitularModal').modal('show');
		}
		
	});
	
}

function obtenerTitular(){
		
	var tipo_documento = $("#tipo_documento_tit").val();
	var numero_documento = $("#numero_documento_tit").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	//$('#empresa_id').val("");
	$('#titular_id').val("");
	
	$.ajax({
		url: '/persona/obtener_persona/' + tipo_documento + '/' + numero_documento,
		dataType: "json",
		success: function(result){
			var nombre_titular = result.persona.apellido_paterno+" "+result.persona.apellido_materno+", "+result.persona.nombres;
			$('#nombre_titular').val(nombre_titular);
			$('#titular_id').val(result.persona.id);
		},
		error: function(data) {
			alert("Persona no encontrada en la Base de Datos.");
			$('#personaTitularModal').modal('show');
		}
		
	});
	
}

function obtenerInversionista(id){
	
	$('#tblPlanDetalle tbody').html("");
	$('#tblPlan tbody').html("");
	
	$("#tblValorizacion tbody tr").each(function (ii, oo) {
		var clase = $(this).attr("clase");
		$(this).attr('class',clase);
	});
	
	$("#fila_area_"+id).attr('class','bg-success text-white');
	
	$.ajax({
		url: '/inversiones/obtener_inversionista/'+id,
		dataType: "json",
		success: function(result){
			
			if(result.proyecto!=null){
				var proyecto = result.proyecto;
				$("#id_proyecto").val(proyecto.id);
				$("#nombre_py").val(proyecto.nombre_py);
				$("#detalle_py").val(proyecto.detalle_py);
				$("#departamento").val(proyecto.departamento);
				$("#provincia").val(proyecto.provincia);
				$("#distrito").val(proyecto.distrito);
				$("#nombre_estado_py").val(proyecto.nombre_estado_py);
				$("#total_inversion").val(proyecto.total_inversion);
			}
			
			var option = "";
			$('#tblPlan').dataTable().fnDestroy(); //la destruimos
			$('#tblPlan tbody').html("");
			
			var cadena_inversionista = "";
			$("#cadena_inversionista").val("");
			
			$(result.inversionista).each(function (ii, oo) {
				var clase = "bg-primary";
				if(oo.existe==0)clase = "bg-danger";
				
				option += "<tr id='fila_"+oo.id+"' class='"+clase+" text-white' clase='"+clase+" text-white' onclick=obtenerDetalleInversionista("+oo.id+",this)>";
				option += "<td>"+oo.numero_documento+"</td>";
				option += "<td>"+oo.inversionista+"</td>";
				option += "<td>"+oo.porcentaje+"</td>";
				option += "</tr>";
				
				cadena_inversionista += oo.id+",";
				
			});
			
			cadena_inversionista = cadena_inversionista.substring(0,cadena_inversionista.length-1);
			$("#cadena_inversionista").val(cadena_inversionista);
			
			$('#tblPlan tbody').html(option);
			
			
			$('#tblPlan').DataTable({
				"paging":false,
				"dom": '<"top">rt<"bottom"flpi><"clear">',
				"language": {"url": "/js/Spanish.json"},
			});
			
			$("#system-search-inversionista").keyup(function() {
				var dataTable = $('#tblPlan').dataTable();
			   dataTable.fnFilter(this.value);
			});
			
			 
			if(id>0){
				var cadena_inversionista = $("#cadena_inversionista").val();
				obtenerDetalleInversionista(cadena_inversionista);	
			}
			
			
			
		}
		
	});
	
}

function obtenerDetalleInversionista(id,obj){
	
	$("#tblPlan tbody tr").each(function (ii, oo) {
		var clase = $(this).attr("clase");
		$(this).attr('class',clase);
	});
	//alert(id);
	if(obj!=undefined){
		$("#fila_"+id).attr('class','bg-success text-white');
	}
	
	//$('#id_plan').val(id);
	
	$.ajax({
		url: '/inversiones/obtener_detalle_inversionista/'+id,
		dataType: "json",
		success: function(result){
			var option = "";			
			var option = "";
			$('#tblPlanDetalle').dataTable().fnDestroy(); //la destruimos
			$('#tblPlanDetalle tbody').html("");
			$(result).each(function (ii, oo) {
				option += "<tr class='bg-primary text-white'>";
				option += "<td>"+oo.fecha_sustento+"</td>";
				option += "<td>"+oo.tipo_sustento+"</td>";
				option += "<td>"+oo.tipo_moneda+"</td>";
				option += "<td>"+oo.monto+"</td>";
				option += "</tr>";
				
			});
			$('#tblPlanDetalle tbody').html(option);
			
			$('#tblPlanDetalle').DataTable({
				"paging":false,
				"dom": '<"top">rt<"bottom"flpi><"clear">',
				"language": {"url": "/js/Spanish.json"},
			});
			
			$("#system-search-inversionista-detalle").keyup(function() {
				var dataTable = $('#tblPlanDetalle').dataTable();
			   dataTable.fnFilter(this.value);
			});
			
		}
		
	});
	
}

function eliminarDetallePlan(id){

    bootbox.confirm({ 
        size: "small",
        message: "&iquest;Deseas eliminar el servicio?", 
        callback: function(result){
            if (result==true) {
                fn_eliminar_detalle_plan(id);
            }
        }
    });
    $(".modal-dialog").css("width","30%");
}

function fn_eliminar_detalle_plan(id){
	
	var id_plan = $('#id_plan').val();
    $.ajax({
            url: "/afiliacion/eliminar_detalle_plan/"+id,
            type: "GET",
            success: function (result) {
                if(result="success")obtenerPlanDetalle(id_plan);
            }
    });
}

function eliminarAfiliado(id){

    bootbox.confirm({ 
        size: "small",
        message: "&iquest;Deseas eliminar el afiliado?", 
        callback: function(result){
            if (result==true) {
                fn_eliminar_afiliado(id);
            }
        }
    });
    $(".modal-dialog").css("width","30%");
}

function fn_eliminar_afiliado(id){
	
	var id_plan = $('#id_plan').val();
    $.ajax({
            url: "/afiliacion/eliminar_afiliado/"+id,
            type: "GET",
            success: function (result) {
                if(result="success")obtenerPlanDetalle(id_plan);
            }
    });
}

function eliminarEmpresa(id){

    bootbox.confirm({ 
        size: "small",
        message: "&iquest;Deseas eliminar la empresa?", 
        callback: function(result){
            if (result==true) {
                fn_eliminar_empresa(id);
            }
        }
    });
    $(".modal-dialog").css("width","30%");
}

function fn_eliminar_empresa(id){
	
	var id_plan = $('#id_plan').val();
    $.ajax({
            url: "/afiliacion/eliminar_afiliacion_empresa/"+id,
            type: "GET",
            success: function (result) {
                if(result="success")obtenerPlanDetalle(id_plan);
            }
    });
}

/*
function cargarAlquiler(){
    
    var empresa_id = $('#empresa_id').val();
	if(empresa_id == "")empresa_id=0;
	
    $("#tblAlquiler tbody").html("");
	$.ajax({
			url: "/alquiler/obtener_alquiler/"+empresa_id,
			type: "GET",
			success: function (result) {  
					$("#tblAlquiler tbody").html(result);
					//$('#tblAlquiler').dataTable();
			}
	});

}


function cargarDevolucion(){
    
    
    var numero_documento = $("#numero_documento").val();
    $("#tblPago tbody").html("");
	$.ajax({
			url: "/alquiler/obtener_devolucion/"+numero_documento,
			type: "GET",
			success: function (result) {  
					$("#tblDevolucion tbody").html(result);
			}
	});

}
*/

$(function() {
	$('#numero_documento_').blur(function () {
		var id = $('#id').val();

		$('#apellido_paterno').val('')
		$('#apellido_materno').val('')
		$('#nombres').val('')

		//alert("obtenerPersona1");
		

		obtenerPersona1(this.value );
		
		obtenerEmpresa(this.value );

		//}
	});
});

function obtenerPersona1(numero_documento){
	
	var tipo_documento = $("#tipo_documento").val();
	var numero_documento = $("#numero_documento").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	//alert('/persona/obtener_persona/' + tipo_documento + '/' + numero_documento);
	if (tipo_documento != "DNI") {
		$('#apellido_paterno').attr('readonly', false);
		$('#apellido_materno').attr('readonly', false);
		$('#nombres').attr('readonly', false);
	}

	$.ajax({
		url: '/persona/obtener_persona/' + tipo_documento + '/' + numero_documento,
		
		dataType: "json",
		success: function(result){

			if(result.persona==null){

				if (tipo_documento == "DNI") {
					validaDni(numero_documento);
					$('#apellido_paterno').attr('readonly', true);
					$('#apellido_materno').attr('readonly', true);
					$('#nombres').attr('readonly', true);
				}
				else{
					$('#apellido_paterno').val(result.persona.apellido_paterno);
					$('#apellido_materno').val(result.persona.apellido_materno);
					$('#nombres').val(result.persona.nombres);
					$('#apellido_paterno').attr('readonly', true);
					$('#apellido_materno').attr('readonly', true);
					$('#nombres').attr('readonly', true);
				}
			}
		},
		error: function(data) {
			//alert("Persona no encontrada en la Base de Datos.");
			if (tipo_documento == "DNI") {
				validaDni(numero_documento);
			}
		}
		
	});		
}

function obtenerEmpresa(){
		
	var tipo_documento = $("#tipo_documento_e").val();
	var ruc = $("#ruc").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	$('#id_empresa').val("");
	
	$.ajax({
		url: '/empresa/buscar_empresa_ruc/' + ruc,
		dataType: "json",
		success: function(result){
			$('#id_empresa').val(result.id);
		},
		error: function(data) {
			alert("Persona no encontrada en la Base de Datos.");
			//$('#personaModal').modal('show');
		}
		
	});
	
}


function obtenerPersona(){
		
	var tipo_documento = $("#tipo_documento").val();
	var numero_documento = $("#numero_documento").val();
	var msg = "";
	
	if (msg != "") {
		bootbox.alert(msg);
		return false;
	}
	
	//$('#empresa_id').val("");
	$('#persona_id').val("");
	
	$.ajax({
		url: '/persona/obtener_persona/' + tipo_documento + '/' + numero_documento,
		dataType: "json",
		success: function(result){

			if(result.persona==null){
				alert("Persona no encontrada en la Base de Datos.");
				$('#numero_documento_').val(numero_documento);
				$('#tipo_documento1').val(tipo_documento);
				$('#personaModal').modal('show');
				return false;
			}

			var nombre_persona= result.persona.apellido_paterno+" "+result.persona.apellido_materno+", "+result.persona.nombres;
			
			if (typeof result.persona.flag_negativo != "undefined" && result.persona.flag_negativo=="1") {
				bootbox.alert("La persona se encuentra en la lista de negativos, no puede realizar ningun movimiento"); 
				return false;
			}
			
			$('#nombre_persona').val(nombre_persona);
			$('#persona_id').val(result.persona.id);
			if(result.persona.titular_id > 0){
				$("#chkTitular").attr("checked",false);
				$("#$('#apellido_paterno').val(data.apellido_paterno);tit").val(result.persona.numero_documento_titular);
				obtenerTitularActual(result.persona.tipo_documento_titular,result.persona.numero_documento_titular);
			}
			if(result.persona.titular_id == 0){
				$("#chkTitular").attr("checked",true);
				$("#numero_documento_tit").val(numero_documento);
				obtenerTitularActual(tipo_documento,numero_documento);
			}


		},
		error: function(data) {
			alert("Persona no encontrada en la Base de Datos.");
			$('#numero_documento_').val(numero_documento);
			$('#tipo_documento1').val(tipo_documento);
			$('#personaModal').modal('show');
		}
		
	});
	
}


function validaDni(dni){
	var settings = {
		"url": "https://apiperu.dev/api/dni/"+dni,
		"method": "GET",
		"timeout": 0,
		"headers": {
		"Authorization": "Bearer 20b6666ddda099db4204cf53854f8ca04d950a4eead89029e77999b0726181cb"
		},
	};

  $.ajax(settings).done(function (response) {
	console.log(response);

	if (response.success == true){

		var data= response.data;

		$('#apellido_paterno').val('')
		$('#apellido_materno').val('')
		$('#nombres').val('')

		$('#apellido_paterno').val(data.apellido_paterno);
		$('#apellido_materno').val(data.apellido_materno);
		$('#nombres').val(data.nombres);

		//alert(data.nombre_o_razon_social);

	}
	else{
		bootbox.alert("DNI Invalido,... revise el DNI digitado ¡");
		return false;
	}

  });
}


$('#modalPersonaSaveBtn').click(function (e) {
	e.preventDefault();
	$(this).html('Enviando datos..');

	$.ajax({
	  data: $('#modalPersonaForm').serialize(),
	  url: "/afiliacion/nueva_inscripcion_ajax",
	  type: "POST",
	  dataType: 'json',
	  success: function (data) {

		  $('#modalPersonaForm #modalPersonaForm').trigger("reset");
		  $('#personaModal').modal('hide');
		  
		  $('#numero_documento').val(data.numero_documento);
		  $('#nombre_titular').html(data.nombre_apellido);

		  alert("La persona ha sido ingresada correctamente!");

		  $('#apellido_paterno').val('')
		  $('#apellido_materno').val('')
		  $('#nombres').val('')

	  },
	  error: function(data) {
	mensaje = "Revisar el formulario:\n\n";
	$.each( data["responseJSON"].errors, function( key, value ) {
	  mensaje += value +"\n";
	});
	$("#modalPersonaForm #modalPersonaSaveBtn").html("Grabar");
	alert(mensaje);
  }
  });
});

$('#modalPersonaTitularSaveBtn').click(function (e) {
	e.preventDefault();
	$(this).html('Enviando datos..');

	$.ajax({
	  data: $('#modalPersonaTitularForm').serialize(),
	  url: "/afiliacion/nueva_inscripcion_ajax",
	  type: "POST",
	  dataType: 'json',
	  success: function (data) {

		  $('#modalPersonaTitularForm #modalPersonaForm').trigger("reset");
		  $('#personaTitularModal').modal('hide');
		  $('#numero_documento_tit').val(data.numero_documento);
		  $('#nombre_titular').val(data.nombre_apellido);

		  alert("La persona ha sido ingresada correctamente!");


	  },
	  error: function(data) {
	mensaje = "Revisar el formulario:\n\n";
	$.each( data["responseJSON"].errors, function( key, value ) {
	  mensaje += value +"\n";
	});
	$("#modalPersonaTitularForm  #modalPersonaSaveBtn").html("Grabar");
	alert(mensaje);
  }
  });
});


function guardarAfiliacionEmpresa(){
    
    var msg = "";
    //var persona_id = $('#persona_id').val();
    var id_empresa = $('#id_empresa').val();
	//var plan_id = $('#plan_id').val();
	
    if(msg!=""){
        bootbox.alert(msg); 
        return false;
    }
    else{
        fn_save_afiliacion_empresa();
	}
	
}

function fn_save_afiliacion_empresa(){
    
	var id_persona = $('#id_persona').val();
	var id_plan = $('#id_plan').val();
	
    $.ajax({
			url: "/afiliacion/send_afiliacion_empresa",
            type: "POST",
            data : $("#frmEmpresa").serialize()+"&id_persona="+id_persona,
            success: function (result) {
					obtenerPlanDetalle(id_plan);
            }
    });
}

