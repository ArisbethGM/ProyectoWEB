<?php
 echo '<link href="stylePHP.css" type="text/css" rel="stylesheet">';
    
    $_SESSION_START; 
  
    $enlace = mysqli_connect("localhost", "root", "", "Alumnos");

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    else
    echo "Conectado a base de datos";

    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apaterno = $_POST['apaterno'];
    $amaterno = $_POST['amaterno'];
    $correo = $_POST['correo'];
    $colonia = $_POST['colonia'];
    $codigo = $_POST['codigo'];
    $ciudad = $_POST['ciudad']; 
    $psw = $_POST['psw'];
    
   
   //MATRICULA
    $query = "SELECT * FROM Usuario WHERE matricula= '$matricula'";
    $verificar_datos = mysqli_query($enlace, $query);

    if(mysqli_num_rows($verificar_datos) > 0){

        echo '
            <script>
                alert("La Matrícula ya existe en la base de datos, intentalo de nuevo");
                window.close(); 
            </script>
        ';
       
        exit();  
    }

    if (isset($codigo)) {
        if (empty($codigo)) {
            $query2= "INSERT INTO Usuario (matricula, nombre, apaterno, amaterno, correo, colonia, ciudad, psw) VALUES ('$matricula','$nombre','$apaterno','$amaterno','$correo','$colonia','$ciudad','$psw')";

        }else{
            $query2= "INSERT INTO Usuario (matricula, nombre, apaterno, amaterno, correo, colonia, codigo, ciudad, psw) VALUES ('$matricula','$nombre','$apaterno','$amaterno','$correo','$colonia','$codigo','$ciudad','$psw')";

        }
    }

    
      
    $sentencia = $enlace->prepare($query2);
    $sentencia->execute(); 
    $sentencia->close();


    echo '
    <script>
        alert("Registro Éxitoso");    
        window.location = "../php/adm.php";

    </script>
    ';

    exit();

    mysqli_close($enlace);

?>
