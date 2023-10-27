<?php

if(!empty($_POST["btneditar"])){
    if (!empty($_POST["txtNombre"] )){
        $nombre = $_POST["txtNombre"];
        $id = ($_POST["txtid"]);
        $sql = $conexion->query("  select count(*) as 'total' from curso where nombreCurso='$nombre' and id_curso!=$id ");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El curso <?= $nombre?> ya existe",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $modificar = $conexion->query("  update curso set nombreCurso='$nombre' where id_curso=$id ");
            if ($modificar == true) { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"EXITO",
                            type:"success",
                            text:"Se modifico exitosamente el curso",
                            styling:"bootstrap3"
                        })
                    })
                </script>
            <?php } else { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"ERROR",
                            type:"error",
                            text:"No se pudo modificar el curso",
                            styling:"bootstrap3"
                        })
                    })
                </script>
            <?php }
            
        }
        
    } else { ?>
        <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"Los campos estan vacios",
                    styling:"bootstrap3"
                })
            })
        </script>   
    <?php } ?>
        <script>
            setTimeout(() => {
            window.history.replaceState(null,null,window.location.pathname); 
            }, 0);
        </script>
<?php }
?>