<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modify User</title> 
    </head>
    <body>
        <?php
        //incluir conexión a la base de datos
        include "../../../config/ConexionBD.php"; 
        $codigo = $_POST["codigo"];
         $ced= isset($_POST["ced"]) ? trim($_POST["ced"]) : null;
         $nombres= isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'utf-8') : null;
         $apellidos= isset($_POST["l_name"]) ? mb_strtoupper(trim($_POST["l_name"]), 'utf-8') : null;
         $direccion= isset($_POST["address"]) ? mb_strtoupper(trim($_POST["address"]), 'utf-8') : null;
         $telefono= isset($_POST["telf"]) ? trim($_POST["telf"]): null;
         $correo= isset($_POST["email"]) ? trim($_POST["email"]): null;
         //$contrasena= isset($_POST["pssw"]) ? trim($_POST["pssw"]): null;
         $fechaNacimiento= isset($_POST["born"]) ? trim($_POST["born"]): null;
         
         date_default_timezone_set("America/Guayaquil");
         $fecha=date('Y-m-d H:i:s', time());


         $sql="UPDATE user".
            "SET usu_cedula ='$ced',".
            "usu_nombres ='$nombres',".
            "usu_apellidos ='$apellidos',".
            "usu_direccion ='$direccion',".
            "usu_telefono ='$telefono',".
            "usu_correo ='$correo',".
            "usu_fecha_nacimiento ='$fechaNacimiento',".
            "usu_fecha_modificacion='$fecha'".
            "WHERE usu_codigo = $codigo";
         if($conn->query($sql) === TRUE){
             echo"<p>Se ha actualizado los datos personales correctamemte!!!</p>";
             } else{
                 echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
                    }
                //cerrar la base de datos
                echo"<a href='../../vista/usuario/index.php'>Regresar</a>";
                $conn->close();
                
        ?>
    </body>
</html>