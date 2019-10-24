<?php 

function usuarioAutenticado(){
    if(!revisarUsuario()){
        header('Location: login.php');
    }
}
function revisarUsuario(){
    return isset($_SESSION['idUsuario']);
}
function revisarRol(){
    if($_SESSION['idUsuario']==='2'){
        header('Location: index-cliente.php');
        exit();
    }
}
function revisarRolDos(){
    if($_SESSION['idUsuario']==='1'){
        header('Location: index-admin.php');
        exit();
    }
}
session_start();
usuarioAutenticado();







?>