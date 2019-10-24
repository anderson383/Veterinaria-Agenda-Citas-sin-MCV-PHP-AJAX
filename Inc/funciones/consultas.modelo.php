
<?php
include 'conexion.php';
class Consulta{
    private $conexion;
    private $nombreMascota;
    private $razaMascota;
    private $fechaMascota;
    private $colorMascota;
    private $especieMascota;
    private $dueñoMascota;
    private $resultado;
    private $consulta;
    function __construct()
    {
        $this->conexion = new Conexion();
    }
    function cargarUsuariosComboBox(){
        $this->resultado = $this->conexion->conn->prepare("SELECT * FROM persona WHERE idUsuario = 2");
        $this->resultado->execute();
        $persona = array();
        while($personas = $this->resultado->fetch(PDO::FETCH_ASSOC)):
            $persona[] = $personas;
        endwhile;
        return json_encode($persona);
    }
    function insertarCitas(){
        $this->resultado = $this->conexion->conn->prepare("INSERT INTO `mascota`(`nombreMascota`, `colorMascota`, `razaMascota`, `idEspecie`, `fechaAgenda`, `idPropietario`)
         VALUES (:nombre,:color,:raza,:idEspecie,:fecha,:idPrope)");
        $this->resultado->bindParam(":nombre",$this->nombreMascota,PDO::PARAM_STR);
        $this->resultado->bindParam(":color",$this->colorMascota,PDO::PARAM_STR);
        $this->resultado->bindParam(":raza",$this->razaMascota,PDO::PARAM_STR);
        $this->resultado->bindParam(":idEspecie",$this->especieMascota,PDO::PARAM_INT);
        $this->resultado->bindParam(":fecha",$this->fechaMascota,PDO::PARAM_STR);
        $this->resultado->bindParam(":idPrope",$this->dueñoMascota,PDO::PARAM_INT);
        $this->resultado->execute();
        if($this->resultado->rowCount() >=1 ){
            $respuesta = array(
                'respuesta' => 'correcto'
            );
        } else {
            $respuesta = array(
                'error' => 'error'
            );
        }
        return json_encode($respuesta);
    }
    function consultarMascota(){
        $this->consulta = "SELECT `idMascota`, `nombreMascota`, `colorMascota`, `razaMascota`, `idEspecie`, `fechaAgenda`, `idPropietario`,`nombreEspecie`, `nombrePersona` FROM `mascota` INNER JOIN especie ON mascota.idEspecie = especie.idEspecia INNER JOIN persona ON mascota.idPropietario = persona.idPersona";
        $this->resultado = $this->conexion->conn->prepare($this->consulta);
        $this->resultado->execute();
        $mascota = array();
        while($mascotas = $this->resultado->fetch(PDO::FETCH_ASSOC)):
            $mascota[] = $mascotas;
        endwhile;
        return json_encode($mascota);
    }
    function consultarMascotaUsuario(){
        session_start();
        $this->consulta = "SELECT `idMascota`, `nombreMascota`, `colorMascota`, `razaMascota`, `idEspecie`, `fechaAgenda`, `idPropietario` ,`nombreEspecie` FROM mascota INNER JOIN especie ON mascota.idEspecie = especie.idEspecia WHERE idPropietario = :propietario";
        $this->resultado = $this->conexion->conn->prepare($this->consulta);
        $this->resultado->bindParam(":propietario",$_SESSION['idPersona'],PDO::PARAM_INT);
        $this->resultado->execute();
        $mascota = array();
        while($mascotas = $this->resultado->fetch(PDO::FETCH_ASSOC)):
            $mascota[] = $mascotas;
        endwhile;
        return json_encode($mascota);
    }
    function setNombreMascota($nombreMascota){
        $this->nombreMascota = $nombreMascota;
    }
    function setRazaMascota($razaMascota){
        $this->razaMascota = $razaMascota;
    }
    function setFchaMascota($fechaMascota){
        $this->fechaMascota = $fechaMascota;
    }
    function setColorMascota($colorMascota){
        $this->colorMascota = $colorMascota;
    }
    function setEspecieMascota($especieMascota){
        $this->especieMascota = $especieMascota;
    }
    function setDueñoMascota($dueñoMascota){
        $this->dueñoMascota = $dueñoMascota;
    }
    
}
$objeto = new Consulta();

if(isset($_GET['accion'])){
    if($_GET['accion']==='cargar'){
        echo $objeto->cargarUsuariosComboBox();
    }
    if($_GET['accion']==='masco'){
        echo $objeto->consultarMascota();
    }
    if($_GET['accion']==='mascota'){
        echo $objeto->consultarMascotaUsuario();
    }
}
if(isset($_POST['accion'])){

    if($_POST['accion']==='crear'){
        $objeto->setNombreMascota($_POST['nombreMascota']);
        $objeto->setRazaMascota($_POST['razaMascota']);
        $objeto->setFchaMascota($_POST['fechaMascota']);
        $objeto->setColorMascota($_POST['colorMascota']);
        $objeto->setEspecieMascota($_POST['especieMascota']);
        $objeto->setDueñoMascota($_POST['dueñoMascota']);
        echo $objeto->insertarCitas();
    
    }
}


?>