<?php
session_start();
include '../../config/ConexionBD.php';
$user=isset($_POST["mail"]) ? trim($_POST["mail"]): null;
$passw=isset($_POST["psswdU"]) ? trim($_POST["psswdU"]): null;

$sql = "SELECT*FROM user WHERE usu_correo = '$user' 
        and usu_password = MD5('$passw')";

$result = $conn->query($sql);
if($result->num_rows > 0){
    $_SESSION['isLogged']=TRUE;
    header('Location: ../../admin/vista/usuario/index.php');
}else{
    header('Location: ../vista/login.html');
}
$conn->close();