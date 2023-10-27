<?php

if(!empty($_POST["btnregistro"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtMateria"] and $_POST["txtSueldo"] and $_POST["txtUsuario"]and $_POST["txtPassword"])) {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $materia = ($_POST["txtMateria"]);
        $sueldo = ($_POST["txtSueldo"]);
        $usuario = $_POST["txtUsuario"];
        $password = md5($_POST["txtPassword"]);
        $sql = $conexion->query("  select count(*) as 'total' from docente where ci=$ci ");
        if($sql->fetch_object()->total > 0){?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado con otro docente",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } 
        $sql2 = $conexion->query("  select count(*) as 'total2' from docente where usuario='$usuario'  ");
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
            $registro=$conexion->query("  insert into docente(nombre,apellido,ci,materia,sueldo,usuario,password)values('$nombre','$apellido',$ci,'$materia','$sueldo','$usuario','$password') ");
            if ($registro==true) {?>
                <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se ha añadido al docente",
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
                            text:"Ha ocurrido un error al momento de añadir al docente",
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

