<?php 
include 'conexion.php';
class Añadir{

    private $txtNombre;
    private $txtCedula ;
    private $txtPassword;
    private $resultado;
    private $conexion;

    function __construct()
    {
        $this->conexion = new Conexion();
    }
    //Funcion añadir a bases de datos
    function añadirBaseDatos(){
        $combinacion = array(
            'cost' => '12'
        );
        $this->txtPassword = password_hash($this->txtPassword,PASSWORD_BCRYPT,$combinacion);

        $this->resultado = $this->conexion->conn->prepare("INSERT INTO persona (`cedulaPersona`, `nombrePersona`,`passwordPersona`,`idUsuario`) VALUES ('$this->txtCedula','$this->txtNombre','$this->txtPassword',2)");
        $this->resultado->execute();
        if($this->resultado->rowCount() >= 1){
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

    //Function consultar base de datos

    function consultarUsuario(){
        $this->resultado = $this->conexion->conn->prepare("SELECT `idPersona`,`cedulaPersona`,`nombrePersona`,`passwordPersona`, `idUsuario` FROM `persona` WHERE cedulaPersona = :cedulaUsu");
        $this->resultado->bindParam(':cedulaUsu', $this->txtCedula, PDO::PARAM_INT);
        $this->resultado->execute();
        $datos = array();
        $idUsuario ='';
        $nombrePersona = '';
        $cedulaUsuario = '';
        $password = '';
        $tipoUsuario= '';
        while($persona = $this->resultado->fetch(PDO::FETCH_ASSOC)){
                $idUsuario = $persona['idPersona'];
                $cedulaUsuario = $persona['cedulaPersona'];
                $nombrePersona = $persona['nombrePersona'];
                $password = $persona['passwordPersona'];
                $tipoUsuario = $persona['idUsuario'];
        }
        if($cedulaUsuario){
            if(password_verify($this->txtPassword,$password)){

                session_start();
                $_SESSION['idPersona'] = $idUsuario;
                $_SESSION['idUsuario']= $tipoUsuario;
                $_SESSION['nombre'] = $nombrePersona;
                $_SESSION['sesion'] = true;

                $respuesta = array(
                    'respuesta' => 'correcto',
                    'tipoUsu' => $tipoUsuario
                );
            } else {
                $respuesta = array(
                    'error' => 'nouser'
                );
            } 
        } else if ($cedulaUsuario===''){
            $respuesta = array(
                'error' => 'nouser'
            );
        }

        return json_encode($respuesta);
    }



    function setNombre($txtNombre){
        $this->txtNombre = $txtNombre;
    }
    function setCedula($txtCedula){
        $this->txtCedula = $txtCedula;
    }
    function setPassword($txtPassword){
        $this->txtPassword = $txtPassword;
    }
}
$obj = new Añadir();

if($_POST['accion']==='crear'){
    $obj->setNombre($_POST['txtNombre']);
    $obj->setCedula($_POST['txtCedula']);
    $obj->setPassword($_POST['txtPassword']);
    echo $obj->añadirBaseDatos();
}
if($_POST['accion']==='login'){
    $obj->setCedula($_POST['txtCedula']);
    $obj->setPassword($_POST['txtPassword']);
    echo $obj->consultarUsuario();
}
/*if($_GET['accion']==='cargar'){
    echo $obj->cargarUsuariosComboBox();
}*/










?>