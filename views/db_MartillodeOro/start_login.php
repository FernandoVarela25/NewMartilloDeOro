<?php
    include_once 'connection.php';
    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 
        session_destroy(); 
    }
    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: ../administrator/home_admin.php?ruta=start');
            break;
            case 2:
            header('location: ../employed/home_employed.php?ruta=start');
            break;
            case 3:
                header('location: ../common/home_common.php?ruta=start');
            break;
            default:
        }
    }

    if(isset($_POST['login_username']) && isset($_POST['login_password'])){
        $username = $_POST['login_username'];
        $passwrd = $_POST['login_password'];

        $dbname = new Database();
        $query = $dbname->connect()->prepare('SELECT *FROM users WHERE username = :username AND passwrd = :passwrd');
        $query->execute([':username' => $username, ':passwrd' => $passwrd]);

        $row = $query->fetch(PDO::FETCH_NUM);
        
        if($row == true){
            $dbname = new Database();
            $query = $dbname->connect()->prepare('SELECT roles.name, data.name, data.lastname FROM users INNER JOIN roles ON users.id_rol = roles.id INNER JOIN data ON users.id_data = data.id WHERE users.username = :username AND users.passwrd = :passwrd');
            $query->execute([':username' => $username, ':passwrd' => $passwrd]);
        
            $user_data = $query->fetch(PDO::FETCH_NUM);
        
            $rol_name = $user_data[0];
            $name = $user_data[1];
            $lastname = $user_data[2];
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['rol'] = $rol_name;
            $_SESSION['name'] = $name;
            $_SESSION['lastname'] = $lastname;
    
            switch($rol_name){
                case 'administrator':
                    header('location: ../administrator/Index_admin.php?ruta=start');
                    break;
                case 'employed':
                    header('location: ../employed/Index_employed.php?ruta=start');
                    break;
                case 'common':
                    header('location: ../common/Index_common.php?ruta=start');
                    break;
                default:
            }
        } else {
            header('location: ../../Index.php?error=failure_login');
        }       
    }
?>