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
        ?>
     <form id="formulario01" method="POST" action ="../../controladores/usuario/cambiar_contrasena.php">
                    <input type="hidden" id="codigo" name="codigo"  value="<?php echo $codigo ?>"/>

                    <label for="ced">Actual Password(*)</label>
                    <input type="passd" id="passwd" name="passwd" value=""
    required />
                <br>
                <label for="name"> New Password(*)</label>
                <input type="psswd1" id="psswd1" name="psswd1" value=""
    required/>
        <br>
                <input type="submit" id="change" value="Change"/>
                <input type="reset" id="cancel" value="Cancel"/>
            </form>
</body>
</html>