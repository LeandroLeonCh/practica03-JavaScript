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

        $sql="DELETE FROM user WHERE codigo='$codigo'";
        date_default_timezone_set("America/Guayaquil");
        $fecha=date('Y-m-d H:i:s',time());
        $sql="UPDATE user SET usu_eliminado='S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo";

        if($conn->query($sql)===  TRUE){
            echo "<p> Se ha eliminado los datos correctamente!!</p>";

        }else{
            echo "<p> Error".$sql."<br>".mysql_error($conn)."</p>";
        }
        echo "<a href='../../vista/usuario/index.php'>ir</a>";
        $conn->close();
        ?>
    </body>
</html>

