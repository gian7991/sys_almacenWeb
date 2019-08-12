<nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="menu.php"><i class="fas fa-box-open"></i> Sistema Almacen</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav"> 
                    
            <li class="nav-item">
              <a class="opt nav-link" href="productos.php">Productos <span class="sr-only">(current)</span></a>
            </li>                        
            <li class="nav-item">
              <a class="opt nav-link" href="control&reporte.php" >Control y Reportes</a>
            </li>
            <li class="nav-item">
              <a class="opt nav-link" href="acerca.php" >Acerca de..</a>
            </li>
            <li class="nav-item">
              <b class="nav-link" href="acerca.php" ><i class="far fa-user"></i> <?php echo($_SESSION['user']); ?></b>
            </li>   
            <li class="nav-item active">
              <a class="nav-link" href="proc/closeSession.php" style="color:#C0392B;"><i class="fas fa-sign-out-alt"></i> Salir</a>
            </li>
        </ul>               
    </div>
  </nav>