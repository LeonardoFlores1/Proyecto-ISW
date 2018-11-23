
function cargar_libros_filtrados() {
	var formData = new FormData(document.getElementById("frm_filtrado"));
	//formData.append("dato", "valor");
	$.ajax({
	    url: "php_ajax/cargar_libros_filtrados_int.php",
	    type: "post",
	    dataType: "html",
	    data: formData,
	    cache: false,
	    contentType: false,
	    processData: false
	})
	    .done(function(res){
			$('#lista_libros_disponibles').html(res);
			//console.log(res);		    	        
	    })
	    .fail(function() {
	           alertify.error("No se pudo obtener libros.");
	    });
}

function cargar_solicitudes() {
	var datos = {
		id_libro:"nada"
	};
	$.ajax({
	    type: "POST",
	    url: "php_ajax/cargar_solicitudes_intercambio.php",
	    data: datos,	    
	})
	    .done(function(res){
			$('#lista_solicitudes').html(res);	    	        
	    })
	    .fail(function() {
	           alertify.error("No se pudo obtener informacion.");
	    });
}

//funciones que se ejecutaran al cargar la pagina
$(document).ready(function() {
  	cargar_libros_filtrados();
  	cargar_solicitudes();
});
//Filtrado de informacion
$('#btn_filtrado').click(function () {
	cargar_libros_filtrados();	
});

//mostrar detalles al cambiar el select de los libros disponibles
$('#lista_libros_disponibles').change(function () {		
	var datos = {
		id_libro:String($(this).val())
	};
	$.ajax({
	    type: "POST",
	    url: "php_ajax/MostrarLibroCompras.php",
	    data: datos,	    
	})
	    .done(function(res){
			$('#ContenedorImagenesCompras').html(res);	    	        
	    })
	    .fail(function() {
	           alertify.error("No se pudo obtener informacion del libro.");
	    });
});

//guardar solicitud de compra en la base de datos
$('#btn_guardar_solicitud').click(function () {
	var id_l= $('#lista_libros_disponibles').val();
	if (id_l>0) {
		var datos = {
			id_libro:String(id_l),
			lugar:String($('#lugar').val())
		};
		$.ajax({
		    type: "POST",
		    url: "php_ajax/agregar_solicitud_intercambio.php",
		    data: datos,	    
		})
		    .done(function(res){
		    	if (res) {
		    		$('#frmAgregarCompra').modal('hide');
		    		alertify.success("Solicitud enviada :)");
		    		cargar_solicitudes();	
		    	} else {
		    		alertify.error("No se ingreso la solicitud");	
		    	}
				    	        
		    })
		    .fail(function() {
		           alertify.error("No se pudo guardar la informacion de la solicitud.");
		    });
	} else {
		alertify.error("Debe seleccionar un libro disponible antes de enviar la solicitud");
	}	
});

$('#btn_eliminar_solicitud').click(function () {
	var id_l= $('#lista_solicitudes').val();
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
		    		cargar_solicitudes();	
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

