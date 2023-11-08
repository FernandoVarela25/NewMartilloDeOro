<?php
    require_once "connection.php";

    $username = $_POST['usuario'];
    $email = $_POST['correo'];
    $password = $_POST['contraseña'];
    $name = $_POST['nombre'];
    $lastname = $_POST['apellido'];

    $db = new Database();
    $conn = $db->connect();
    $sql_data = "INSERT INTO martillodeoro.data (name, lastname) VALUES (:name, :lastname)";
    $stmt_data = $conn->prepare($sql_data);
    $stmt_data->bindParam(':name', $name);
    $stmt_data->bindParam(':lastname', $lastname);
    $stmt_data->execute();
    $id_data = $conn->lastInsertId();

    $sql_users = "INSERT INTO martillodeoro.users (username, email, passwrd, id_rol, id_data) VALUES (:username, :email, :password, :id_rol, :id_data)";
    $stmt_users = $conn->prepare($sql_users);
    $id_rol = 3;
    $stmt_users->bindParam(':username', $username);
    $stmt_users->bindParam(':email', $email);
    $stmt_users->bindParam(':password', $password);
    $stmt_users->bindParam(':id_rol', $id_rol);
    $stmt_users->bindParam(':id_data', $id_data);
    $stmt_users->execute();

    header('Location: ../../Index.php?ruta=register&error=success_register');
    exit();
?>