<?php include 'Inc/funciones/sesiones.php' ?>
<?php 
revisarRol();
?>
<?php include 'Inc/templeates/header.php' ?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark d-flex fixed-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon text-white"></span>
  </button>
  <a class="navbar-brand  text-white" href="#"><i class="fas fa-compass"></i> <b>ADMINISTRADOR</b></a>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 d-flex justify-content-betee">
      <li class="nav-item active">
        <a class="nav-link  text-white" href="#">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link  text-white" href="#">Mascotas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" tabindex="-1" >Estadisticas</a>
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
  <div class="row mt-5">
    <div class="col">
      <h2 class="text-center my-5">Agendar citas de mascotas</h2>
    </div>
  </div>
  <form id="frmFormularioAgenda">
    <div class="row">
      <div class="col-lg-6">
        <label for="">Nombre de la mascota</label>
        <input type="text" name="" id="nombreMascota" class="form-control" placeholder="Nombre">
        <label for="">Raza de la mascota</label>
        <input type="text" name="" id="razaMascota" class="form-control" placeholder="Raza">
        <label for="fechaMascota">Fecha de cita</label>
        <input type="date" name="" id="fechaMascota" class="form-control">
        
      </div>
      <div class="col-lg-6">
        <label for="">Color de la mascota</label>
        <input type="text" name="" id="colorMascota" class="form-control" placeholder="Color">
        <label for="">Especie de la mascota</label>
        <select class="form-control" id="especieMascota">
            <option value="0" selected="selected">Seleccione una especie</option>
            <option value="1">Canino</option>
            <option value="2">Felino</option>
        </select>
        <label for="">Dueño de la mascota</label>
        <select class="form-control" id="dueñoMascota">
            <option selected="selected" value="0">Seleccione una dueño</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
      <label for="">Enviar</label>
        <input type="hidden" name="" id="crearCita" value="crear">
        <input type="submit" value="Agendar cita" class="btn btn-danger btn-block">
      </div>
    </div>
  </form>
  <div class="row mt-5">
    <div class="col">
      <table class="table table-success">
        <thead>
          <tr>
            <th>#</th>
            <th>Mascota</th>
            <th>Color</th>
            <th>Raza</th>
            <th>Especie</th>
            <th>Fecha</th>
            <th>Propietario</th>
          </tr>
        </thead>
        <tbody id="table-conten">

        </tbody>
      </table>
    </div>
  </div>
</div>
<?php include 'Inc/templeates/footer.php' ?>
<script src="js/main.js"></script>
