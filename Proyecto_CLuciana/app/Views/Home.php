<style>
  body {
    background-color: white;
  }

  h1, h2, h3 {
    margin-top: 80px;
  }

  .line {
    border-bottom: 5px solid black;
    margin: 10px 0;
  }

  #carouselExampleCaptions {
    margin-left: 50px;
    width: 100%;
    max-width: 100%;
  }

  .carousel-item img {
    max-width: 100%;
    height: auto;
  }

  /* responsive styles */
  @media screen and (max-width: 768px) {
    #carouselExampleCaptions {
      margin-left: 0;
      width: 100%;
      max-width: 100%;
    }
  }
</style>
<div class="container my-5">

  <!-- CARRUSEL -->
  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="assets/img/RC1.jpg" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 20px;">
          <h5 style="font-size: 40px;">Tu tiempo, siempre a la vista</h5>
          <p style="font-size: 20px;">Relojes inteligentes para personas inteligentes, que nunca se detienen.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/reloj6.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 20px;">
          <h5 style="font-size: 40px;">Nunca pierdas el tiempo bajo el agua</h5>
          <p style="font-size: 20px;">Con nuestros relojes, la tecnología está en tus manos, incluso cuando estás bajo el agua.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/img/reloj5.jpeg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block" style="background-color: rgba(0, 0, 0, 0.5); border-radius: 20px;">
          <h5 style="font-size: 40px;">Mucho más que solo la hora</h5>
          <p style="font-size: 20px;">Te traemos la última tecnología para que estes conectado con el mundo en tan solo una mirada</p>
        </div>
      </div>
    </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



<div class="container-fluid">
    <div class="row"> <!-- PRODUCTOS seccion NOVEDADES-->
        <div class="col-12">
            <h1>NOVEDADES</h1>
            <?php
                // Adding a line using PHP
                echo "<div class='line'></div>";
            ?>
        </div>

        <!-- CARTAS -->
        <div class="col-12">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <img src="assets/img/R1.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                        <div class="card-body">
                            <h5 class="card-title">Reloj Tissot Gent XL Classic</h5>
                            <p class="card-text">6 cuotas sin interés de $6.5784,20</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/R2.webp" class="card-img-top" alt="Reloj uno"/>
                        <div class="card-body">
                            <h5 class="card-title">Reloj Skagen SKW2343</h5>
                            <p class="card-text">8 cuotas sin interés de $3.5784,20</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/reloj7.webp" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                        <div class="card-body">
                            <h5 class="card-title">Reloj Swatch Guimauve</h5>
                            <p class="card-text">8 cuotas sin interés de $10.7368,99</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <img src="assets/img/reloj6.webp" class="card-img-top" alt="Skyscrapers"/>
                        <div class="card-body">
                            <h5 class="card-title">Reloj Skagen SKW2330</h5>
                            <p class="card-text">12 cuotas sin interés de $4.2784,20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="container"> <!-- PRODUCTOS seccion 2: SUPER OFERTAS-->
        <h1>SUPER OFERTAS</h1>
        <div class="line"></div>

        <!-- CARTAS -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card">
                    <img src="assets/img/R8.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                    <div class="card-body">
                        <h5 class="card-title">Reloj Fossil ES3845</h5>
                        <p class="card-text">12 cuotas sin interés de <s style="text-decoration: line-through; color:red"> <span style="color: red;">$7.199,58</span> </s> $6.5784,20</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="assets/img/R5.webp" class="card-img-top" alt="Reloj uno"/>
                    <div class="card-body">
                        <h5 class="card-title">Reloj Calvin Klein Enticing</h5>
                        <p class="card-text">12 cuotas sin interés de <s style="text-decoration: line-through; color:red"> <span style="color: red;">$7.191,25</span> </s> $5.5784,20</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="assets/img/R3.webp" class="card-img-top" alt="Los Angeles Skyscrapers"/>
                    <div class="card-body">
                        <h5 class="card-title">Smartwatch Garmin Vivomove White</h5>
                        <p class="card-text">6 cuotas sin interés de <s style="text-decoration: line-through; color:red"> <span style="color: red;">$6.5784,20</span> </s> $6.5784,20</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <img src="assets/img/R4.webp" class="card-img-top" alt="Skyscrapers"/>
                    <div class="card-body">
                        <h5 class="card-title">Reloj Swatch Blackway</h5>
                        <p class="card-text">6 cuotas sin interés de <s style="text-decoration: line-through; color:red"> <span style="color: red;">$6.5784,20</span> </s> $6.5784,20</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

        <div class="container">
            <div> <!-- PRODUCTOS seccion 3-->
                <h1> <span style="color: gray; font-family: 'Roboto', Helvetica;"> Te puede interesar</span></h1>

                <!-- TARJETA COLECCION 1-->
                <a href="#" style="display: inline-block; background-color: #F6F6F6; border: none; padding: 3px; text-align: center; text-decoration: none; font-size: 40px; font-family: 'Roboto', sans-serif;">
                    <div class="card mb-3" style="max-width: 1200px; border: none;">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <img src="assets/img/Mi proyecto.png" class="img-fluid rounded-start" alt="..." style="width: 60%; height: auto;">
                            </div>
                            <div class="col-lg-4">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size: 40px; margin-top: 100px;">HASTA 25% Y 6 CUOTAS SIN INTERÉS</h5>
                                    <p class="card-text" style="font-size: 24px;">APROVECHA LAS OFERTAS DEL VERANO!</p>
                                    <p class="card-text" style="font-size: 14px;"><small class="text-muted">Solo en productos seleccionados</small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>


