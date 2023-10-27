<?php

if(!empty($_POST["btneditar"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtCurso"])){
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $curso = $_POST["txtCurso"];
        $id=$_POST["txtid"];
        $sql = $conexion->query("  select count(*) as 'total' from estudiante where ci=$ci and id_estudiante!=$id ");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado en otro estudiante",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $modificar = $conexion->query("  update estudiante set nomEst='$nombre', apellido='$apellido', ci=$ci, curso='$curso' where id_estudiante=$id ");
            if ($modificar == true) { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"EXITO",
                            type:"success",
                            text:"Se modifico exitosamente al estudiante",
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
                            text:"No se pudo modificar al estudiante",
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