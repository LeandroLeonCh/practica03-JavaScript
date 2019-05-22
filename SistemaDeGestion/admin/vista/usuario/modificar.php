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
        $codigo =$_GET["codigo"];
        $sql = "SELECT*FROM user WHERE usu_codigo=$codigo";

        include '../../../config/ConexionBD.php';
        $result=$conn->query($sql);

        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                ?>
                <form id="formulario01" method="POST" action ="../../controladores/usuario/modificar.php">
                    <input type="hidden" id="codigo" name="codigo"  value="<?php echo $codigo ?>"/>

                    <label for="ced">I.D.(*)</label>
                    <input type="text" id="ced" name="ced" value="<?php echo $row["usu_cedula"];?>"
                     required placeholder="Enter C.I."/>
                <br>
                <label for="name"> Name(*)</label>
                <input type="text" id="name" name="name" value="<?php echo $row["usu_nombres"];?>"
                required  placeholder="Names"/>
                <br>
                <label for="l_name"> Last Name(*)</label>
                <input type="text" id="l_nama" name="l_name" value="<?php echo $row["usu_apellidos"];?>"
                 required placeholder="Last Names"/>
                <br>
                <label for="address"> Address(*)</label>
                <input type="text" id="address" name="address" value="<?php echo $row["usu_direccion"];?>"
                 required  placeholder="Address"/>
                <br>
                <label for="telf"> Phone(*)</label>
                <input type="text" id="telf" name="telf" value="<?php echo $row["usu_telefono"];?>"
                required  placeholder="Phone"/>
                <br>
                <label for="born"> Brithday(*)</label>
                <input type="date" id="born" name="born" value="<?php echo $row["usu_fecha_nacimiento"];?>"
                required  placeholder="Brithday"/>
                <br>
                <label for="mail"> E-mail(*)</label>
                <input type="email" id="mail" name="mail" value="<?php echo $row["usu_correo"];?>"
                required  placeholder="E-mail"/>
                <br>
                <input type="submit" id="modify" value="Modify"/>
                <input type="reset" id="cancel" value="Cancel"/>
            </form>
        <?php
            }
        }else{
            echo "<p>Ha ocurrido un error!</p>";
            echo "<p>".mysql_error($conn)."</p>";
        }
        $conn->close();
        ?>
    </body>
</html>