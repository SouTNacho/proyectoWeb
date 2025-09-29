<?php

include 'conexion.php';
$conecion = conectar_bd();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_SESSION["nombre"];
    $texto = $_POST["texto"];
    $archivo = $_POST["archivo"];
    $sql = "INSERT INTO foro (nombre, texto, archivo) VALUES ("$nombre", "$texto", "$archivo")";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="foro.css">
</head>
<body>
    <div class="conter-foro">
        <form action="">
            <h2>Formulario de BlueCost</h2>
            <div class="pantalla-foro">
                <div class="coment-target">
                    <h3 class="target-title">User:</h3>
                    <p class="target-text">Mensaje:</p>
                    <img src="">
                </div>
            </div>
            <input class="foro-text" name="texto" type="text" required minlength="64">
            <input class="foro-image" name="archivo" type="image">
            <button class="foro-btn">enviar</button>
        </form>
    </div>
</body>
</html>