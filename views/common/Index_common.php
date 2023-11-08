<?php
    session_start();
    if(!isset($_SESSION['rol'])){
        header('location: ../Index.php');
    } else {
        if($_SESSION['rol'] != 'common'){
            header('location: ../Index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/icons/bootstrap-icons.css">
    <title>El Martillo de Oro</title>
</head>
<body class="bg-light">
    <?php
        include "header.php";
        include "menu.php";
        if(isset($_GET["ruta"])){
            if( $_GET["ruta"] == "start" ||
                $_GET["ruta"] == "PerfilUsuario" ||
                $_GET["ruta"] == "support" ||
                $_GET["ruta"] == "products" ||
                $_GET["ruta"] == "aboutus");
            include "".$_GET["ruta"].".php";
        }
        include "footer.php";
    ?>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/alerts.js"></script>
</body>
</html>