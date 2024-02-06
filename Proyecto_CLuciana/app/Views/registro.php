<meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    .form-check-input.is-invalid {
        border-color: black;
    }

    .form-check-input.is-invalid:checked {
        background-color: black;
        border-color: black;
    }

    .form-check-input.is-invalid:focus {
        box-shadow: none;
    }

    .form-check-label.text-muted {
        color: black;
    }
</style>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<?php echo form_open('registro_user') ?>
    <div style="margin-top: 100px;">
        <img src="assets/img/logo3.png" class="card-img-top mx-auto d-block" style="width: 10%;" alt="9oclock"/>   
        <h1 class="text-center" style="font-size: 35px; margin-bottom: 50px;">Registrarse</h1>

        <?php echo "<div class='line'></div>"; ?>
            <div class="container">  
                <!--Nombre-->
                <div class= "form-group">
                    <div class="row">
                        <label for="nombre"><h5>Nombre</h5></label>
                        <div class="col">
                            <?php echo form_input([
                                'name' => 'nombre',
                                'id' => 'nombre',
                                'class' => 'form-control',
                                'placeholder' => 'Nombre',
                                'value' =>old('nombre')]); 
                            ?>
                            <p class="is danger"><?=session('errors.nombre')?></p>
                        </div>
                        <div class="col">
                            <?php echo form_input([
                                'name' => 'apellido',
                                'id' => 'apellido',
                                'class' => 'form-control',
                                'placeholder' => 'Apellido',
                                'value' =>old('apellido')]);  
                            ?>
                            <p class="is danger"><?=session('errors.apellido')?></p>
                        </div>
                    </div>
                </div>

                <!--Correo-->
                <div class="form-group" style= "margin-top: 30px;">
                        <label for="correo"><h5>Correo</h5></label>
                        <?php echo form_input([
                            'name' => 'email',
                            'id' => 'email',
                            'class' => 'form-control',
                            'placeholder' => 'ejemplo@gmail.com',
                            'value' =>old('email')]);  
                        ?>
                        <p class="is danger"><?=session('errors.email')?></p>
                </div>
                
                <!--Usuario-->
                <div class="form-group" style= "margin-top: 30px;">
                        <label for="usuario"><h5>Usuario</h5></label>
                        <?php echo form_input([
                            'name' => 'usuario',
                            'id' => 'usuario',
                            'class' => 'form-control',
                            'placeholder' => 'Usuario123',
                            'value' =>old('usuario')]);  
                        ?>
                        <p class="is danger"><?=session('errors.usuario')?></p>
                </div> 

                <!--Contraseña-->
                <div class="form-group" style= "margin-top: 30px;">
                    <label for="contraseña"><h5>Contraseña</h5></label>
                    <?php echo form_input([
                            'name' => 'contrasenia',
                            'id' => 'contrasenia',
                            'class' => 'form-control',
                            'type' => 'password']);
                    ?>
                    <p class="is danger"><?=session('errors.contrasenia')?></p>
                    <h5 id="passwordHelpBlock" class="form-text text-muted">
                        La contraseña debe contener entre 6 a 20 carácteres
                    </h5>

                    <label for="contraseña repetir" style= "margin-top: 30px;"><h5>Repetir contraseña</h5></label>
                    <?php echo form_input([
                            'name' => 're-contrasenia',
                            'id' => 're-contrasenia',
                            'class' => 'form-control',
                            'type' => 'password']);
                    ?>
                    <p class="is danger"><?=session('errors.re-contrasenia')?></p>
                </div> 


                <!--Terminos y condiciones-->
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
                    <h5 class="form-check-label text-muted" for="invalidCheck3" style= "margin-top: 30px;">Acepta <a href="<?php echo base_url('terminosYUsos') ;?>">terminos y condiciones</a></h5>
                    <div class="invalid-feedback text-muted">
                        Debes aceptar para poder de continuar
                    </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3">
                    <h5 class="form-check-label text-muted" for="invalidCheck3" style= "margin-top: 30px;">Deseo recibir novedades de nuevos productos y promociones</h5>
                    </div>
                </div>
                
                <div class="container d-flex justify-content-center py-3">
                    <?php echo form_submit('Crear cuenta', 'Crear cuenta', "class='btn btn-dark'"); ?>
                </div>

            </div>
        </div>
    </div>
<?php echo form_close();?>