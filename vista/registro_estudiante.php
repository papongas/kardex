<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
    header('location:../index.php');}

?>
<style>
    ul li:nth-child(3) .activo{
        background:rgb(11,150,214) !important;
    }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">

    <h4 class="text-center text-secondary">AGREGAR UN NUEVO ESTUDIANTE</h4>
    <?php
    include "../modelo/conexion.php";
    include "../controlador/registrar_estudiante.php";
    
    ?>


    <div class="row">
        <form action="" method="POST">
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="Nombre" class="input input__text" name="txtNombre">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="Apellido" class="input input__text" name="txtApellido">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <input type="text" placeholder="Carnet de Identidad" class="input input__text" name="txtCi">
            </div>
            <div class="fl-flex-label mb-4 px-2 col-12 col-md-6">
                <select name="txtCurso" class="input input__select">
                    <option value="">Elija un Curso</option>
                    <?php
                    $sql = $conexion->query(" select * from curso ");
                    while($datos = $sql->fetch_object()){ ?>
                        <option value="<?= $datos->id_curso?>"><?= $datos->nombreCurso?></option>
                    <?php }
                    ?>
                </select>
            </div>
            <div class="text-center p-2">
                <a href="estudiante.php" class="btn btn-secondary btn-rounded">CANCELAR</a>
                <button type="submit" value="ok" name="btnregistro" class = "btn btn-primary btn-rounded">AÑADIR</button>
            </div>
        </form>
    </div>
    
    
</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>