<?php
if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query(" delete from asistencia where id_asistencia=$id ");
    if ($sql == true) { ?>
        <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se elimino la asistencia exitosamente",
                    styling:"bootstrap3"
                })
            })
        </script>
    <?php } else { ?>
        <script>
            $(function mensaje() {
                new PNotify({
                    title:"ALGO SALIO MAL",
                    type:"error",
                    text:"No se pudo eliminar la asistencia",
                    styling:"bootstrap3"
                })
            })
        </script>
    <?php }?>
    <script>
        setTimeout(() => {
           window.history.replaceState(null,null,window.location.pathname); 
        }, 0);
    </script>


<?php
}
