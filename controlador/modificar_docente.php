<?php

if(!empty($_POST["btneditar"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtMateria"] and $_POST["txtSueldo"] and $_POST["txtUsuario"])){
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $materia = $_POST["txtMateria"];
        $sueldo = $_POST["txtSueldo"];
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $id=$_POST["txtid"];
        $sql = $conexion->query("  select count(*) as 'total' from docente where ci=$ci and id_docente!=$id ");
        if ($sql->fetch_object()->total > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado en otro docente",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } 
        $sql2 = $conexion->query("  select count(*) as 'total2' from docente where usuario='$usuario' and id_docente!=$id ");
        if ($sql2->fetch_object()->total2 > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El usuario <?= $usuario?> ya esta registrado en otro docente",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $modificar = $conexion->query("  update docente set nombre='$nombre', apellido='$apellido', ci=$ci, sueldo='$sueldo', materia='$materia', usuario='$usuario' where id_docente=$id ");
            if(!empty($_POST["txtPassword"])){
                $modP = $conexion->query(" update docente set password='$password' where id_docente=$id ");
            }
            if ($modificar == true) { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"EXITO",
                            type:"success",
                            text:"Se modifico exitosamente al docente",
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
                            text:"No se pudo modificar al docente",
                            styling:"bootstrap3"
                        })
                    })
                </script>
            <?php }
            if(!empty($_POST["txtPassword"])){
                
            }
            
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