<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:../indexDocente.php');}

?>
<style>
    ul li:nth-child(2) .activo{
        background:rgb(11,150,214) !important;
    }
</style>

<!doctype html>
<html lang="es">

<head>

    <head lang="es">
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
        <meta content="ie=edge" http-equiv="x-ua-compatible">
        <title>ESTUDIANTES</title>

<?php require('./layout/topbarDocente.php'); ?>
<?php require('./layout/sidebarDocente.php'); ?>
<div class="page-content">

    <h4 class="text-center text-secondary">ESTUDIANTES</h4>
    
    <?php
    include "../modelo/conexion.php";
    include "../controlador/modificar_estudiante.php";
    include "../controlador/eliminar_estudiante.php";

    
    $sql=$conexion->query(" SELECT 
    estudiante.id_estudiante,
    estudiante.nomEst,
    estudiante.apellido,
    estudiante.ci,
    estudiante.curso,
    curso.nombreCurso
    FROM
    estudiante
    INNER JOIN curso ON estudiante.curso = curso.id_curso
     ");
    ?>


    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">CARNET DE IDENTIDAD</th>
            <th scope="col">CURSO</th>

            </tr>   
        </thead>
        <tbody>
            <?php
            while($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->id_estudiante?></td>
                    <td><?= strtoupper($datos->nomEst) ?></td>
                    <td><?= strtoupper($datos->apellido)?></td>
                    <td><?= $datos->ci?></td>
                    <td><?= strtoupper($datos->nombreCurso)?></td>
                </tr>
            <?php }
            ?>
            
        </tbody>
    </table>




    
</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>