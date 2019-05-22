<?php
$servername="localhost";
$username="admin_1";
$password="Zep_010.vw";
$dbname="hipermedial";
//create conection
$conn=new mysqli($servername, $username, $password,$dbname);
$conn ->set_charset("utf8");
//probar conecxión
if($conn->connect_error){
    die("Conexión fallida" .$conn->connect_error);
 } else{
    echo("Conexión exitosa <br>");
}
?>