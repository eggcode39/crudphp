<?php
/**
 * Created by PhpStorm.
 * User: Franz
 * Date: 15/04/2019
 * Time: 12:43
 */
?>

<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo _SERVER_;?>styles/bootstrap.min.css" >

    <title>CRUD Simple</title>
</head>
<body>
<div class="container">
    <!-- /.row -->
    <!-- Main row -->
    <br>
    <div class="row">
        <div class="col-lg-12">
            <h4 class="header-title">Lista de Personas</h4>
        </div>
    </div>
    <br>
    <!-- /.row (main row) -->
    <div class="row">
        <div class="col-lg-12">
            <table id="example2" class="table table-bordered table-hover">
                <thead class="text-capitalize">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($person as $m){
                    ?>
                    <tr>
                        <td><?php echo $m->id_person?></td>
                        <td><?php echo $m->person_name?></td>
                        <td><?php echo $m->person_surname?></td>
                        <td><a type="button" class="btn btn-xs btn-danger" onclick="deleter(<?php echo $m->id_person;?>)">Eliminar</a></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h4 class="header-title">Agregar Otra Persona</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-form-label">Nombre</label>
                            <input class="form-control" type="text" id="person_name" placeholder="Ingresar Nombre">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Apellido</label>
                            <input class="form-control" type="text" id="person_surname" placeholder="Ingresar Apellido">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" onclick="save()"> Agregar Persona</button>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>
            </div>
            <!-- /.box -->



        </div>
    </div>

</div>

<script src="<?php echo _SERVER_;?>styles/jquery-2.min.js" ></script>
<script src="<?php echo _SERVER_;?>js/index.js" ></script>
</body>
</html>