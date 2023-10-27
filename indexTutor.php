<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href=# />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ingresar Al Sistema Como Tutor</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
  </head>
  <!--Creacion del fondo color plomo (secondary), todo realizado con bootstrap-->
  <body class="bg-secondary d-flex justify-content-center align-items-center vh-100">
    <div
      class="bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem"
    >
    <!--Logo de Usuario grande-->
      <div class="d-flex justify-content-center">
        <img
          src="imagenes/icono-login.svg"
          alt="login-icon"
          style="height: 7rem"
        />
      </div>
      <!--creacion del formulario de ingreso-->
      <div class="text-center fs-1 fw-bold">INGRESAR</div>
      <div class="input-group mt-4">
        <div class="input-group-text bg-secondary">
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
          name="Usuario"
        />
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-secondary">
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
        />
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-secondary fw-semibold fst-italic"
            style="font-size: 0.9re"
            >¿Olvidaste tu contraseña?</a
          >
        </div>
      </div>
      <!--Boton de ingreso -->
      <div class="btn btn-secondary text-white w-100 mt-4 fw-semibold shadow-sm">
        INGRESAR
      </div>
      <!--Cambio de ingreso-->
      <div class="d-flex justify-content-around mt-1">
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-secondary fw-semibold fst-italic"
            style="font-size: 0.9re"
            >INGRESAR COMO ESTUDIANTE</a
          >
        </div>
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="pt-1">
          <a
            href="indexDocente.php"
            class="text-decoration-none text-secondary fw-semibold fst-italic"
            style="font-size: 0.9re"
            >INGRESAR COMO DOCENTE</a
          >
        </div>
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="pt-1">
          <a
            href="index.php"
            class="text-decoration-none text-secondary fw-semibold fst-italic"
            style="font-size: 0.9re"
            >INGRESAR COMO ADMINISTRADOR</a
          >
        </div>
      </div>
    </div>
  </body>
</html>
