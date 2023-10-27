<?php

if(!empty($_POST["btneditar"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtUsuario"])){
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $id=$_POST["txtid"];
        $sql = $conexion->query("  select count(*) as 'total' from usuario where usuario='$usuario' and id_usuario!=$id ");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El usuario <?= $usuario?> ya existe",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } 
        else {
            $modificar = $conexion->query("  update usuario set nombre='$nombre', apellido='$apellido', usuario='$usuario' where id_usuario=$id ");
            if(!empty($_POST["txtPassword"])){
                $modP = $conexion->query(" update usuario set password='$password' where id_estudiante=$id ");
            }
            if ($modificar == true) { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"EXITO",
                            type:"success",
                            text:"Se modifico exitosamente al usuario",
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
                            text:"No se pudo modificar al usuario",
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