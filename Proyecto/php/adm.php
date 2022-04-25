<?php
    $enlace = mysqli_connect("localhost", "root", "", "Alumnos");

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
        echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    else
    $status = "Conectado";
    $sql = "select * from Usuario"; 
    $resultado = $enlace->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="imagenes" href="../imagen/logo.jpeg">
    <link rel="stylesheet" href="../css/styleForm.css"> 
    <title>Administración</title>
</head>
<body>
    <section class="form_wrap">
        <section class="cantact_info">
            <div class="imgcontainer">
                <img src="../imagen/lic.JPG" alt="Logo de la UV" class="avatar">
                </div>
                <section class="info_title">
                    <span class="fa fa-user-circle"></span>
                    <h2>UNIVERSIDAD<br>VERACRUZANA</h2>
                </section>
                 <section class="info_items">
                    <p><span class="dato"></span>Lic. Tecnologías Computacionales</p>
                    <p><span class="dato"></span>Tecnologías Web</p>
                    <p>Base de datos: <?php echo $status;?></p>
                </section>
        </section> 
        <div class="form"> 
            <form  method="POST" id="formulario" name="formulario" target="_blank" class="form_contact" >
                <h3>AGREGAR ALUMNO</h3>
                <p id="formulario__matricula" >
                    <label for="matricula">Matrícula *</label>
                    <input class="formulario__input" type="text" id="matricula" placeholder="Ejem: zS1801232" name="matricula" required>
                </p>
                <p id="formulario__nombre" >
                    <label for="nombre">Nombres *</label>
                    <input class="formulario__input" type="text" id="nombre" name="nombre" required>
                </p>
                <p id="formulario__apaterno" >
                    <label for="apaterno">Apellido Paterno *</label>
                    <input class="formulario__input" type="text" id="apaterno" name="apaterno" required>
                </p>
                <p id="formulario__amaterno" >
                    <label for="amaterno">Apellido Materno </label>
                    <input class="formulario__input" type="text" id="amaterno" name="amaterno">
                </p>
                <p id="formulario__correo" >
                    <label for="correo">Correo electrónico *</label>
                    <input class="formulario__input" type="email" id="correo" placeholder="Ejem: usuario@hotmail.com" name="correo" required>
                </p>
                <p id="formulario__colonia" >
                    <label for="colonia">Colonia</label>
                    <input class="formulario__input" type="text" id="colonia" name="colonia">
                </p>
                <p id="formulario__codigo" >
                    <label for="codigo">Código Postal</label>
                    <input class="formulario__input" type="text" id="codigo" placeholder="Ejem: 12345" name="codigo">
                </p>
                <p id="formulario__ciudad" >
                    <label for="ciudad">Ciudad</label>
                    <input class="formulario__input" type="text" id="ciudad" name="ciudad">
                </p>
                <p id="formulario__psw" >
                    <label for="psw">Contraseña</label>
                    <input class="formulario__input" type="password" id="psw" name="psw" required>
                </p>
                <p>
                    <input type="submit" value="Agregar" id="btnSend">
                </p> 
                <br>       
            </form>
        </div>
    </section>
    <section id="datos-inf" > 
            <div class="contenido">
                <h1>DATOS DE LOS ESTUDIANTES </h1>
            </div>
            <div class="inf-tabla">
                <table  class="tabla-l">
                    <tr>
                        <td>ID</td>
                        <td>MATRICULA</td>
                        <td>NOMBRE</td>
                        <td>APELLIDO PATERNO</td>
                        <td>APELLIDO MATERNO</td>
                        <td>CORREO ELECTRONICO</td>
                        <td>COLONIA</td>
                        <td>CODIGO POSTAL</td>
                        <td>CIUDAD</td>
                        <td>CONTRASEÑA</td>
                    </tr>
                    <tr>
                        <?php 
                            while($datos=$resultado->fetch_array()){
                            ?>
                                <tr>
                                    <td><?php echo $datos["id"]?></td>
                                    <td><?php echo $datos["matricula"]?></td>
                                    <td><?php echo $datos["nombre"]?></td>
                                    <td><?php echo $datos["apaterno"]?></td>
                                    <td><?php echo $datos["amaterno"]?></td>
                                    <td><?php echo $datos["correo"]?></td>
                                    <td><?php echo $datos["colonia"]?></td>
                                    <td><?php echo $datos["codigo"]?></td>
                                    <td><?php echo $datos["ciudad"]?></td>
                                    <td><?php echo $datos["psw"]?></td>

                                </tr>
                                <?php   
                            }
                        ?>
                    </tr>
                </table> 
            </div> 
   </section>
   <script src="../js/appForm.js"></script> 
</body>
</html>