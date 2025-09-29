<?php

session_start();

include "conexion.php";
$conexion = conectar_bd();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0 ) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($pass, $usuario['pass'])) {
            $_SESSION['nombre'] = $usuario['nombre'];
            header("Location: index.php");
            exit();
        }
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLUE COST - Login</title>
    <link rel="stylesheet" href="../fomulario.css">
</head>
<body>
    <div class="conter">
    <form action="" method="post" class="formulario-conter">
        <h2 class="formulario-title">INICIO DE SESION</h2>
        <input class="formulario-input" type="email" name="correo" placeholder="example@email.com" pattern=".{5, }@[a-z0-9.-]+\.[a-z]{2, }$" title="Ingrese al menos 5 caracteres y cumpla con el formato example@email.com" required>
        <input class="formulario-input" type="password" name="pass" placeholder="Contrasenha (8 - 16 caracteres)" required minlength="8" maxlength="16">
        <button class="formulario-button" type="submit">Iniciar Sesion</button>
    </form>
        <div class="sesion-div">
            <div class="flecha">
                <img class="content-flecha" src="../SRC/backgroundarrow-removebg-preview.png">
            </div>
                <div class="bb">
                <a class="formulario-btn" href="register.php"><button class="formulario-btnn"></button></a>
                </div>
        </div>
    </div>
</body>
</html>