
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
          <a class="nav-link" href="<?php echo base_url('/');?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('catalogoProductos');?>">Productos</a>
        </li>

        <!-- DROPDOWN -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Más sobre Nosotros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="<?php echo base_url('metodosDePago');?>">Métodos de pago y envíos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('somos');?>">Quienes Somos</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('terminosYUsos');?>">Términos y Usos</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('contactanos');?>">Contactanos</a></li>
          </ul>
        </li>
        
        <!-- USUARIO -->
        <?php If (session('login')) { ?>
        <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('verCarrito');?>">
        <svg sz width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"></path>
        </svg> Carrito </a>

        </li>
        <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/');?>"><?php echo session('usuario');?></a>
        </li>

        <li class="nav-item"> 
          <a class="nav-link" href="<?php echo base_url('cerrarSesion') ;?>">Salir</a>
        </li>
          
        <!-- DEFAULT -->
        <?php } else { ?>
          </li class="nav-item"> 
            <a class="nav-link" href="<?php echo base_url('registro_user') ;?>">Registrarse</a>
          </li>

          </li class="nav-item"> 
            <a class="nav-link" href="<?php echo base_url('inicioSesion') ;?>">Iniciar Sesion</a>
          </li>
        <?php } ?>


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






