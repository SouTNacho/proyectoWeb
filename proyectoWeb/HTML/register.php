<?php
//Inporto el conecion.php
include 'conexion.php';

//Almaceno la funcion de comprobar conexion en una variable
$conexion = conectar_bd();

//Revisa si el formulaio fue envia
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    //Preparo la consulta para insertar un nuevo usuario
    $sql = "INSERT INTO usuarios (nombre, correo, pass) VALUES ('$nombre', '$correo', '$pass')";

    //Ejecuta la consulta
    if ($conexion->query($sql) === TRUE) {
        header("Location: login.php");
        exit();
    }  else {
        echo "Error: " . $conexion->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../fomulario.css">
</head>
<body>
    <div class="conter">
        <form action="" method="post" class="formulario-conter">
            <h2 class="formulario-title">REGISTO</h2>
            <input class="formulario-input" type="text" name="nombre" placeholder="Nombre de Usuario" required>
            <input class="formulario-input" type="email" name="correo" placeholder="example@email.com" pattern=".{5, }@[a-z0-9.-]+\.[a-z]{2, }$" title="Ingrese al menos 5 caracteres y cumpla con el formato example@email.com" required>
            <input class="formulario-input" type="password" name="pass" placeholder="Contrasenha (8 - 16 caracteres)" required minlength="8" maxlength="16">
            <button class="formulario-button" type="submit">Registrarme</button>
        </form>
        <div class="sesion-div">
            <div class="flecha">
                <img class="content-flecha" src="../SRC/backgroundarrow-removebg-preview.png">
            </div>
            <div class="bb">
                <a class="formulario-btn" href="login.php"><button class="formulario-btnn"></button></a>
            </div>
        </div>
    </div>
</body>
</html>