<!DOCTYPE html>

<html>
<head>
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
</head>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?=session('msg')?>
    <div style="margin-top: 100px;">
        <div class="container">
            <img src="assets/img/logo3.png" class="card-img-top mx-auto d-block" style="width: 20%;" alt="9oclock"/>
            <h1 class="text-center" style="font-size: 35px; margin-bottom: 50px;">Iniciar Sesion</h1>
        </div>
    </div>   

    <div class="line"></div>
    <?php echo form_open('inicioSesion') ?>
        <div style="margin-top: 30px;">
        <div class="container">    
            <form class="registro--form">
                <div class="form-group">
                    <label for="email">Correo Electronico</label>
                    <?php echo form_input([
                        'name' => 'email', 
                        'id' => 'email', 
                        'class' => 'form-control',
                        'value' => old('email'),
                        'placeholder' => 'Ingrese su correo']);
                    ?>
                    <div class="error">
                        <p class="text-danger"><?=session('errors.email')?></p>
                    </div> 
                </div>

                <div class="form-group">
                    <label for="contrasenia">Contraseña</label>
                    <?php echo form_input([
                        'name' => 'contrasenia', 
                        'id' => 'contrasenia', 
                        'class' => 'form-control',
                        'type' => 'password']);
                    ?>
                    <div class="error">
                        <p class="text-danger"><?=session('errors.contrasenia')?></p>
                    </div> 
                    <a href="https://mdbootstrap.com/">Olvide mi contraseña</a>
                </div>

                <div class="form-check">
                    <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3">
                    <h5 class="form-check-label text-muted" style="margin-top: 30px;" for="invalidCheck3">Recuerdame</h5>
                </div>
                
                <?php if (session()->getFlashdata('mensaje')): ?>
                <div style="margin-top:15px" class="alert alert-danger">
                    <?= session()->getFlashdata('mensaje') ?>
                </div>
                <?php endif; ?>

                <div class="text-center" style="margin-bottom: 100px;">
                    <button class="btn btn-outline-light btn-floating m-2" type="submit" style="background-color: #6D9886">Ingresar</button>
                </div>
            </form>
            <?php echo form_close(); ?>
        </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
