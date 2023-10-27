<?php

if(!empty($_POST["btnregistro"])){
    if (!empty($_POST["txtNombre"])) {
        $nombre = $_POST["txtNombre"];
        $sql=$conexion->query("  select count(*) as 'total' from curso where nombreCurso='$nombre' ");
        if($sql->fetch_object()->total > 0){?>
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
            $registro=$conexion->query("  insert into curso(nombreCurso)values('$nombre') ");
            if ($registro==true) {
                ?>
                <script>
            $(function mensaje() {
                new PNotify({
                    title:"EXITO",
                    type:"success",
                    text:"Se ha añadido el curso",
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
                            text:"Ha ocurrido un error al momento de añadir el curso",
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
                    text:"El campo esta vacio",
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

