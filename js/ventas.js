cargar_libros();
$('#btn_guardar').click(function () {
	//comprobando q las imagenes existen y que los campos de texto no esten vacios
	var v_img = $('#archivo_01')[0].files[0] && $('#archivo_02')[0].files[0] && $('#archivo_03')[0].files[0];
	var v_otros = $('#nombre_libro').val()!="" && $('#no_edicion').val()!="" && $('#no_volumen').val()!="" && $('#nombre_autor').val()!="";

	if (v_img && v_otros) {
		var formData = new FormData(document.getElementById("formulario_venta"));
		//formData.append("dato", "valor");
		$.ajax({
		    url: "php_ajax/ventas_agregar_libro.php",
		    type: "post",
		    dataType: "html",
		    data: formData,
		    cache: false,
		    contentType: false,
		    processData: false
		})
		    .done(function(res){
		    	//console.log(res);
		    	//alertify.success(res);
		     	if(res==1){
		     		alertify.success("Libro ingresado exitosamente.");
		     		$('#frmAgregarLibro').modal('hide');
		     		cargar_libros();
				 }else{
				 	alertify.error("No se pudo insertar el libro.");
				 }		        
		    })
		    .fail(function() {
	            alertify.error("No se pudo  el libro.");
	        });
	} else {
		alertify.error("Debe llenar todos los campos de texto y subir las tres imagenes.");			
	}
});

function cargar_libros(){
	var conexion;
	if (window.XMLHttpRequest) {				
		conexion= new XMLHttpRequest();
	}else{				
		conexion= new ActiveXObject("Microsoft.XMLHTTP");	
	}
	conexion.onreadystatechange=function(){
		if (conexion.readyState==4 && conexion.status==200) {
			document.getElementById("Lista_libros").innerHTML = conexion.responseText;
		}
	}
	conexion.open("POST", "php_ajax/CargarLibros.php", true);
   	conexion.send();
}

function eliminar_libro() {
	var idLibro = document.getElementById("Lista_libros").value;
	if (idLibro) {
		var parametros = "id_libro=" + idLibro;			
		var conexion4;
		if (window.XMLHttpRequest) {				
			conexion4= new XMLHttpRequest();
		}else{				
			conexion4= new ActiveXObject("Microsoft.XMLHTTP");	
		}
		conexion4.onreadystatechange=function(){
			if (conexion4.readyState==4 && conexion4.status==200) {
				cargar_libros();
				console.log(conexion4.responseText);
				alertify.success("Se ha eliminado el libro.");
			}
		}		
		conexion4.open("POST", "php_ajax/EliminarLibro.php", true);
		conexion4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		conexion4.send( parametros );
	}else{
		alertify.error("Debe seleccionar el libro que desea eliminar.");
	}	
}

function mostrar_libro() {
	var idLibro = document.getElementById("Lista_libros").value;
	if (idLibro) {
		//document.getElementById(img01).setAttribute("src", )
		var parametros = "id_libro=" + idLibro;			
		var conexion5;
		if (window.XMLHttpRequest) {				
			conexion5= new XMLHttpRequest();
		}else{				
			conexion5= new ActiveXObject("Microsoft.XMLHTTP");	
		}
		conexion5.onreadystatechange=function(){
			if (conexion5.readyState==4 && conexion5.status==200) {
				document.getElementById("ContenedorImagenes").innerHTML = conexion5.responseText;
				//document.getElementById("ContenedorImagenes").innerHTML = `<h1>hola mundo</h1>`;		
			}
		}		
		conexion5.open("POST", "php_ajax/MostrarLibro.php", true);
		conexion5.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		conexion5.send( parametros );
	}
}
