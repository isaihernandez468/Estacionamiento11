<?php

include('../app/config.php');

//aqui estamoes recibiendo el valor del id
$id_user = $_GET['id_user'];
$estado_inactivo = "0";
//aqui estamos calculando la hora actual
date_default_timezone_set('America/Mexico_City');
$fechaHora = date("Y-m-d H:i:s");

//aqui preparamos la consulta
$sentencia = $pdo->prepare("UPDATE tb_usuarios SET
    estado = :estado, fyh_eliminacion = :fyh_eliminacion
    WHERE id = :id");
    /* aqui estamos apsandole los valores que vienen el get */
    $sentencia->bindParam(':estado', $estado_inactivo,);
    $sentencia->bindParam(':fyh_eliminacion', $fechaHora);
    $sentencia->bindParam(':id', $id_user);


if($sentencia->execute()){
    echo "se elimino el registro de la manera correcta";
    ?>
    <script>location.href = "../usuarios/";</script>
    <?php
}else{
    echo "error al eliminar el registro";
}

?>