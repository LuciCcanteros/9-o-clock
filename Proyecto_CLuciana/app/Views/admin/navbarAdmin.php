
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #6D9886; color: #DCD7C9; padding: 0.0005rem -100rem;">
  <div class="container">
  <img src="assets/img/logo3.png" height="40">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url('homeAdmin');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('listarConsultas') ;?>">Ver consultas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('agregarProducto') ;?>">Agregar Producto</a>
        </li>

        <!-- DROPDOWN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Ventas</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="<?php echo base_url('gestionar');?>">Ver todos los productos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('verVentas');?>">Ver todas las ventas</a></li>
          </ul>
        </li>

        <li class="nav-item"> 
          <a class="nav-link" href="<?php echo base_url('cerrarSesion') ;?>">Salir</a>
        </li>
        
      </ul>
    </div>
  </div>

  <style>
    .navbar-nav .nav-link:hover {
      color: #DCD7C9;
    }

    .nav-link {
      font-family: Segoe UI, Segoe UI;
    }
  </style>

</nav>






