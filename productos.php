<?php
  include("proc/session.php")
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="img/icom-01.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    
	<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
	<link rel="stylesheet" href="css/codigo.css">
    <title>Productos</title>
  </head>
  <body>
	<?php include("nav.php") ?>
	<!--Fin navbar-->
	<div class="container">
	<div class="card mt-5" >
		<div class="card-header">Registro de Productos:</div>
		<div class="row card-body">
			<div class="col-md-4 mb-5">				

				<form class="mt-3" id="add-form">
					<div class="form-group row">
						<label for="txtNombre" class="col-sm-4 col-form-label col-form-label-sm">Nombre:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" placeholder="Nombre" id="txtNombre" name="txtNombre">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtCantidad" class="col-sm-4 col-form-label col-form-label-sm">Cantidad:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" onkeypress='return validaNumericos(event)' placeholder="Cantidad" id="txtCantidad" name="txtCantidad">
						</div>
					</div>
					<!--COMBO-->
					<div class="form-group row">
						<label for="cbxMedida" class="col-sm-4 col-form-label col-form-label-sm">Medidad:</label>
						<div class="col-sm-8 input-group">
							<select name="cbxMedida" id="cbxMedida" class="custom-select ">
								<!--cargando com AJAX-->
							</select> 
							<div class="input-group-append"> 
								<button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#addMedidaModal"><i class='fas fa-plus'></i></button>
							</div>
						</div>											
					</div>
					<div class="form-group row">
						<label for="txtPrecio" class="col-sm-4 col-form-label col-form-label-sm">Precio/Unidad:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" onkeypress='return validaNumericos(event)' placeholder="S/." id="txtPrecio" name="txtPrecio">
						</div>
					</div>											
					<div class="form-group row">
						<label for="txtPresentacion" class="col-sm-4 col-form-label col-form-label-sm">Presentacion:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" placeholder="Descripcion" id="txtPresentacion" name="txtPresentacion">
						</div>
					</div>
					<div class="form-group row">
						<label for="dtCaducidad" class="col-sm-4 col-form-label col-form-label-sm">F Caducidad:</label>
						<div class="col-sm-8">
							<input type="date" class="form-control form-control-sm" id="dtCaducidad" name="dtCaducidad">
						</div>
					</div>															
					<div class="form-group row">
						<button type="submit" class="col-sm-12 btn btn-info">Agregar</button>												
					</div>
				</form>

			</div>

			<div class="col-md-8">
				<table class="table table-sm table-hover table-responsive">
					<thead class="thead-light">
						<tr>
							<th>Nombre</th>
							<th>cantidad</th>
							<th>precio</th>
							<th>Presentacion</th>
							<th>Medida</th>							
							<th>Registro</th>
							<th>Caducidad</th>							
							<th>Editar</th>
							<th>Eliminar</th>							
						</tr>
					</thead>						
					<tbody id="lstProductos">
						<!--cargando com AJAX-->
					</tbody>
				</table>
			</div>

		</div>
	</div>
	</div>
	<!-- Modals -->
	<!-- Modals -->
	<div class="modal fade" id="addMedidaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar Medida</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmAgregarMedida">
					<div class="form-group row">
						<label for="txtMedida" class="col-sm-4 col-form-label col-form-label-sm">Nombre:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" placeholder="Medida" id="txtMedida" name="txtMedida">
						</div>
					</div>
					<div class="form-group row">
						<label for="txtUnidadMetrica" class="col-sm-4 col-form-label col-form-label-sm">Unidad Metrica:</label>
						<div class="col-sm-8">
							<input type="text" class="form-control form-control-sm" placeholder="Unidad Metrica" id="txtUnidadMetrica" name="txtUnidadMetrica">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btnModalMedidaCerrar" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btnAgregarMedida">Guardar</button>
			</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editarProductoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<form id="frm-editar">
						<div class="form-group row">
							<label class="col-sm-3 col-form-label col-form-label-sm">Nombre:</label>								
							<div class="col-md-4">
								<h6 id="lblEditarNombre"></h6>
							</div>
						</div>
						<div class="form-group row">
							<label for="txtEditarCantidad" class="col-sm-3 col-form-label col-form-label-sm">Cantidad:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control form-control-sm" onkeypress='return validaNumericos(event)' placeholder="Cantidad" id="txtEditarCantidad" name="txtEditarCantidad">
							</div>
						</div>
						<div class="form-group row">
							<label for="txtEditarPrecio" class="col-sm-3 col-form-label col-form-label-sm">Precio:</label>
							<div class="col-sm-4">
								<input type="text" class="form-control form-control-sm" onkeypress='return validaNumericos(event)' placeholder="Precio" id="txtEditarPrecio" name="txtEditarPrecio">
							</div>
						</div>
						<div class="form-group row">
							<label for="dtEditarCaducidad" class="col-sm-3 col-form-label col-form-label-sm">F Caducidad:</label>
							<div class="col-sm-4">
								<input type="date" class="form-control form-control-sm" id="dtEditarCaducidad" name="dtEditarCaducidad">
							</div>
						</div>	
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="btnModalEditarCerrar" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-success" id="btnModalEditar">Guardar</button>
			</div>
			</div>
		</div>
	</div>	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script  src="https://code.jquery.com/jquery-3.4.1.js"  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script type="text/javascript">
function validaNumericos(event) {		
    if((event.charCode >= 48 && event.charCode <= 57) || event.charCode == 46 || event.charCode == 44){
      return true;
     }
     return false;        
}

$(document).ready(function(){
	var idProducto=0;
	cargarTabla();
	cargarMedidas();

	function cargarTabla(){
		$.ajax({
			url: 'proc/cargarProductos.php',
			type: 'GET',
			success: function(response) {				
				const tasks = JSON.parse(response);
				let template = '';
				tasks.forEach(task => {					
				template += `
						<tr taskId="${task.id}">							
							<td>${task.nombre}</td>
							<td>${task.cantidad}</td>
							<td>${task.precio}</td>
							<td>${task.presentacion}</td>
							<td>${task.unidad}</td>
							<td>${task.f_registro}</td>
							<td>${task.f_caducidad}</td>
							<td><button class="btnEditar btn btn-outline-success" data-toggle="modal" data-target="#editarProductoModal"><i class="fas fa-pencil-alt"></i></button></td>
							<td><button class="btnEliminar btn btn-outline-danger"><i class="fas fa-trash-alt"></i></button></td>
						</tr>
						`;
				});
				$('#lstProductos').html(template);
			}
		});		
	}	
	function cargarMedidas(){
		$.ajax({
			url:'proc/cargarMedidas.php',
			type:'GET',
			success:function(response){
				const medidas=JSON.parse(response);
				let template='<option value="0">Seleccione...</option>';
				medidas.forEach(medida=>{
					template+=`
						<option value="${medida.id}">${medida.abreviatura}</option>						
					`;
				});
				$('#cbxMedida').html(template);
			}
		});	
	}

	function validacion(){
		var campo_nombre = $("#txtNombre").val().trim();
		var campo_email = $("#txtCantidad").val().trim();
		var campo_contraseña = $("#txtPrecio").val().trim();
		var campo_medida = $("#cbxMedida").val();
		var campo_rep_contraseña = $("#txtPresentacion").val().trim();
		var campo_caducidad = $("#dtCaducidad").val();
		//si esta vacio lanza error
		if (campo_nombre.length == 0 ||
		campo_email.length == 0 ||
		campo_contraseña.length == 0 ||
		campo_rep_contraseña.length == 0 ||
		campo_medida == 0 ||
		campo_caducidad.length == 0) {
			alert("No puede haber campos vacios");
			return false;
		}else
			return true;
	}
	
	$('#add-form').submit(e => {
		e.preventDefault();
		if(validacion()){
			var datos = $('#add-form').serialize();
			$.ajax({
				url:'proc/addProducto.php',
				type:'POST',
				data:datos,
				success:function(response){
					$('#add-form').trigger('reset');
					cargarTabla();
				}
			});
		}
	});

	$(document).on('click', '.btnEliminar', (e) => {
    if(confirm('Estas seguro de Eliminar este Producto?')) {
		const element = $(this)[0].activeElement.parentElement.parentElement;
      	const id = $(element).attr('taskId');
      	$.post('proc/deleteProducto.php', {id},(response) => {
			cargarTabla();
      });
    }
  });

  $(document).on('click', '.btnEditar', (e) => {
		const element = $(this)[0].activeElement.parentElement.parentElement;
		const id = $(element).attr('taskId');
		$.post("proc/searchProducto.php",{id},(response)=>{
			const data=JSON.parse(response);			
			data.forEach(producto=>{	
				$("#lblEditarNombre").html(producto.nombre);			
				$("#txtEditarCantidad").val(producto.cantidad);
				$("#txtEditarPrecio").val(producto.precio);	
				$("#dtEditarCaducidad").val(producto.f_caducidad);								
			});			
		});		
		idProducto=id;
  });

  $('#btnModalEditar').click(function(){
	  let datos=$('#frm-editar').serialize();
	  datos+=("&id="+idProducto);
	  $.post("proc/editProducto.php",datos,(response)=>{
		if(response==1){
			cargarTabla();
			$("#btnModalEditarCerrar").click();
		}else{
			console.log(response);
		}
	  });	  
  });

  $('#btnAgregarMedida').click(function(){
	  var datos=$('#frmAgregarMedida').serialize();	  
	  $.post("proc/addMedida.php",datos,function(response){
		  if(response==1){
			cargarMedidas();
			$('#frmAgregarMedida').trigger('reset');
		  }
		  
	  });
	$('#btnModalMedidaCerrar').click();
  });
});
</script>