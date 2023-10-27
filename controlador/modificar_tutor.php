<?php

if(!empty($_POST["btneditar"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtTelefono"] and $_POST["txtUsuario"])){
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $telefono = $_POST["txtTelefono"];
        $id=$_POST["txtid"];
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $sql = $conexion->query("  select count(*) as 'total' from tutor where ci=$ci and id_tutor!=$id ");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado en otro tutor",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php }
        $sql2 = $conexion->query("  select count(*) as 'total2' from tutor where usuario='$usuario' and id_tutor!=$id ");
        if ($sql2->fetch_object()->total2 > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El usuario <?= $usuario?> ya esta registrado en otro tutor",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $modificar = $conexion->query("  update tutor set nombre='$nombre', apellido='$apellido', ci=$ci, telefono='$telefono', usuario='$usuario' where id_tutor=$id ");
            if(!empty($_POST["txtPassword"])){
                $modP = $conexion->query(" update tutor set password='$password' where id_tutor=$id ");
            }
            if ($modificar == true) { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"EXITO",
                            type:"success",
                            text:"Se modifico exitosamente al tutor",
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
                            text:"No se pudo modificar al tutor",
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