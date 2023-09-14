<?php

include('../app/config.php');

$nro_espacio = $_GET['nro_espacio'];
$estado_espacio = $_GET['estado_espacio'];
$obs = $_GET['obs'];

//echo $nro_espacio.$estado_espacio.$obs;
    date_default_timezone_set('America/Mexico_City');
    $fechaHora = date("Y-m-d H:i:s");

    /**aqui esta guardando los datos del nuevo ususario en la abse de datos */

    $sentencia = $pdo->prepare("INSERT INTO tb_mapeos 
    (nro_espacio, estado_espacio, obs, fyh_creacion, estado) 
    VALUES (:nro_espacio, :estado_espacio, :obs, :fyh_creacion, :estado)");

    $sentencia->bindParam('nro_espacio', $nro_espacio);
    $sentencia->bindParam('estado_espacio', $estado_espacio);
    $sentencia->bindParam('obs', $obs);
    $sentencia->bindParam('fyh_creacion', $fechaHora);
    $sentencia->bindParam('estado', $estado_del_registro);

    /**aqui esta checando si se registro o no el nuevo ususario */

    if($sentencia->execute()){
        echo "registro satisfactorio";
        ?>
        <script>location.href = "mapeo-de-vehiculos.php";</script>
        <?php
    }else{
        echo "no se pudo resgistrar a la base de datos";
    }



?>