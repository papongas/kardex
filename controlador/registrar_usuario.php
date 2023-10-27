<?php

if(!empty($_POST["btnregistro"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtUsuario"] and $_POST["txtPassword"])) {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $sql=$conexion->query("  select count(*) as 'total' from usuario where usuario='$usuario' ");
        f($sql->fetch_object()->total > 0){?>
         i   <script>
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
        $sql2 = $conexion->query("  select count(*) as 'total2' from usuario where usuario='$usuario' and id_docente!=$id ");
        if ($sql2->fetch_object()->total2 > 0) { ?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El usuario <?= $usuario?> ya esta registrado en otro usuario",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $registro=$conexion->query("  insert into usuario(nombre,apellido,usuario,password)values('$nombre','$apellido','$usuario','$password') ");
            if ($registro==true) {
                ?>
                <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se ha añadido al usuario",
                    styling:"bootstrap3"
                })
            })
        </script>  
        
            <?php 
            } else { ?>
                <script>
                    $(function mensaje() {
                        new PNotify({
                            title:"ERROR",
                            type:"error",
                            text:"Ha ocurrido un error al momento de añadir al usuario",
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

