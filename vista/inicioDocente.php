<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:../indexDocente.php');}

?>
<style>
    ul li:nth-child(1) .activo{
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
        <title>ASISTENCIA DE ESTUDIANTES</title>

<?php require('./layout/topbarDocente.php'); ?>
<?php require('./layout/sidebarDocente.php'); ?>


<div class="page-content">

    <h4 class="text-center text-secondary">ASISTENCIAS</h4>
    
    <?php
    include "../modelo/conexion.php";
    include "../controlador/eliminar_asistencia.php";
    
    $sql=$conexion->query(" SELECT
    asistencia.id_asistencia,
    asistencia.id_estudiante,
    asistencia.entrada,
    estudiante.id_estudiante,
    estudiante.nomEst,
    estudiante.apellido,
    estudiante.ci,
    estudiante.curso,
    curso.id_curso,
    curso.nombreCurso
    FROM
    asistencia
    INNER JOIN estudiante ON asistencia.id_estudiante = estudiante.id_estudiante
    INNER JOIN curso ON estudiante.curso = curso.id_curso ");
    
    ?>




    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">CARNET</th>
            <th scope="col">CURSO</th>
            <th scope="col">INGRESO</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->id_asistencia ?></td>
                    <td><?= strtoupper($datos->nomEst. " ".$datos->apellido)?></td>
                    <td><?= $datos->ci ?></td>
                    <td><?= strtoupper($datos->nombreCurso)?></td>
                    <td><?= $datos->entrada ?></td>
                    <td>
                        <a href="inicio.php?id=<?= $datos->id_asistencia?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
            <?php }
            ?>
            
        </tbody>
    </table>




    
</div>
</div>

<?php require('./layout/footer.php'); ?>