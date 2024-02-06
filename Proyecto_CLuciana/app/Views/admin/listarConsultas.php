<style>
.line {
        border-bottom: 5px solid black;
        margin: 10px 0;
    }
</style>

<!-- LISTA PRODUCTOS-->
<div style="background-color: #F6F6F6;">
    <div style="margin-left: 0%">
        <div class="row justify-content-center text-center">
            <p class="Contacto" style="font-size: 20px; color: #6D9886; margin-top: 100px;"><small class="text-muted">Visualiza las consultas de tus clientes desde aqui</small></p>
            <h1 class="Contacto" style="font-size: 40px; font-weight: bold; margin-top: -10px">Tus consultas</h1>
            <div style="padding: 20px;">
                <?php $ConsultaModel = model('ConsultaModel');
                $consultas= $ConsultaModel->obtenerConsulta();
                ?>

                <?php echo "<div class='line'></div>"; ?>
                <?php if ($consultas == NULL) : ?>
                    <div style="display: flex; justify-content: center; align-items: center;">

                        <div style="padding: 20px;">
                            <h1 style="font-size: 40px; font-weight: bold; margin: 0;">No tienes consultas</h1>
                            <p style="font-size: 20px; color: #6D9886; margin-top: 10px;"><small class="text-muted">Una vez que recibas consultas apareceran aqui</small></p>
                        </div>

                        <div style="padding: 100px;">
                            <img src="assets/img/message.gif" style="max-width: 100%; width: 200px;">
                        </div>
                    </div>
                <?php else : ?>

                    <div class="container">

                        <table id="mytable" class="table table-bordred">
                            <thead>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Asunto</th>
                                <th>Consulta</th>
                                <th></th>
                            </thead>

                            <tbody>
                                <?php foreach ($consultas as $row){ ?>
                                <tr>
                                    <td> <?php echo $row['nombre'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['asunto'];?></td>
                                    <td><?php echo $row['consulta'];?></td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>