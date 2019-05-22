<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Delete person's datas </title>
    </head>
    <body>
    <?php session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
                header("Location: /SistemaDeGestion/public/vista/login.html");
            }
    ?>
        <?php
        include '../../../config/ConexionBD.php';
        $codigo=$_POST["codigo"];
        $contrasena= isset($_POST["psswd"]) ? trim($_POST["psswd"]): null;
        $contrasena1= isset($_POST["psswd1"]) ? trim($_POST["psswd1"]): null;
        $sqlContrasena = "SELECT * FROM user WHERE usu_codigo=$codigo 
        AND usu_password=MD5('$contrasena')";
        
        $result=$conn->query($sqlContrasena);

        if($result->num_rows>0){
            date_default_timezone_set("America/Guayaquil");
            $fecha=date('Y-m-d H:i:s',time());
            $sqlContrasena1="UPDATE user".
            "SET usu_password=MD5($contrasena1),".
            "usu_fecha_modificacion='$fecha'".
            "WHERE usu_codigo=$codigo";

            if($conn->query($sqlContrasena1) === TRUE){
                echo"<p>Se ha actualizado la contraseña correctamemte!!!</p>";
                } else{
                    echo"<p class='error'>Error: ". mysql_error($conn) . "</p>";
                       }
                       
        }else{
            echo "<p>La constraseña no coincide!!</p>";
        }
        echo"<a href='../../vista/usuario/index.php'>Regresar</a>";
        $conn->close();
        ?>
        </body>
        </html>