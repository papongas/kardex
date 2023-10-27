<?php

if(!empty($_POST["btnregistro"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtTelefono"] and $_POST["txtUsuario"] and $_POST["txtPassword"])) {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $telefono = ($_POST["txtTelefono"]);
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $sql = $conexion->query("  select count(*) as 'total' from tutor where ci=$ci ");
        if($sql->fetch_object()->total > 0){?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado con otro tutor",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php }
        $sql2 = $conexion->query("  select count(*) as 'total2' from tutor where usuario='$usuario' ");
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
            $registro=$conexion->query("  insert into tutor(nombre,apellido,ci,telefono,usuario,password)values('$nombre','$apellido',$ci,$telefono,'$usuario','$password') ");
            if ($registro==true) {?>
                <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se ha añadido al tutor",
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
                            text:"Ha ocurrido un error al momento de añadir al tutor",
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
    <?php }?>
    <script>
        setTimeout(() => {
           window.history.replaceState(null,null,window.location.pathname); 
        }, 0);
    </script>
<?php }

