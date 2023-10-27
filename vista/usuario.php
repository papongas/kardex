<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:../index.php');}

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
        <title>USUARIOS</title>


<?php require('./layout/topbar.php'); ?>
<?php require('./layout/sidebar.php'); ?>
<div class="page-content">

    <h4 class="text-center text-secondary">USUARIOS</h4>
    
    <?php
    include "../modelo/conexion.php";
    include "../controlador/modificar_usuario.php";
    include "../controlador/eliminar_usuario.php";
    
    $sql=$conexion->query(" SELECT * from usuario ");
    ?>


    <a href="registro_usuario.php" class="btn btn-primary btn-rounded mb-3"><i class="fa-solid fa-plus"></i> &nbsp;Agregar</a>

    <table class="table table-bordered table-hover col-12" id="example">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">USUARIO</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            while($datos = $sql->fetch_object()) { ?>
                <tr>
                    <td><?= $datos->id_usuario?></td>
                    <td><?= strtoupper($datos->nombre)?></td>
                    <td><?= strtoupper($datos->apellido)?></td>
                    <td><?= strtoupper($datos->usuario)?></td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#exampleModal<?= $datos->id_usuario ?>"  class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square "></i></a>
                        <a href="usuario.php?id=<?= $datos->id_usuario?>" onclick="advertencia(event)" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                    </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal<?= $datos->id_usuario ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header d-flex justify-content-between">
                            <h5 class="modal-title w-100" id="exampleModalLabel" >EDITAR USUARIO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div hidden class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Id" class="input input__text" name="txtid" value="<?= $datos->id_usuario ?>">
                                </div>
                                <div class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Nombre" class="input input__text" name="txtNombre" value="<?= $datos->nombre ?>">
                                </div>
                                <div class="fl-flex-label mb-4 px-2 col-12 ">
                                    <input type="text" placeholder="Apellido" class="input input__text" name="txtApellido" value="<?= $datos->apellido ?>">
                                </div>
                                <div class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Usuario" class="input input__text" name="txtUsuario" value="<?= $datos->usuario ?>">
                                </div>
                                <div class="fl-flex-label mb-4 px-2 col-12 col">
                                    <input type="text" placeholder="Password" class="input input__text" name="txtPassword" >
                                </div>
                                <div class="text-center p-2">
                                    <a href="usuario.php" class="btn btn-secondary btn-rounded">CANCELAR</a>
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