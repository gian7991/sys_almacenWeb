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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/codigo.css">
	<title>Control y Reportes</title>
  </head>
  <body>
  	<?php include("nav.php") ?>
	<!--Fin navbar-->

	<div class="container mt-5">

		<div class="card card-default">
			<div class="card-header">Reportes de Articulos</div>
			<div class="card-body">
				<div class="container">
					<form id="frm-filtro" method="post" action="proc/reportes/excel.php">
						<div class="row ">
							<div class="col-md-4 form-group row">
								<label for="txtCodigo" class="col-sm-4 col-form-label">F Inicial:</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="dtCaducidad" name="dtCaducidad">
								</div>
							</div>
							<div class="col-md-4 form-group row">
								<label for="txtNombre" class="col-sm-4 col-form-label">F Final:</label>
								<div class="col-sm-8">
									<input type="date" class="form-control" id="dtCaducidad" name="dtCaducidad">
								</div>
							</div>
							<div class="col-md-4 form-group row">
								<div class="col-md-6"><button class="btn btn-info">Buscar</button></div>
								<div class="col-md-6 d-flex justify-content-end "><button class="btn btn-outline-info ">Mostrar Todos</button></div>														
							</div>
						</div>
					</form>
				</div>
				<hr/>
				<div class="container">
					<table class="table table-responsive">
						<thead class="thead-light">
							<tr>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Cantidad</th>
								<th>Precio</th>
								<th>Presentacion</th>
								<th>Medida</th>
								<th>F Registro</th>
								<th>F Caducidad</th>
								<th>Usuario</th>
							</tr>
						</thead>
						<tbody id="lstProductos">
							<!--Ajax-->
						</tbody>
					</table>
				</div>	
				<hr>
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<button class="btnPdf col-md-12 btn btn-danger mt-2">Guardar Pdf <i class="far fa-file-pdf"></i></button>
						</div>
						<div class="col-md-6">
							<button class="col-md-12 btn btn-success mt-2">Guardar Excel <i class="far fa-file-excel"></i></button>
						</div>
					</div>
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
$(document).ready(function(){
	cargarGrid();
	$(document).on('click', '.btnPdf', (e) => {
		var datos=$('#frm-filtro').serialize();
		$('#frm-filtro').submit();

		/*$.post("proc/reportes/excel.php",datos,function(response){
			console.log(response);
		});*/
	});

	function cargarGrid(){
		$.get("proc/cargarReporteGrid.php",function(response){
			console.log(response);
			const tasks = JSON.parse(response);
			let template = '';
			tasks.forEach(task => {				
				template += `
						<tr taskId="${task.id}">
							<td>${task.id}</td>
							<td>${task.nombre}</td>
							<td>${task.cantidad}</td>
							<td>${task.precio}</td>
							<td>${task.presentacion}</td>
							<td>${task.unidad}</td>
							<td>${task.f_registro}</td>
							<td>${task.f_caducidad}</td>
							<td>${task.usuario}</td>
						</tr>
						`;
			});
			$('#lstProductos').html(template);	
		});
	}

});
</script>