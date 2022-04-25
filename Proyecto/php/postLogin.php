
<?php



$matricula = $_POST['matricula'];
$psw = $_POST['psw'];


$enlace = mysqli_connect("localhost", "root", "", "Alumnos");

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    else
    echo "Conectado a base de datos";

    $query = "SELECT * FROM Usuario WHERE matricula= '$matricula' AND psw='$psw'";
 
    $verificar_datos = mysqli_query($enlace, $query);

    if(mysqli_num_rows($verificar_datos) > 0){

        if(isset($matricula) && isset($psw)){
            
            if($matricula == "zS1234567" && $psw == "admi123"){

                header("Location: http://localhost:8080/Proyecto/php/adm.php");
                exit();  
            }else{
                header("Location: http://localhost:8080/Proyecto/html/usuario.html");
                exit(); 
            }
        } 
    }else{
        echo '
        <script>
            alert("Los datos son incorrectos");
            window.location = "../html/index.html";
        </script>
        '; 
    }


?>