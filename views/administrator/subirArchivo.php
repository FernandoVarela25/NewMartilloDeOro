<?php
    $dir = "Img/";

    $destino = $dir . basename($_FILES["archivoImagen"]["name"]); 

    if (move_uploaded_file($_FILES["archivoImagen"]["tmp_name"], $destino)){
        $jsonAnswer = array('respPHP' => 'El archivo:  '. basename( $_FILES["archivoImagen"]["name"]). '     ha sido subido');
        echo json_encode($jsonAnswer);
    } else {
        $jsonAnswer = array('respPHP' =>'Error NO se pudo subir el archivo:  '. basename( $_FILES["archivoImagen"]["name"]).'     vuelva a intentar');
        echo json_encode($jsonAnswer);
    }
?>