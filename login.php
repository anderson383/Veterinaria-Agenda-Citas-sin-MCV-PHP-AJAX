<?php include 'Inc/templeates/header.php' ?>
<?php
session_start();
if(isset($_GET['cerrar'])){
    $_SESSION = array();
}

?>
  <div class="containerDos ">
      <form id="frmFormulario">
      <div class="row">
          <div class="col-12">
          <h2 class="mx-a">Login Veterinaria</h2>
          <hr>
            <label for="nombre">Ingrese Cedula</label>
            <input type="number" name="" placeholder="Cedula usuario" id="txtCedula" class="form-control mb-3">
            <label>Ingrese Contraseña</label>
            <div class="input-group">
              <input ID="txtPassword" type="Password" Class="form-control" placeholder="Ingrese la contraseña">
              <div class="input-group-append">
                <button id="show_password" class="btn btn-danger" type="button"> <span class="fa fa-eye-slash icon"></span> </button>
              </div>
            </div>
      </div>
      </div>
        <div class="row mt-5">
            <div class="col justify-content-between d-flex flex-column flex-md-row">
                <a href="registro.php" class="text-danger mb-2">Registrarse</a>
                <input type="hidden" name="" id="accion" value="login">
                <input type="submit" value="Iniciar" class="btn btn-outline-dark px-5">
            </div>
        </div>
      </form>
  </div>

  <?php include 'Inc/templeates/footer.php' ?>
  <script src="js/main.js"></script>

