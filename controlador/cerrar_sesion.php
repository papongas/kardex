<?php

session_start();
session_destroy();
header("location:/sistema_asistencia/index.php");

?>