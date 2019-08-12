<?php session_start();
    if(isset($_SESSION['user'])){
        header("Location:menu.php");
    }?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="img/icom-01.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/codigo.css">
    <title>Ingreso</title>
  </head>
  <body>
    
    <div class="modal-dialog modal-xl ">
        <div class="col-sm-12 main-section">
            <div class="modal-content">              
              <div class="row">
                <div class="col-md-6">
                  <img src="img/img-01.jpg" alt="fondo" width="100%">
                </div>
                <div class="col-md-6">                  
                  <h1 class="mt-5 text-center" id="titulo">
                    Sistema de Almacen
                  </h1>
                    <form class="col-md-12 mt-4" id="login-form">
                        <div class="form-group" id="usuario-grupo">
                          <label for="user">Usuario:</label>
                          <input type="text" class="form-control" placeholder="Nombre de Usuario" id="user" name="user"/>
                        </div>
                        <div class="form-group" id="contraseña-grupo">
                          <label for="pass">Contraseña:</label>
                          <input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass"/>
                        </div>
                        <button type="submit" class="btn btn-info mt-3 mb-3" >Ingresar</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<style>
.main-section{
  margin:0 auto;
  margin-top: 10%;
  padding: 0;
}

.modal-content{
  background-color: #B4C7CD ;
  opacity: .88  ;
  padding: 0 20px;
  box-shadow: 0px 0px 20px #B4C7CD;
}
.btn{
  background-color: rgb(68,182,133);*/
}

#titulo{
  font-size:45px;
  font-family: "Georgia", Times, serif;
  font-style:normal;
  color:rgb(68,182,133);
  font-weight: bold;
}
</style>
<!--JS-->
<script>
$(document).ready(function(){

  $('#login-form').submit(e => {
    var datos = $('#login-form').serialize();    
    e.preventDefault();
    $.ajax({
      url:'proc/validarIngreso.php',
      type:'POST',
      data:datos,
      success:function(e){
        console.log(e);
        if(e==1){
          $(location).attr('href','menu.php');
        }else{
          alert("Datos Incorrectos");
        }
      }
    });
  });

});
</script>