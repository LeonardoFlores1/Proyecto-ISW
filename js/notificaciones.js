// ids: lista_solicitudes_compras, lista_solicitudes_intercambio, 
//btn_guardar_intercambio
//libros_comprador

function cargar_solicitudes_compras() {
	var datos = {
		id_libro:"nada"
	};
	$.ajax({
	    type: "POST",
	    url: "php_ajax/cargar_solicitudes_compras_n.php",
	    data: datos,	    
	})
	    .done(function(res){
			$('#lista_solicitudes_compras').html(res);	    	        
	    })
	    .fail(function() {
	           alertify.error("No se pudo obtener informacion.");
	    });
}

function cargar_solicitudes_intercambio() {
	var datos = {
		id_libro:"nada"
	};
	$.ajax({
	    type: "POST",
	    url: "php_ajax/cargar_solicitudes_intercambio_n.php",
	    data: datos,	    
	})
	    .done(function(res){
			$('#lista_solicitudes_intercambio').html(res);	    	        
	    })
	    .fail(function() {
	           alertify.error("No se pudo obtener informacion.");
	    });
}

function cargar_libros_comprador() {
	var id_intercambio= $('#lista_solicitudes_intercambio').val();
	if (id_intercambio>0) {
		var id_comprador=0;
		//select
		var lista= document.getElementById('lista_solicitudes_intercambio');
		//opteniendo el option seleccionado
		var item = lista.options[lista.selectedIndex];
		//opteniendo atributo del option
		id_comprador= item.getAttribute("id_comprador");
		var datos = {
			id_comprador:String(id_comprador)
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/cargar_libros_comprador.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	$('#libros_comprador').html(res);				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo guardar la informacion de la solicitud.");
		    });
	} 
}

function cargar_usuario(id_user) {
	if (id_user>0) {		
		var datos = {
			id_user:String(id_user)
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/cargar_informacion_usuario.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	$('#caja_usuario').html(res);				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo guardar la informacion de la solicitud.");
		    });
	}
}

//funciones que se ejecutaran al cargar la pagina
$(document).ready(function() {
  	cargar_solicitudes_compras();
  	cargar_solicitudes_intercambio();
});

$('#btn_cancelar_compra').click(function () {
	var id_l= $('#lista_solicitudes_compras').val();
	if (id_l>0) {
		var datos = {
			id_venta:String(id_l)
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/eliminar_solicitud_compra.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	if (res) {
		    		//$('#frmAgregarCompra').modal('hide');
		    		alertify.success("Solicitud eliminada :)");
		    		cargar_solicitudes_compras();	
		    	} else {
		    		alertify.error("No se elimino la solicitud");	
		    	}
				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo eliminar la solicitud.");
		    });
	} else {
		alertify.error("Debe seleccionar una solicitud antes de eliminar");
	}
});


$('#btn_confirmar_compra').click(function () {
	var id_v= $('#lista_solicitudes_compras').val();
	var id_l=0;
	if (id_v>0) {
		//select
		var lista= document.getElementById('lista_solicitudes_compras');
		//opteniendo el option seleccionado
		var item = lista.options[lista.selectedIndex];
		//opteniendo atributo del option
		id_l= item.getAttribute("id_libro");
		console.log(id_l);
		var datos = {
			id_venta:String(id_v),
			id_libro:String(id_l) 
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/confirmar_solicitud_compra.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	if (res) {
		    		//$('#frmAgregarCompra').modal('hide');
		    		alertify.success("Solicitud Confirmada :)");
		    		cargar_solicitudes_compras();
		    		cargar_solicitudes_intercambio();	
		    	} else {
		    		alertify.error("No se confirmo la solicitud");	
		    	}
				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo confirmar la solicitud.");
		    });
	} else {
		alertify.error("Debe seleccionar una solicitud antes de confirmar");
	}
});


$('#btn_cancelar_intercambio').click(function () {
	var id_l= $('#lista_solicitudes_intercambio').val();
	if (id_l>0) {
		var datos = {
			id_venta:String(id_l)
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/eliminar_solicitud_intercambio.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	if (res) {
		    		//$('#frmAgregarCompra').modal('hide');
		    		alertify.success("Solicitud eliminada :)");
		    		cargar_solicitudes_intercambio();	
		    	} else {
		    		alertify.error("No se elimino la solicitud");	
		    	}
				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo eliminar la solicitud.");
		    });
	} else {
		alertify.error("Debe seleccionar una solicitud antes de eliminar");
	}	
});

$("#lista_solicitudes_intercambio").change(function () {
	cargar_libros_comprador();
});

//AGREGAR INTERCAMBIO
$('#btn_guardar_intercambio').click(function () {
	var id_v= $('#lista_solicitudes_intercambio').val();
	var id_l_c= $('#libros_comprador').val();
	var id_l=0;	

	if (id_v>0 && id_l_c>0) {
		//select
		var lista= document.getElementById('lista_solicitudes_intercambio');
		//opteniendo el option seleccionado
		var item = lista.options[lista.selectedIndex];
		//opteniendo atributo del option
		id_l= item.getAttribute("id_libro");	
		

		console.log(id_l);
		var datos = {
			id_venta:String(id_v),
			id_libro_comprador:String(id_l_c),
			id_libro:String(id_l) 
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/confirmar_solicitud_intercambio.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	alertify.success("Solicitud Confirmada :)");
		    	cargar_solicitudes_intercambio();
		    	cargar_solicitudes_compras();
		    	cargar_libros_comprador();
		    	$('#frmAgregarCompra').modal('hide');		    					    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo confirmar la solicitud.");
		    });
	} else {
		alertify.error("Debe seleccionar una solicitud y un libro antes de confirmar");
	}
});

$("#lista_solicitudes_intercambio").change(function () {
	var id_comprador=0;
	//select
	var lista= document.getElementById('lista_solicitudes_intercambio');
	//opteniendo el option seleccionado
	var item = lista.options[lista.selectedIndex];
	//opteniendo atributo del option
	id_comprador= item.getAttribute("id_comprador");
	cargar_usuario(id_comprador);
});

$("#lista_solicitudes_compras").change(function () {
	var id_comprador=0;
	//select
	var lista= document.getElementById('lista_solicitudes_compras');
	//opteniendo el option seleccionado
	var item = lista.options[lista.selectedIndex];
	//opteniendo atributo del option
	id_comprador= item.getAttribute("id_comprador");
	cargar_usuario(id_comprador);
});