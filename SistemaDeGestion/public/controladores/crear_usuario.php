<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Crear Nuevo Usuario</title> 
        <style type="text/css"rel="stylesheet"> 
            .error{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
        //incluir conexión a la base de datos
        include "../../config/ConexionBD.php"; 
         $ced= isset($_POST["ced"]) ? trim($_POST["ced"]) : null;
         $nombres= isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'utf-8') : null;
         $apellidos= isset($_POST["l_name"]) ? mb_strtoupper(trim($_POST["l_name"]), 'utf-8') : null;
         $direccion= isset($_POST["address"]) ? mb_strtoupper(trim($_POST["address"]), 'utf-8') : null;
         $telefono= isset($_POST["telf"]) ? trim($_POST["telf"]): null;
         $correo= isset($_POST["email"]) ? trim($_POST["email"]): null;
         $contrasena= isset($_POST["pssw"]) ? trim($_POST["pssw"]): null;
         $fechaNacimiento= isset($_POST["born"]) ? trim($_POST["born"]): null;

         if(!empty($_FILES['inImgu']['tmp_name']) && file_exists($_FILES['inImgu']['tmp_name'])) {
            $imagen= addslashes(file_get_contents($_FILES['inImgu']['tmp_name']));
                $mime = $_FILES["inImgu"]["type"];
        }
         
         $sql= "INSERT INTO user VALUES(0,  '$ced', '$nombres', '$apellidos', '$direccion', '$telefono',  '$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null)";
         if($conn->query($sql) === TRUE){
             echo"<p>FELICIDADES PASASTE LAS VALIDACIONES!!!</p>";
             } else{
                 if($conn->errno == 1062){
                     echo"<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
                    }else{
                        echo"<p class='error'>Error: ". mysqli_error($conn) . "</p>";
                    }
                }
                //cerrar la base de datos
                $conn->close();
                echo"<a href='../vista/crear_usuario.html'>Regresar</a>"
        ?>
    </body>
</html>
