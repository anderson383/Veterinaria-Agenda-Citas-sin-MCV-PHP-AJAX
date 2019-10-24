<?php include 'Inc/funciones/sesiones.php' ?>
<?php
revisarRolDos();
?>
<?php include 'Inc/templeates/header.php' ?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark d-flex fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-white"></span>
  </button>
  <a class="navbar-brand  text-white" href="#"><i class="fas fa-fire-alt"></i> <b>CLIENTE</b></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex justify-content-betee">
      <li class="nav-item active">
        <a class="nav-link  text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white" href="#">Tus mascotas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" tabindex="-1" >Perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" tabindex="-1" >Condiciones</a>
      </li>
    </ul>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex justify-content-betee">
      <li class="nav-item">
        <a class="nav-link  text-white" href="#"><i class="far fa-user mx-2 text-verde"></i><span><?php echo $_SESSION['nombre'] ?></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="login.php?&cerrar=true" tabindex="-1" >Cerrar sesión</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
  <div class="row mt-5 d-none" id="tituloCitas">
    <div class="col-lg-12">
      <h1 class="mt-5 text-center"><i class="fas fa-user-times mx-2 text-info"></i>No tienes citas agendadas...</h1>
    </div>
  </div>

  <div class="row mt-5" id="tabla-contente">
    <div class="col mt-5">
      <table class="table table-info" ID="table-mascota">
        <h2 class="text-center bg-info m-0 p-2">Mascotas</h2>
        <thead>
            <tr>
              <th>#</th>
              <th>Tus mascotas</th>
              <th>Color</th>
              <th>Raza</th>
              <th>Especie</th>
              <th>Fecha de cita</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'Inc/templeates/footer.php' ?>
<script src="js/main.cliente.js"></script>