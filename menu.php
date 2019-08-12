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
    <title>Menu</title>
  </head>
  <body>
  	<?php include("nav.php") ?>
	<!--Fin navbar-->

	<div class="container u_Items">
        <div class="row">
          <div class="col-md-4">
            <div class="container u_item">
              <a href="productos.php">
                <img src="img/menu-product.png" alt="Productos" class="mx-auto d-block">
                <h3 class="text-center">PRODUCTOS</h3>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="container u_item">
              <a href="control&reporte.php">
                <img src="img/menu-report.png" alt="Productos" class="mx-auto d-block">
                <h3 class="text-center stretched-link">REPORTES</h3>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="container u_item" id="a">
              <a href="acerca.php">
                <img src="img/menu-network.png" alt="Productos" class="mx-auto d-block">
                <h3 class="text-center">ACERCA DE</h3>
              </a>
            </div>
          </div>
        </div>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<style type="text/css">

.u_Items{
  margin-top:200px;
}
.u_item{
  background-color:#D0ECE7;
  border-radius:5px;
}
.u_item:hover{
  background-color:#73C6B6;
}
</style>
<script type="text/javascript">
$(document).ready(function(){

});
</script>