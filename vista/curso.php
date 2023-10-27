<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:../index.php');}

?>
<style>
    ul li:nth-child(5) .activo{
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
        <title>CURSOS</title>

<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

    <h4 class="text-center text-secondary">CURSOS</h4>
    
    <?php
    include "../modelo/conexion.php";
    include "../controlador/modificar_curso.php";
    include "../controlador/eliminar_curso.php";
    $sql=$conexion->query(" SELECT * from curso ");
    ?>


    <a href="registro_curso.php" class="btn btn-primary btn-rounded mb-3"><i class="fa-solid fa-plus"></i> &nbsp;Agregar</a>

    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->id_curso?></td>
                    <td><?= strtoupper($datos->nombreCurso)?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_curso ?>"  class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square "></i></a>
                        <a href="curso.php?id=<?= $datos->id_curso?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $datos->id_curso ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h5 class="modal-title w-100" id="exampleModalLabel" >EDITAR CURSO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div hidden class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Id" class="input input__text" name="txtid" value="<?= $datos->id_curso ?>">
                                </div>
                                <div class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Nombre" class="input input__text" name="txtNombre" value="<?= $datos->nombreCurso ?>">
                                </div>
                                <div class="text-center p-2">
                                    <a href="curso.php" class="btn btn-secondary btn-rounded">CANCELAR</a>
                                    <button type="submit" value="ok" name="btneditar" class = "btn btn-primary btn-rounded">GUARDAR CAMBIOS</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>
            <?php }
            ?>
            
        </tbody>
    </table>




    
</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>