<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/login.css">
    <link rel="stylesheet" href="views/css/icons/bootstrap-icons.css">
    <title>El Martillo de Oro</title>
</head>
<body class="bg-light">
    <?php
        if (isset($_SESSION["username"])) { 
            switch($_SESSION['rol']){
                case 'administrator':
                    header('location: views/administrator/Index_admin.php?ruta=start');
                break;
                case 'employed':
                header('location: views/employed/Index_employed.php?ruta=start');
                break;
                case 'common':
                    header('location: views/common/Index_common.php?ruta=start');
                break;
                default:
            }
        }
        else {
            if (isset($_GET["ruta"]) && $_GET["ruta"] == "login") {
                include "login.php";
            } else if (isset($_GET["ruta"]) && $_GET["ruta"] == "register") {
                include "register.php";
            } else if (isset($_GET["ruta"]) && $_GET["ruta"] == "forgot_password") {
                include "forgot_password.php";
            } else if (isset($_GET["ruta"]) && $_GET["ruta"] == "reset_password") {
                include "reset_password.php";
            } else {
                include "login.php";
            }
        }
    ?>
    <script src="views/js/bootstrap.bundle.min.js"></script>
    <script src="views/js/alerts.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>