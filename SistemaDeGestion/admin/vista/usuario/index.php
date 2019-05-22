<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Users Managmment</title>
        <link href="../../../Css/stylesIndex.css" rel="stylesheet" type="text/css"/>
    </head>
    
                        
    <body>
    <nav id="menu">
<ul>
  <li><a href="#">Menu</a>
    <ul>
      <li><a   href='../../../public/vista/crear_usuario.html'>Add  User </a></li>
      <li><a  href='../../../config/cerar_sesion.php'>Exit </a></li>
    </ul>
  </li>
</ul>
</nav>
    <?php session_start();
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
                header("Location: /SistemaDeGestion/public/vista/login.html");
            }
    ?>
      
    
        <table style="width:100%" class='gridtable' > 
            <tr>
                <th>I.D.</th>
                <th>Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Brithdate</th>
                <th>Delete</th>
                <th>Modify</th>
                <th>Change Password</th>
            </tr>
            <?php
            include '../../../config/ConexionBD.php';
            $sql = "SELECT*FROM user";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo " <td>" .$row["usu_cedula"]."</td>";
                    echo " <td>" .$row["usu_nombres"]."</td>";
                    echo " <td>" .$row["usu_apellidos"]."</td>";
                    echo " <td>" .$row["usu_direccion"]."</td>";
                    echo " <td>" .$row["usu_telefono"]."</td>";
                    echo " <td>" .$row["usu_correo"]."</td>";
                    echo " <td>" .$row["usu_fecha_nacimiento"]."</td>";
                    echo " <td> <a href='eliminar.php?codigo=".$row['usu_codigo']. "'>Delete</a> </td>"; 
                    echo " <td> <a href='modificar.php?codigo=".$row['usu_codigo']. "'>Modify</a> </td>";
                    echo " <td> <a href='cambiar_contrasena.php?codigo=".$row['usu_codigo']. "'>Change Password</a> </td>";  
                    echo "</tr>";
                }
            }else{
                echo "<tr>";
                echo "<td colpsan='7'> No existe usuarios registrados en el sistema </td>";
                echo "</tr>";
            }
            
            $conn->close();
            ?>
        </table>
     
    </body>

</html>  