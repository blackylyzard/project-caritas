<?php
session_start();

include("../../modelo/gestionar/gestionar_voluntarios.php");
include("../../modelo/GestionBD.php");


if (isset($_SESSION["formulario_voluntario"])) {
    $voluntario = $_SESSION["formulario_voluntario"];
}else if (isset($_SESSION["voluntario"])) { 
    $voluntario = $_SESSION["voluntario"];
}else {
    Header("Location: ../../controlador/altas/alta_voluntario.php");
}

$conexion  = crearConexionBD();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" type="text/css" href="../../vista/css/header-footer.css">
    <link rel="stylesheet" type="text/css" href="../../vista/css/button.css">
    <link rel="stylesheet" type="text/css" href="../../vista/css/form.css">
    <link rel="stylesheet" type="text/css" href="../../vista/css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta de Usuario</title>
    <link rel="shortcut icon" type="image/png" href="../../vista/img/favicon.png" />

</head>

<head>
    <meta charset="utf-8">
    <title>Alta de voluntario</title>
</head>

<body>
    <?php include("../../vista/header.php");
    include("../../vista/navbar.php");
    if (isset($_SESSION["formulario_voluntario"])) {
        unset($_SESSION["formulario_voluntario"]);
        if (nuevo_voluntario($conexion, $voluntario)) {
            echo "Todo ha ido bien.";
        } else {
            echo "El voluntario ya existe.";
        }
    }else if (isset($_SESSION["voluntario"])) { 
        unset($_SESSION["voluntario"]);
        if (editar_voluntario($conexion, $voluntario)) {
            echo "Todo ha ido bien.";
        } else {
            echo "error";
        }
    }
   
    ?>


    </main>
    <?php cerrarConexionBD($conexion);
    include("../../vista/footer.php");  ?>
</body>

</html> 