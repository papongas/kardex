<?php

if(!empty($_POST["btnregistro"])){
    if (!empty($_POST["txtNombre"] and $_POST["txtApellido"] and $_POST["txtCi"] and $_POST["txtCurso"])) {
        $nombre = $_POST["txtNombre"];
        $apellido = $_POST["txtApellido"];
        $ci = $_POST["txtCi"];
        $curso = ($_POST["txtCurso"]);
        $sql = $conexion->query("  select count(*) as 'total' from estudiante where ci=$ci ");
        if($sql->fetch_object()->total > 0){?>
            <script>
            $(function mensaje() {
                new PNotify({
                    title:"ERROR",
                    type:"error",
                    text:"El carnet <?= $ci?> ya esta registrado con otro estudiante",
                    styling:"bootstrap3"
                })
            })
        </script>  
        <?php } else {
            $registro=$conexion->query("  insert into estudiante(nomEst,apellido,ci,curso)values('$nombre','$apellido',$ci,$curso) ");
            if ($registro==true) {?>
                <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se ha añadido al estudiante",
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
                            text:"Ha ocurrido un error al momento de añadir al estudiante",
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

