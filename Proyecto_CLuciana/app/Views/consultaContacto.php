<style>
  .line {
    border-bottom: 5px solid black;
    margin: 10px 0;
  }

  @media (max-width: 768px) {
    img.card-img-top {
      width: 40%;
    }
    h1.text-center {
      font-size: 25px;
    }
    div[style^="margin-left"] {
      margin-left: 600px;
      }
    div[style^="margin-right"] {
      margin-right: 600px;
      }
    button.btn-primary {
      margin-bottom: 50px;
    }
  }

  .success {
    color: green;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
  }
</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div style="background-color: #F6F6F6;">

  <div class="row justify-content-center text-center">
    <p class="Contacto" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Completa los siguientes datos y responderemos su consulta lo más pronto posible </small></p>
    <h1 class="Contacto" style="font-size: 40px; font-weight: bold; margin-top: -10px">Habla con nosotros</h1>
  </div>
  
  <?php echo form_open('registrarConsulta') ?>
  <?php echo "<div class='line'></div>"; ?>

  <div class="container"> 

    <!--NOMBRE-->
    <div class= "form-group">
      <div class="success">
        <p class="is-succes"> <?= session()->getFlashdata('success')?></p>
      </div>
      <label for="nombre"><h4>Tus datos</h4></label>
      <h5 for="nombre" class="form-label">Nombre:</h5>
      <div class="row">
        <div class="col">

          <?php echo form_input([
            'name' => 'nombre',
            'id' => 'nombre',
            'class' => 'form-control',
            'placeholder' => 'Tu nombre y apellido',
            'value' =>old('nombre')]); 
          ?>
          <div class="error">
            <p class="is danger"><?=session('errors.nombre')?></p>
          </div>
        </div>

        <div class="col align-self-end">
          <?php echo form_input([
            'name' => 'email',
            'id' => 'email',
            'class' => 'form-control',
            'placeholder' => 'Tu correo electronico',
            'value' =>old('email')]); 
          ?>
          <div class="error">
            <p class="is danger"><?=session('errors.email')?></p>
          </div>
        </div>
        
      </div>
    </div>
    
    <!--ASUNTO-->
    <div class="form-group">
      <label for="nombre"><h5>Asunto</h5></label>
      <?php echo form_input([
        'name' => 'asunto',
        'id' => 'asunto',
        'class' => 'form-control',
        'placeholder' => 'Problemas con mi pedido',
        'value' =>old('asunto')]);  
      ?>
      <div class="error">
        <p class="is danger"><?=session('errors.asunto')?></p>
      </div>
    </div>

    <!--CONSULTA -->
      <div class="form-group">
        <label for="nombre"><h5>Consulta</h5></label>
        <?php echo form_textarea([
          'name' => 'consulta',
          'id' => 'consulta',
          'class' => 'form-control',
          'placeholder' => 'Cuentanos tu problema o consulta aqui',
          'style' => 'resize:none',
          'value' =>old('Escribe tu consulta aqui'),
          'row' => 5]);
        ?>
        <div class="error">
          <p class="is danger"><?=session('errors.consulta')?></p>
        </div>
      </div>
                
      <div class="container d-flex justify-content-center py-4">
        <button type="submit" class="mi-boton mt-1 btn btn-dark" style="margin-bottom: 100px"><h5>Enviar</h5></button>
      </div>
    </div>
  </div>
</div>

