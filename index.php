<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href=# />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingresar Al Sistema</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
  </head>
  <!--Creacion del fondo color negro (dark), todo realizado en bootstrap-->
  <body class="bg-dark d-flex justify-content-center align-items-center vh-100">
  <form method="POST" action="">
    <div
        class="bg-white p-5 rounded-5 text-secondary shadow"
        style="width: 25rem"
      >
      <!--Logo de Usuario-->
        <div class="d-flex justify-content-center">
          <img
            src="imagenes/icono-login.svg"
            alt="login-icon"
            style="height: 7rem"
          />
        </div>
        <!--Creacion del formulario de ingreso-->
          
          <div class="text-center fs-1 fw-bold">INGRESAR</div>
          <?php
            include "modelo/conexion.php";
            include "controlador/login.php";
          ?>  
    
          
          <div class="input-group mt-4">
            <div class="input-group-text bg-dark">
              <img
                src="imagenes/icono-usuario.svg"
                alt="username-icon"
                style="height: 1rem"
              />
            </div>
            <input
              class="form-control bg-light"
              type="text"
              placeholder="Username"
              name="usuario"
            />
          </div>
          <div class="input-group mt-1">
            <div class="input-group-text bg-dark">
              <img
                src="imagenes/icono-password.svg"
                alt="password-icon"
                style="height: 1rem"
              />
            </div>
            <input
              class="form-control bg-light"
              type="password"
              placeholder="Password"
              name="password"
            />
          </div>
          <br>
            <!--Boton de ingreso -->
          <input name="btningresar" class="btn btn-dark w-100 py-2" type="submit" value="INICIAR SESION">
      
          <!--Cambio de ingreso -->
          <div class="d-flex justify-content-around mt-1">
            <div class="pt-1">
              <a
                href="#"
                class="text-decoration-none text-dark fw-semibold fst-italic"
                style="font-size: 0.9re"
                >INGRESAR COMO ESTUDIANTE</a
              >
            </div>
          </div>
          <div class="d-flex justify-content-around mt-1">
            <div class="pt-1">
              <a
                href="indexDocente.php"
                class="text-decoration-none text-dark fw-semibold fst-italic"
                style="font-size: 0.9re"
                >INGRESAR COMO DOCENTE</a
              >
            </div>
          </div>
          <div class="d-flex justify-content-around mt-1">
            <div class="pt-1">
              <a
                href="indexTutor.php"
                class="text-decoration-none text-dark fw-semibold fst-italic"
                style="font-size: 0.9re"
                >INGRESAR COMO TUTOR</a
              >
            </div>
          </div>
      </div>
    </form>
  </body>
</html>
