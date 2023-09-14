<?php

    include('../app/config.php');

    $nombre = $_GET['nombre'];

    date_default_timezone_set('America/Mexico_City');
    $fechaHora = date("Y-m-d H:i:s");


    /**aqui esta guardando los datos del nuevo ususario en la abse de datos */

    $sentencia = $pdo->prepare("INSERT INTO tb_roles 
    (nombre, fyh_creacion, estado) 
    VALUES (:nombre, :fyh_creacion, :estado)");

    $sentencia->bindParam('nombre', $nombre);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_del_registro);

    /**aqui esta checando si se registro o no el nuevo ususario */

    if($sentencia->execute()){
        echo "registro satisfactorio";
        ?>
        <script>location.href = "index.php";</script>
        <?php
    }else{
        echo "no se pudo resgistrar a la base de datos";
    }
?>